<?php

 $sql_countLoans= "SELECT count(Loan.LoanUID) as CountLoans, sum(LoanContent.setReturn =0) as CountOuts
	FROM User 
	JOIN Loan on User.UserUID = Loan.UserUID 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID  
	WHERE Owner.OwnerUID = '$user'";

$result = mysqli_query($conn, $sql_countLoans);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) 
		{
			$countLoans =$row["CountLoans"];
			$countOuts=$row["CountOuts"];
			$countL=$countLoans-$countOuts;
			
		}
	}
?>