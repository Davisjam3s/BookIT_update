<?php require 'user_info.php' ?>
<?php

$msg ="";
if (isset($_POST['upload'])) {
	$target = "Agreements/".basename($_FILES['image']['name']);

	
	$servername = "dragon.kent.ac.uk"; //server name
	$username = "m04_bookit"; // username for server
	$password = "b*asiis"; // password for server
	$dbname = "m04_bookit"; // name of the database on the server

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // check for connection error
	}
	 //make the allowed extensions

  
	
	$image = $_FILES['image']['name'];
	
	$sql = "INSERT INTO Agreement (AgreementDescription) VALUES ('$uploadfile')";
	mysqli_query($conn, $sql);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "uploaded";

	}else{
		$msg = "error uploading";
	}
	header('Location: loading.php');
}

?>
<script>
	$('.agreeselect').on('change', function() {
		if (this.value == 3) 
		{
			$(".boxbox").load("Agreements/EEG_Agreement.txt");
		}
		else if (this.value == 4) 
		{
			$(".boxbox").load("Agreements/Ians_Agreement.txt");
		}
		else if (this.value == 5) 
		{
			$(".boxbox").load("Agreements/Matteo_Agreement.txt");
		}
	})
</script>
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

</style><!-- dont worry fam, i will move these later-->
	<p>Add Item(Image)</p> <!--did you know, I The amazing james, Forgot to add this and broke the page for 3 hours?-->
	<form method="POST" class="addItemForm" action="ajax/Pages/Inventory/AgreeUploadForm.php" enctype="multipart/form-data">




		<input type="hidden" name="size" value="1000000">
		<input type="file" name="image">
		<input  class="formItems" id="upload" name="upload" type="submit" value="Confirm" name="add_item">
	</form>			
	<br>





        
