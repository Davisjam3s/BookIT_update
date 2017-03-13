<?php

require '../../../php/Conection.php';
$status = $_POST['Status'];
$LoanID = $_POST['LoanID'];


$sql_confirm = "UPDATE Loan set LoanConfirm = $status WHERE LoanUID = $LoanID";
if (mysqli_query($conn, $sql_confirm))
{
		$sql_emailInfo ="SELECT Asset.AssetDescription,Loan.LoanDate, LoanContent.ReturnDate, User.UserEmail
	FROM User 
	JOIN Loan on User.UserUID = Loan.UserUID 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	WHERE Loan.LoanUID = '$LoanID'";

		$result = mysqli_query($conn, $sql_emailInfo);	
  		//once we got that stuff from the db
  		if (mysqli_num_rows($result) > 0) 
  		{
     	 // output data of each row
    		while($row = mysqli_fetch_assoc($result)) 
    		{
     		$Asset =$row["AssetDescription"];
			$LoanDate =$row["LoanDate"];
			$ReturnDate = $row["ReturnDate"];
			$UserEmail = $row['UserEmail'];
  			}
  			if ($status == 1) {
  				$status = "Confirmed";
  			$to      = "$UserEmail";
			$subject = "RE: Your Loan of $Asset ";
			$txt     = "Your Loan of  $Asset  has been $status feel free to pick it up on $LoanDate and return it by $ReturnDate ";
			$headers = "From: BookIT@noreply.ac.uk" . "\r\n" . "CC:";
			mail($to, $subject, $txt, $headers);
  			}
  			else{
  				$status = "Refused";
  			$to      = "$UserEmail";
			$subject = "RE: Your Loan of $Asset ";
			$txt     = "Your Loan of $Asset has been $status Sorry about that, feel free to email the owner if you believe this to be a mistake ";
			$headers = "From: BookIT@noreply.ac.uk" . "\r\n" . "CC:";
			mail($to, $subject, $txt, $headers);

  			}


 		}

}

?>


SELECT Asset.AssetDescription, Loan.LoanUID,Loan.LoanDate, Loan.LoanConfirm, LoanContent.ReturnDate, User.UserEmail, Owner.OwnerLocation, User.UserCampus 
	FROM User 
	JOIN Loan on User.UserUID = Loan.UserUID 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID  
	WHERE Owner.OwnerUID = '$user' ORDER BY Loan.LoanUID DESC 

  