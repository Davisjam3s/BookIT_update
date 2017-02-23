<?php include '../php/user_info.php'; ?>
<?php

$Item_ID = $_REQUEST['id'];

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
 $mydate = date("Y/m/d");
 

$sql = "INSERT INTO Loan (UserUID, LoanDate) VALUES ('$user', '$mydate')";

if (mysqli_query($conn, $sql)) {

    $sql_select = "SELECT LoanUID FROM Loan WHERE UserUID = '$user' ORDER BY LoanUID DESC LIMIT 1";

    $result = mysqli_query($conn, $sql_select);
    if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    	$LoanUID = $row["LoanUID"];
    	}
    	$sql_content = "INSERT into LoanContent (LoanUID, AssetUID,setReturn,ReturnDate)values ($LoanUID,$Item_ID,1,'2017-03-21')";
		if (mysqli_query($conn, $sql_content)) {
    	header('Location: ../index.php');
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    	}
	} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

