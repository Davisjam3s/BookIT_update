<!--
    ** This Is a page for deleting a  user into the Owner Database, this is actvated when the admin user wants to remove a user from the database. of course this page would first need to delete the assests that that user has within the database first 

    ** It first gets the values from the ajax from on the Control.php page (found on /ajax/Pages/Admin) it sets the values posted and then uses them to create the first SQL statement

    ** At the moment has the connection to the datbase directly in here, this can be moved later, but for now it is working 

    ** Once it has been connected to the database it will strips all the tags these being things like ' ect as we want to prevent the user from creating an sql injection this is done by using "mysqli_real_escape_string($connection, $ExampleVariable)" this should in theory prevent them from that

    ** IT also makes sure to strip the tags, this should prevent the user from XSS attacks, this of course can ruin the websute if it was used. So it would be good to stop that from happening 

    ** The fist SQL statement is to select from the database, this is done because the Owner table within the database needs some information From the User table once we get this information it is then set into varibles so they can be used in the second SQL statement.

    ** The second SQL statement is for acctually inserting the information to the Owner table, it gathers the information from both the form that the user filled out and from the data that is capturerd from the first SQL.

    **This page was Created by Matt Hood, James Davis
    **Commented by James Davis

    **Tasks for this page
        *Code Clean
        *Code Format
        *use the include file for the connection rather than the whole connection script
        
-->
<?php
//read in variables
$AssetUID = $_POST['AssetUID']; // for that ItemName 

require '../../../php/Conection.php'; //connect to server

$AssetUID = mysqli_real_escape_string($conn, $AssetUID);
$AssetUID = strip_tags($AssetUID);

//1st query to find and delete the item image
$sql1 = "SELECT * FROM Asset WHERE AssetUID=$AssetUID";
	$result = mysqli_query($conn,$sql1);
			
		while ($row=mysqli_fetch_array($result)) 
				{
					//get these returned rows and turn into variables
					$AssetImage = $row["AssetImage"];
					//delete the image
					unlink("public_html/ajax/Pages/Inventory/images/".$AssetImage);
				}
	
	
	
// gather information from their user account
$sql2 = "DELETE FROM Asset WHERE AssetUID=$AssetUID";

//display success or failure
	if (mysqli_query($conn, $sql1)) {
			echo " Image deleted succesfully ";
			if (mysqli_query($conn, $sql2)) {
				echo " Asset deleted successfully ";
				} else {
				echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
			}
		} else {
			echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}

//if ($conn->query($sql) === TRUE) {
 //   echo "Record deleted successfully";
//} else {
 //   echo "Error deleting record: " . $conn->error;
//}

$conn->close();
?>