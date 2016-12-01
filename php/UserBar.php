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
