
<?php require 'php/Conection.php';?> <!--This is the connection file-->
<?php require 'test/Ft/FirstTime.php';?>
<?php require 'php/user_info.php';?> <!--give me the user name-->
<?php require 'php/email.php';?> <!--give me the users email-->
 <!--this will check if the user exists, if they dont it will add them into the database, if they do it will carry on as normal-->
<?php require 'php/banned.php';?>
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
<link rel="stylesheet" type="text/css" href="css/TableHeaders.css">
<link rel="stylesheet" type="text/css" href="css/index2.css">

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
<img class="shownav" src="images/expand.png" >
  	<div class="test">

            <ul class="ulmain mainnav"> <!--this is the orginal navagation menu-->
             
              <li class="lihead"><a href="#" class="all">Catalogue</a></li> <!--whats this? you want to see the catalog? you better click here then-->
              <li class="lihead"><a href="#" class="currentBookings">My Bookings</a></li><!--oh you now want to see the bookings? guess you will be clcking this-->
              <?php require 'php/UserBar.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
              <?php require 'php/UserBarAdmin.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
           </ul><!--end of orginal header-->

           <ul class="ulmain ul4  invnav"><!--start of contact us-->
             <li class="lihead"><a href="#" class="addi">Add Asset</a></li>
             <li class="lihead"><a href="#" class="UploadAgree">Add Agreement</a></li>
       <li class="lihead"><a href="#" class="CurrentAgreement">View Agreements</a></li>
             <li class="lihead"><a href="#" class="CurrentInventory">Manage Inventory</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
           </ul> <!--end of the contact us menu-->
           <ul class="ulmain ul5  adminnav"> <!--start of bookings menu-->
             <li class="lihead"><a href="#" class="Manage">Manage Users</a></li>
       <li class="lihead"><a href="#" class="Control">Owner Control</a></li>
       <li class="lihead"><a href="#" class="Edit">Edit Owner</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
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
<p class="mainp" style="text-align: center;margin-top: 10px; font-size: 2em;">Welcome to bookIT <?php  echo " $user";?></p>
	<div class="holder">Nothing to display
    </div>
</div>
<div class="Footer">Website Created by James Davis, Matt, and Marie</div>
</body>
</html>
