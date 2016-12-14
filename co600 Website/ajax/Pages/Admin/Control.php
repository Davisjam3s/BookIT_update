<?php
echo "<p>Admin Controls</p>"; // dont delete this
?>
<?php require '../../../php/Conection.php';?>
<?php
$sql = "SELECT * FROM User";
$result = mysqli_query($conn, $sql);
echo "<table>
		<tr>
			<th>UserUID</th>
			<th>UserTypeUID</th>
			<th>UserBanned</th>
			<th>UserYear</th>
			<th>UserEmail</th>
			<th>UserFname</th>
			<th>UserCampus</th>
			<th>UserAgreed</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$UserUID =$row["UserUID"];
    	$UserTypeUID =$row["UserTypeUID"];
    	$UserBanned =$row["UserBanned"];
    	$UserYear =$row["UserYear"];
    	$UserEmail =$row["UserEmail"];
    	$UserFname =$row["UserFname"];
    	$UserCampus =$row["UserCampus"];
    	$UserAgreed =$row["UserAgreed"];

    	//lazy way of checking user types
    	if ($UserTypeUID == '1') {
    		$UserTypeUID = 'Student';
    	}
    	elseif ($UserTypeUID = '2') {
    		$UserTypeUID = 'Admin';
    	}
    	elseif ($UserTypeUID = '3') {
    		$UserTypeUID = 'Staff';
    	}
        if ($UserAgreed == 0) {
            $UserAgreed = 'Not Agreed';
        }
        elseif ($UserAgreed == 1) {
            $UserAgreed = 'User Agreed';
        }


    	 echo "<tr>
		    	 <td>$UserUID</td>
		    	 <td>$UserTypeUID</td>
		    	 <td>$UserBanned</td>
		    	 <td>$UserYear</td>
		    	 <td>$UserEmail</td>
		    	 <td>$UserFname</td>
		    	 <td>$UserCampus</td>
		    	 <td>$UserAgreed</td>
		    	 <td><input type='submit' value='Update'></td>
		    	 <td><input type='submit' value='Delete'></td>
    	 		</tr>"; // delete does not do anything yet
    }
} else
{
    echo "0 results";
}
mysqli_close($conn);
?>