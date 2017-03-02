<!--
	** This page is for connecting to the database, this can be called on other pages when its needed, basscally connectecs the user to the databse when the need to accsess a table to get information

	** Page created by James Davis
	** Page Commented by James Davis
	** Tasks needed
		* None (although making sure this page gets used is a good idea)
-->
<?php
$servername = "dragon.kent.ac.uk"; //server name
$username   = "m04_bookit"; // username for server
$password   = "b*asiis"; // password for server
$dbname     = "m04_bookit"; // name of the database on the server
// Create connection
$conn       = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
// Check connection
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error()); // check for connection error
}
?>