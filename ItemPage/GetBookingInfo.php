<!-- 
**this page is to get information from the database such as loan date to give the user

    
**This page was Created by 
**Commented by Dominic Moseley

**What I have done
	
**Added the top comments
**
**Code was untouched	

-->

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
	/*This block of code accesses the database to get information needed about each item*/
	while ($row = mysqli_fetch_assoc($result))
	{
		$BookingInfo_Asset         = $row["AssetDescription"];/*This gets the description of each item stored in the database*/
		$BookingInfo_LoanDate      = $row["LoanDate"]; /*This gets the loan date for each item*/
		$BookingInfo_ReturnDate    = $row["ReturnDate"];/*This gets the return data for each item*/
		$BookingInfo_UserFName     = $row['UserFName'];/*This gets the username of the person who owns the item*/
		$BookingInfo_OwnerLocation = $row["OwnerLocation"];/*This gets the location of the item that the user ordered*/
		$UBookingInfo_serCampus    = $row["UserCampus"];/*This gets the campus information where the item is stored */
		$BookingInfo_OwnerUID      = $row["OwnerUID"];/*This gets the information of the owner that owns the app*/
	}
}
?>