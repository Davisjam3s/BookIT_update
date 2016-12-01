<?php
$servername = "dragon.kent.ac.uk";
$username = "m04_bookit";
$password = "b*asiis";
$dbname = "m04_bookit";

if(isset ($_SERVER['REMOTE_USER']))
    {
      $user=$_SERVER['REMOTE_USER'];
    }
    else
    {
      echo "Please Log in";
    }

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT (UserName) FROM Stub_User WHERE UserName ='$user'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1)
  {
  }
  else
  {
    $sql = "INSERT INTO Stub_User (UserName) VALUES ('$user')";

if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  }
mysqli_close($conn);
?> <!--this is some php for adding the user when they first log in-->
 <!--its currently broken though, lol because i The master james Did ;)-->
 <!--when i say its broken, what i really mean is that it adds a user every time they log in rather than adding them once-->
 <!--We better get on this lads and ladies thats right, im not sexist, take that feminists-->
 <!--it works now-->
 <!--clean this code though-->
<!--don't break anything
              _
             | |
             | |===( )   //////
             |_|   |||  | o o|
                    ||| ( c  )                  ____
                     ||| \= /                  ||   \_
                      ||||||                   ||     |
                      ||||||                ...||__/|-"
                      ||||||             __|________|__
                        |||             |______________|
                        |||             || ||      || ||
                        |||             || ||      || ||
------------------------|||-------------||-||------||-||-------
                        |__>            || ||      || ||


I dont know why you're reading the code, there is nothing intresting here, unless you're a code stealer, if so, go away-->
<!--dont undertand our code? well then ask, or dont, dont worry after a while we wont understand it anyway-->

<!DOCTYPE html> <!--yo, i heard you like HTML 5-->
<head> <!--start of head put things in here to load them, CSS, PHP, JS/Jquery-->
<title>BookIT</title> <!--Title of the page--> <!--Did you know BookIT was one word? I did not, so I changed it-->
<!--Styles-->
<link rel="stylesheet" type="text/css" href="css/PageMainStyle.css"/> <!--this loads the main style of the page-->
<link rel="stylesheet" type="text/css" href="css/cat_items.css"/> <!--this for the items in the catalog-->
<link rel="stylesheet" type="text/css" href="css/agreeForm.css"/> <!--this is for the agree form-->
<link rel="stylesheet" type="text/css" href="css/tables.css"/> <!--this is for the tables on the booking pages-->
<!--end of styles-->
 <!--Scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--thats right jquery is being used here, you better use them libarys rather than doing it the long way-->
<script src="ajax/Scripts/Load_items.js"></script> <!--want to load them items on the page? this does it-->
<script src="ajax/Scripts/Bookings.js"></script> <!--want to see them bookings? you know what does it-->
<script type="text/javascript" src="js/header.js"></script> <!-- this is for the navation bar, well most of it, my code is everywhere, we better clean it up and change this when we did -->
<script type="text/javascript" src="js/agreeForm.js"></script><!--them users better agree, or else!-->
<script type="text/javascript" src="js/InventoryHeader.js"></script><!--yes yes, the inventory header, this does some loading -->
<!--end of scripts-->
<!--this is some amaxing tests fam-->
<script src="js/adminHeader.js"></script>
<script>
  $( document ).ready(function() 
    { // the doc better be ready
      $(".holder").show();  // show this
      $(".holder").load("indextest.php");// load this into it
    });
</script>
      <!--we will discus this-->
</head> <!--end of head-->
<body> <!--start of body-->

      <div class="menu_container_background"></div> <!--background for the form-->
      <div class="menu_container"> <!--background for the agreement form-->
        <div class="agreement"> <!--this is where the the agreement will be written-->
          <h1 class="agreeTitle">User Agreement</h1> <!--title of the agreement-->
          <div class="agreementText"> <!--this is where the text agreement goes-->
            <div class="agreeHolder" style="display:none;">T.O.S</div> <!--holder for akax-->
          </div> <!--end of agreementText-->
          <div class="formAgree"> <!--this is where the buttons goes-->
            <Form class="agreeForm"> <!--start of the form-->
              <input type="checkbox" name="yes" value="agree"> checking this box and pressing agree signs away your rights <!--this is the checkbox--> <!--better put somthing in here marie somthing better-->
              <input type="submit" name="decline" value="Decline"> <!--decline button-->
              <input type="submit" name="Agree" value="Agree"><!--accept button-->
            </Form> <!--end of the form-->
          </div> <!--end of formAgree-->
        </div><!--end of agreement-->
      </div><!--end of menu_container-->

      <header class="large"> <!--set to large instantly, this gives the bigger header-->
        <div class="container"> <!--this is the container within the header-->
          <nav> <!--this is for the navagation area-->
            <a href="index.php"><img onclick="HomeClick()" src="images/uni_logo.png"></a> <!--this is for the logo-->
            <ul class="ulmain mainnav"> <!--this is the orginal navagation menu-->
              <li class="lihead"><a href="#"  class="aform" onclick="AgreeForm() ">Agree</a></li> <!-- on click find the agree form, just fyi this is only here for testing purposes, will be move later fam-->
              <li class="lihead"><a href="#" onclick="CatalogNav()">Catalogue</a></li> <!--whats this? you want to see the catalog? you better click here then-->
              <li class="lihead"><a href="#" onclick="BookingNav()">My Bookings</a></li><!--oh you now want to see the bookings? guess you will be clcking this-->
              <?php require 'php/UserBar.php';?> <!--oh no, some wild PHP appeard, james Used display these items if the user is one of these, it was super effective-->
             
           </ul><!--end of orginal header-->

           <ul class="ulmain ul2 catnav"> <!--this is for the catalog items, set to hidden, wont be displayed until activated by user-->
             <li class="lihead"><a href="#" class="all">All</a></li>
             <li class="lihead"><a href="#" class="lego">Lego</a></li>
             <li class="lihead"><a href="#" class="pi">Pi's</a></li>
             <li class="lihead"><a href="#" class="t4">Type 4</a></li>
             <li class="lihead"><a href="#" class="t5">Type 5</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li> <!--helps navagate the menu-->
           </ul> <!--end of catalog-->
           <ul class="ulmain ul3  booknav"> <!--start of bookings menu-->
             <li class="lihead"><a href="#" class="currentBookings">Current Bookings</a></li>
             <li class="lihead"><a href="#" class="pastBookings">Past Bookings</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
           </ul> <!--end of bookings menu-->
           <ul class="ulmain ul4  invnav"><!--start of contact us-->
             <li class="lihead"><a href="#" class="addi">Add</a></li>
             <li class="lihead"><a href="#" class="RemoveInventory">Remove</a></li>
             <li class="lihead"><a href="#" class="CurrentInventory">Current</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
           </ul> <!--end of the contact us menu-->
           <ul class="ulmain ul5  adminnav"> <!--start of bookings menu-->
             <li class="lihead"><a href="#" class="Control">Control</a></li>
             <li class="lihead"><a href="#" class="Manage">Manage</a></li>
             <li class="lihead"><a href="#" class="back">Back</a></li>
           </ul> <!--end of bookings menu-->
         </nav> <!--end of the navagation menu-->
       </div> <!--end of the contanier-->
     </header> <!--end of the header-->
     <section class="stretch"> <!--things should be placed within here to work-->
      <p class="mainp">Welcome to bookIT <?php require 'php/user_info.php';?> <?php require 'php/email.php';?></p> <!--title of the page-->
      <div class="holder">Nothing to display</div> <!--hidden div which will contain working ajax when needed-->
    </section> <!--end of section which should contain things within the page.-->	
  </body>
  </html>