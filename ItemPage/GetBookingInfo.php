<?php
$sql_BookingInfo = "SELECT Asset.AssetDescription,Asset.OwnerUID,Loan.LoanDate, LoanContent.ReturnDate, User.UserFName, Owner.OwnerLocation, User.UserCampus 
	FROM Loan 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID 
	JOIN User on Owner.OwnerUID = User.UserUID  
	WHERE Loan.UserUID = '$user' ORDER BY Loan.LoanUID DESC LIMIT 1 ";
$result          = mysqli_query($conn, $sql_BookingInfo);
if (mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_assoc($result))
	{
		$BookingInfo_Asset         = $row["AssetDescription"];
		$BookingInfo_LoanDate      = $row["LoanDate"];
		$BookingInfo_ReturnDate    = $row["ReturnDate"];
		$BookingInfo_UserFName     = $row['UserFName'];
		$BookingInfo_OwnerLocation = $row["OwnerLocation"];
		$UBookingInfo_serCampus    = $row["UserCampus"];
		$BookingInfo_OwnerUID      = $row["OwnerUID"];
	}
}
?>