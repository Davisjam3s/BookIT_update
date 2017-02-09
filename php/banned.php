<?php require 'user_info.php';?>
<?php require 'Conection.php';


$sql = "SELECT UserUID, UserBanned FROM User WHERE UserUID ='$user'";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$UserUID =$row["UserUID"];
    	$UserBanned = $row["UserBanned"];
    	
    	if ($UserBanned == 1) {
    		$UserBanned = "banned";
    		header('Location: php/bannedPage.php');
    	}


        
    }
} else {
    echo "0 results";
}

mysqli_close($conn);


?>