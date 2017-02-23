<?php require '../../php/Conection.php';?>
<?php
$user = 'jd601';
$sql = "SELECT UserUID, UserTypeUID, UserBanned, UserAgreed, CurrentLoans FROM User WHERE UserUID = '$user'   ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
        $UserUID =$row["UserUID"];
        $UserTypeUID =$row["UserTypeUID"];
        $UserBanned =$row["UserBanned"];
        $UserAgreed =$row["UserAgreed"];
        $CurrentLoans =$row["CurrentLoans"];
        if($CurrentLoans == null)
        {
            $CurrentLoans = 0;
        }

    if ($UserTypeUID == 2 AND $UserBanned == 0 and $UserAgreed == 1 and $CurrentLoans <= 3) {
        echo "You can borrow this item";
    }elseif ($UserTypeUID == 1 ) {
        echo "You can not borrow this item";
    }

        
        }
    }else{
    echo "0 results";
        }

mysqli_close($conn);
?>
