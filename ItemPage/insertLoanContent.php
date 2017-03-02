<?php
$sql_content = "INSERT into LoanContent (LoanUID, AssetUID,setReturn,ReturnDate)values ($LoanUID,$Item_ID,1,'$dayDrop')";
if (mysqli_query($conn, $sql_content))
{
    echo "days to pick up $dayAdd <br>"; // day to pick up
    echo "days with item $BookedDays <br>"; // how long they will have it 
    echo "Days together $daySum <br> "; // lets add them
    echo "Day to collect $dateadd <br>"; //when does the user need to pick it up?
    echo "Day to return $dayDrop  <br>"; // when does the user need to return it
    include 'GetBookingInfo.php';
    include 'sendConfrimEmail.php';
    include 'AddToCurrentLoans.php';
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>