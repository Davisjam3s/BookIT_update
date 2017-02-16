<?php 
require 'user_info.php';
require 'checkUploads.php';
require '../../../php/Conection.php';
?>
<?php

$msg ="";
if (isset($_POST['upload'])) {
	$target = "Agreements/".basename($_FILES['file']['name']);
	$file = $_FILES['file']['name'];
	$agName = $_POST['docName'];
	$agName = mysqli_real_escape_string($conn, $agName);
	$agName = strip_tags($agName);
	
	//$servername = "dragon.kent.ac.uk"; //server name
	//$username = "m04_bookit"; // username for server
	//$password = "b*asiis"; // password for server
	//$dbname = "m04_bookit"; // name of the database on the server

	// Create connection
	//$conn = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
	// Check connection
	//if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error()); // check for connection error
	//}
	
	//check the file	
	if (checkDoc())
	{
		$sql = "INSERT INTO Agreement (AgreementDescription, AgreementName) VALUES ('$uploadfile','$agName')";
		mysqli_query($conn, $sql);
		//if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
		//$msg = "uploaded";
		header('Location: loading.php');

		}
		
		else
			{
				echo "error uploading";	
			}
			
	}


?>

<style>
	.addItemForm
	{
	background-color: transparent;

	text-align: center;
	}
	.restext
	{
		display: none;
		font-family: 'Amaranth', sans-serif;
	}
	.formItems
	{
		margin-top: 1em;
		text-align: center;
		font-family: 'Amaranth', sans-serif; /*what a nice font*/
		font-size: 1em;
	}
	.addextra
	{
		width: 25em;
		height: 5em;
	}
	.boxbox
	{
		width: 100%;
		height: 25em;
		
	}

</style>

	<p>Add an agreement - you will then be able to use this agreement in the selection menu on the add item page</p> 
	<form method="POST" class="addItemForm" action="ajax/Pages/Inventory/AgreeUploadForm.php" enctype="multipart/form-data">

		<p> Please give your agreement a name </p>
		<input required="true" type="text" name="docName">
		<input type="hidden" name="size" value="1000000">
		<input type="file" name="file">
		<input  class="formItems" id="upload" name="upload" type="submit" value="Confirm" name="add_item">
	</form>			
	<br>