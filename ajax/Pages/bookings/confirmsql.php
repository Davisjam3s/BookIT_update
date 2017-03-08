$sql_confirm = "UPDATE Loan set LoanConfirm = 1 WHERE LoanUID = $LoanID";
$sql_refuse = "UPDATE Loan set LoanConfirm = 2 WHERE LoanUID = $LoanID";