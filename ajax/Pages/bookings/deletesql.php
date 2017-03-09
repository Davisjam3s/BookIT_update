<?php

require '../../../php/Conection.php';
$status = $_POST['Status'];
$LoanID = $_POST['LoanID'];

delete_sql= "DELETE FROM Loan Content, Loan
JOIN LoanContent ON LoanContent.LoanUID = Loan.LoanUID 
WHERE LoanContent.LoanUID = $LoanID AND Loan.LoanUID = $Loan";
if (mysqli_query($conn, $delete_sql))
{

}

?>

