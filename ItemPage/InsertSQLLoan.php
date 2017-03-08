<?php
$sql = "INSERT INTO Loan (UserUID, LoanDate, LoanConfirm) VALUES ('$user', '$dateadd', 0)";
if (mysqli_query($conn, $sql))
{
	include 'SelectCurrentLoan.php';
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>