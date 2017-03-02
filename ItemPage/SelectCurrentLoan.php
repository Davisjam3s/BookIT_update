<?php
$sql_select = "SELECT LoanUID FROM Loan WHERE UserUID = '$user' ORDER BY LoanUID DESC LIMIT 1";
$result     = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $LoanUID = $row["LoanUID"];
    }
    include 'insertLoanContent.php';
}
?>