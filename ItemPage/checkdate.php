<?php
//$returnedItem_sql = update LoanContent set setReturn=0 where LoanUID=$LoanID;//change this variable!
require "../php/Conection.php";

//$Date = $_POST['date'];
$AssetUID = $_POST ['asset'];
//echo $Date .$AssetUID;
//require "getDateInfo.php";
$dayAdd     = $_POST['date']; // get the value from this 
//$BookedDays = $_POST['DaysBooked']; // get the value from this
//$daySum     = $dayAdd + $BookedDays; // add them together for later 
$mydate     = date("Y/m/d"); // what is todays day?
$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days')); // add the pick up day to the date 
//$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days')); // how long does the user need it 

echo $dateadd .$AssetUID;
$checkbetween_sql = "select * 
from LoanContent join Loan on LoanContent.LoanUID = Loan.LoanUID 
where '$dateadd' between Loan.LoanDate and LoanContent.ReturnDate 
and LoanContent.AssetUID=$AssetUID";

$result = mysqli_query($conn, $checkbetween_sql);

	if (mysqli_num_rows($result) >0)
	{
		echo "not available";
	}
	else
	{
		echo "available for booking";
	}

?>