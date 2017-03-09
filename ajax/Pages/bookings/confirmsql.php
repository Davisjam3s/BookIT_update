<?php

require '../../../php/Conection.php';
$status = $_POST['Status'];
$LoanID = $_POST['LoanID'];

$sql_confirm = "UPDATE Loan set LoanConfirm = $status WHERE LoanUID = $LoanID";
if (mysqli_query($conn, $sql_confirm))
{
	$sql_getEmailInfo = "SELECT UserUID FROM Loan WHERE LoanUID = $LoanID LIMIT 1";
	$result = mysqli_query($conn, $sql_getEmailInfo);
	if (mysqli_num_rows($result) > 0) {
	{
		while($row = mysqli_fetch_assoc($result)) 
    	{
    		$UserUID  =$row["UserUID "];
			
    	}
	$to      = $UserUID;
	$cc      = $UserUID;
	$subject = "Regarding you booking ID $BookingInfo_Asset ";
	$txt     = "Hello $user , this is an email regarding your booking #$LoanUID to confirm your booking is now being processed, once $cc has confirmed your booking you will recived another email confirming your booking, you can also see the status of your booking on the 'My Bookings' page ";
	$headers = "From: BookIT@noreply.ac.uk" . "\r\n" . "CC: $BookingInfo_OwnerUID ";
	mail($to, $subject, $txt, $headers);
	}
	

}

?>



