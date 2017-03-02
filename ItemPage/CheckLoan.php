<?php

	$sql_check = "SELECT User.UserBanned, User.UserAgreed,User.UserYear,User.UserTypeUID,UserType.UserTypeDescription 
	FROM User 
	JOIN UserType on User.UserTypeUID = UserType.UserTypeUID
	WHERE UserUID ='$user'";
	
	$check_result = mysqli_query($conn, $sql_check);
	if (mysqli_num_rows($check_result)>0)
	{
		while ($row = mysqli_fetch_assoc($check_result))
		{    
			$Banned = $row["UserBanned"];
			$UserAgreed = $row["UserAgreed"];
			$UserYear = $row["UserYear"];
			$UserUID = $row["UserTypeUID"];
			$UserType = $row["UserTypeDescription"];
		}
    }
	else 
	{	
		echo "no results found";
	}
	
	
	$sql_restriction = "SELECT AssetRestriction 
	FROM Asset WHERE AssetUID = '$ItemID'";
	$restriction_result = mysqli_query($conn, $sql_restriction);
	if (mysqli_num_rows($restriction_result)>0)
	{
		while ($row = mysqli_fetch_assoc($restriction_result))
		{    
			$Restriction = $row["AssetRestriction"];
		}
		
    }
	else
	{
			echo "no item restriction found";
	}
	
		
		
while ($Banned == 0 && $UserAgreed == 1)
	{
		switch ($Restriction)
		{
			case $Restriction == 1 :
				include 'InsertSQLLoan.php';
			break;
			case $Restriction == 2 && $UserYear == 3 || $UserTypeUID >= 2:
				include 'InsertSQLLoan.php';
			break;
			case $Restriction == 3 && $UserTypeUID >= 2:
				include 'InsertSQLLoan.php';
			break;
			case $Restriction == 4 && $UserTypeUID == 3;
				include 'InsertSQLLoan.php';
			break;
			default:
			echo "there is an issue with this!";
			
		}
		
	}	
	
	

?>