<!--
    ** This is the Page that that enters a booking into the database, here it runs 4 sql scripts (this will need to be changed later but for now it works so its ok) this is for entering the booking

    **first we get the users info, this being the users ID this is done by including the user_info.php page this allows me to get the users ID

    ** Then we need to get the Items id this is the one that the user has choosen to book, this is done by using the $_REQUEST as this allows the page to get that infromation of the ID for the ITEM

    ** Then it gathers information about dates for the booking, this is needed in order for the item to be booked we need to get the date that they would like to book it on, this being the next day not the current day then it needs to know how many days the user is booking it for this is because it uses this number to get the return day this is dont by creating a new varible that is a sum of those days and then using that as the return day

    ** we also have a connection to the database, this can be refactored out of the page later

    ** Then we have the first SQL this is for inserting the first part of the laon into the database, this uses the users ID and the day that the user would like to book the item

    ** if the first SQL works then it , moves onto the next one, the next one is for selecting the information that we just inserted into the database, this is needed ot get the ID for the booking that is created by auto_increment in the database, the information that it gathers is just the LoanUID where the user is the same as the user that is logged in and it only selects the most recent entery, this allowing for the next SQL to work 
    
    ** the next SQL is for inserting the second half of the loan into LoanContent Table, this holds more information about the loan, such as the item name, owner and return date this 

    ** once the first 3 SQL statments are done we use another SQL, this is done to then get the information that we just inserted and use it to send the email to the user this gathers the infoprmation from LoanContent it is also with an include file so i dont have to use it directly on the page 

    ** it also uses another include, this is to send the email to the user to confirm that they will have the booking be looked at


    **This page was Created by James Davis , Marie H , Matt H
    **Commented by James Davis

    **Tasks for this page
        * Check to see if the user has been banned
        * Check the type of users
        * Refactor 
-->
<?php 
include '../php/user_info.php'; // we need this page to get the informatiom abouyt the user 
?>
<?php

$Item_ID = $_REQUEST['id']; // get the ID for the item 
            $dayAdd = $_POST['advanced']; // get the value from this 

            $BookedDays = $_POST['DaysBooked']; // get the value from this

            $daySum = $dayAdd + $BookedDays; // add them together for later 

            $mydate = date("Y/m/d"); // what is todays day?
            $dateadd = date('Y/m/d', strtotime($mydate. '+'.$dayAdd.' days')); // add the pick up day to the date 
            $dayDrop = date('Y/m/d', strtotime($mydate. '+'.$daySum.' days')); // how long does the user need it 

$servername = "dragon.kent.ac.uk";
$username = "m04_bookit";
$password = "b*asiis";
$dbname = "m04_bookit";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 

$sql = "INSERT INTO Loan (UserUID, LoanDate) VALUES ('$user', '$dateadd')";

if (mysqli_query($conn, $sql)) {

    $sql_select = "SELECT LoanUID FROM Loan WHERE UserUID = '$user' ORDER BY LoanUID DESC LIMIT 1";

    $result = mysqli_query($conn, $sql_select);
    if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    	$LoanUID = $row["LoanUID"];
    	}
    	$sql_content = "INSERT into LoanContent (LoanUID, AssetUID,setReturn,ReturnDate)values ($LoanUID,$Item_ID,1,'$dayDrop')";
		if (mysqli_query($conn, $sql_content)) {
    	    echo "days to pick up $dayAdd <br>"; // day to pick up
            echo "days with item $BookedDays <br>"; // how long they will have it 
            echo "Days together $daySum <br> "; // lets add them
            echo "Day to collect $dateadd <br>"; //when does the user need to pick it up?
            echo "Day to return $dayDrop  <br>"; // when does the user need to return it
            include 'GetBookingInfo.php';
            include 'sendConfrimEmail.php';
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    	}
	} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

