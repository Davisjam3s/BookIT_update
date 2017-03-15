<?php
include '../../php/Conection.php';

$sql_GetDays = "SELECT Asset.AssetDescription, Loan.LoanUID, Loan.LoanDate, Loan.LoanConfirm, LoanContent.ReturnDate, User.UserFName, Owner.OwnerLocation, User.UserCampus 
	FROM Loan 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID 
	JOIN User on Owner.OwnerUID = User.UserUID  
	ORDER BY Loan.LoanUID DESC 	";


$result = mysqli_query($conn, $sql_GetDays);


	if (mysqli_num_rows($result) > 0) 
	{
		$dayAdd = 5;
		$BookedDays = 6;
		$mydate     = date("Y/m/d"); // todays date
		$dateadd    = date('Y/m/d', strtotime($mydate . '+' . $dayAdd . ' days'));
		//$MyDayBooked = $MyDayBooked->format("Y/m/d");
		$daySum     = $dayAdd + $BookedDays;
		$dayDrop    = date('Y/m/d', strtotime($mydate . '+' . $daySum . ' days'));
		echo " Choosen Day: $dateadd Return day: $dayDrop  <br> <br>";

		while($row = mysqli_fetch_assoc($result)) 
		{
			$LoanID = $row["LoanUID"];
			$LoanDate = $row["LoanDate"];
			$ReturnDate = $row["ReturnDate"];

			

			$LoanDate = date_create($LoanDate);
			$LoanDate = $LoanDate->format("Y/m/d");
			$ReturnDate = date_create($ReturnDate);
			$ReturnDate = $ReturnDate->format("Y/m/d");

			if (($dateadd  >= $LoanDate && $dateadd <= $ReturnDate) && ($dayDrop >= $LoanDate && $dayDrop <=$ReturnDate)) 
			{
				$canBook = "You cannot Book This Item";
				
			}
			else 
			{
			$canBook = "You can Book This Item";			
			}

			echo "
				ID: $LoanID <br>
				Loan Date: $LoanDate  <br>
				Return Date: $ReturnDate <br>
				Can book?: $canBook <br>
				<br>
			";
		}
	 }
		
		

?>