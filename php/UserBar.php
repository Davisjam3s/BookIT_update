<!--
 **This page checks to see the type of the user, if they are a staff memember, then it will give them more options on the navagation bar

 ** will need to change to staff at a later time

 **Page was Created by James davis
 ** Commented by James Davis
 ** Tasks for this page 
 	* Change student to staff
-->
<?php
if(isset ($_SERVER['MELLON_unikentaccountType']))
  {
    $userType=$_SERVER['MELLON_unikentaccountType'];
      if ($userType == 'ugtstudent') // just for lol's fam, this needs changing 
        {
          echo "<li class='lihead'><a href='#' onclick='AdminNav()'>Admin</a></li>";  // put this on the page
          echo "<li class='lihead'><a href='#' onclick='InventoryNav()'>My Inventory</a></li>"; // and this whilst you're at it
                 // these could be echoed at the same time, but its too confusing and long, well not realling confusing, just makes the code look ugly
        }
    }				
?>