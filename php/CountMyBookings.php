<?php

 $sql_countBookings= "select count(LoanUID) as CountBookings from Loan Where UserUID ='$user'";

$result = mysqli_query($conn, $sql_countBookings);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) 
		{
			$countb =$row["CountBookings"];
			
		}
	}
?>