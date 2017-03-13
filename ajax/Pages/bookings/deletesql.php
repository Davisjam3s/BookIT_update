<?php

require '../../../php/Conection.php';
//$status = $_POST['Status'];
$LoanID = $_POST['LoanID'];

$delete_sql = "DELETE FROM LoanContent
WHERE LoanUID = $LoanID ";
	if (mysqli_query($conn, $delete_sql))
	{
		echo "succesfully deleted your loan request"; 
	}
	else
	{
		echo ("error" .mysqli_error($conn));
	}

	$delete2_sql = "DELETE FROM Loan
WHERE LoanUID = $LoanID";
if (mysqli_query($conn, $delete2_sql))
	{
		echo "succesfully deleted your loan request"; 
	}
	else
	{
		echo ("error" .mysqli_error($conn));
	}
?>

