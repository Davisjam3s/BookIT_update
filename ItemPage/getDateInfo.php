<?php
$dayAdd     = $_POST['advanced']; // get the value from this 
$BookedDays = $_POST['DaysBooked']; // get the value from this
$daySum     = $dayAdd + $BookedDays-1; // add them together for later 
$mydate     = date("Y/m/d"); // what is todays day?
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); // add the pick up day to the date 
$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days')); // how long does the user need it 
?>