<?php require 'php/Conection.php';?> <!--This is the connection file-->
<?php require 'php/user_info.php';?> <!--give me the user name-->
<?php require 'php/email.php';?>
<?php require 'php/CheckInsert.php';?> <!--give me the users email-->
<!--this will check if the user exists, if they dont it will add them into the database, if they do it will carry on as normal-->
<!--this is some php for adding the user when they first log in-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--thats right jquery is being used here, you better use them libarys rather than doing it the long way-->
<script src="ajax/Scripts/Load_items.js"></script> <!--want to load them items on the page? this does it-->
<script src="ajax/Scripts/Bookings.js"></script> <!--want to see them bookings? you know what does it-->
<script type="text/javascript" src="js/header.js"></script> <!-- this is for the navation bar, well most of it, my code is everywhere, we better clean it up and change this when we did -->
<script type="text/javascript" src="js/agreeForm.js"></script><!--them users better agree, or else!-->
<script type="text/javascript" src="js/InventoryHeader.js"></script><!--yes yes, the inventory header, this does some loading -->
<!--end of scripts-->
<!--this is some amaxingtests fam-->
<script src="js/adminHeader.js"></script>
<link rel="stylesheet" type="text/css" href="css/cat_items.css"/> <!--this for the items in the catalog-->
<link rel="stylesheet" type="text/css" href="css/agreeForm.css"/> <!--this is for the agree form-->
<link rel="stylesheet" type="text/css" href="css/tables.css"/> <!--this is for the tables on the booking pages-->
<link rel="stylesheet" type="text/css" href="css/InfoFrom.css"/>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style>

body {
    font-family: "Lucida Sans", sans-serif;
    margin: 0;
   	padding: 0;
   	background-color: #ebebeb;
}
a{
	color: inherit;
	text-decoration: inherit;
}
.header {
	top: 0;
	background-color: #05345C;
	height: 5em;
	width: 100%;
	position: fixed;
	z-index: 10;
}
/* For desktop: */
.test
{
	background-color: transparent;
	width: 80%;
	float: right;
	right: : 0;
	
}
ul
{
	margin-top: 1em;
	padding: 0;
	float: right;
	text-decoration: none;
	font-family: 'Amaranth', sans-serif;
	text-transform: uppercase;
  
}
li
{
	display: inline-block;
	background-color: #05345C;
	margin-left: 1em;
	height: 3em;
	line-height: 3em;
	text-align: center;
	color: #969696;
}
li:hover
{
	color: white;
}
.ul2,.ul3, .ul4, .ul5
{
	display: none;
}
.MainBody{
    margin-top: 5em; auto 0;
    width: 100%;
    background-color: transparent;
}
.Footer{
	  bottom: 0;
	  width: 100%;
    background-color: red;
    position: fixed;
}


@media only screen and (max-width: 768px) {

li , ul{
  margin-top: 0;
  margin-left: 0;
  margin-right: 0;
  width: 100%;
  margin-top: 0.1em;
  
}
.test{
  width: 100%;
  margin-top: 3.5em;
  height: auto;
  background-color: white;
}
}
</style>
<script>
$(document).ready(function()
{
    $(".shownav").click(function()
      {
          $(".test").toggle();    
      });
});
</script>
</head>
<body>
<div class="header">
<span style="color: white" class="shownav">lol</span>
  	<div class="test">
  	<ul class="ulmain mainnav">
	  	
	    <li><a href="#" onclick="CatalogNav()">Catalogue</a></li> <!--whats this? you want to see the catalog? you better click here then-->
	    <li><a href="#" onclick="BookingNav()">My Bookings</a></li><!--oh you now want to see the bookings? guess you will be clcking this-->
    <?php require 'php/UserBar.php';?>
  	</ul>
    <ul class="ulmain ul2 catnav"> <!--this is for the catalog items, set to hidden, wont be displayed until activated by user-->
        <li><a href="#" class="all">All</a></li>
        <li><a href="#" class="lego">Lego</a></li>
        <li><a href="#" class="pi">Pi's</a></li>
        <li><a href="#" class="t4">Type 4</a></li>
        <li><a href="#" class="books">Books</a></li>
        <li><a href="#" class="back">Back</a></li> <!--helps navagate the menu-->
    </ul> <!--end of catalog--> 
	<ul class="ulmain ul3  booknav"> <!--start of bookings menu-->
        <li><a href="#" class="currentBookings">Current Bookings</a></li>
        <li><a href="#" class="pastBookings">Past Bookings</a></li>
        <li><a href="#" class="back">Back</a></li>
    </ul> <!--end of bookings menu--> 
    <ul class="ulmain ul4  invnav"><!--start of contact us-->
        <li><a href="#" class="addi">Add</a></li>
        <li><a href="#" class="RemoveInventory">Remove</a></li>
        <li><a href="#" class="CurrentInventory">Current</a></li>
        <li><a href="#" class="back">Back</a></li>
    </ul> <!--end of the contact us menu-->
    <ul class="ulmain ul5  adminnav"> <!--start of bookings menu-->
        <li><a href="#" class="Control">Control</a></li>
        <li><a href="#" class="Manage">Manage</a></li>
        <li><a href="#" class="back">Back</a></li>
    </ul> <!--end of bookings menu-->	
  	</div>
  	
</div>
<script>
  $( document ).ready(function() 
    { // the doc better be ready
      $(".holder").show();  // show this
      $(".holder").load("Slideshow.php");// load this into it
    });
</script>
<div class="MainBody">
<p class="mainp" style="text-align: center;margin-top: 10px; font-size: 2em;">Welcome to bookITs <?php  echo " $user";?></p>
	<div class="holder">Nothing to display
    </div>
</div>
<div class="Footer">hello</div>
</body>
</html>
