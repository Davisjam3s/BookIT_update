<?php
$sql = "INSERT INTO Loan (UserUID, LoanDate) VALUES ('$user', '$dateadd')";
if (mysqli_query($conn, $sql))
{
	include 'SelectCurrentLoan.php';
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>