<?php
$servername = "dragon.kent.ac.uk"; //server name
$username = "m04_bookit"; // username for server
$password = "b*asiis"; // password for server
$dbname = "m04_bookit"; // name of the database on the server

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // check for connection error
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>attribuUpdateartsWith demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<?php
$sql = "SELECT UserUID, UserTypeUID,UserEmail,UserFname,UserCampus FROM User where UserTypeUID>='1' order by UserUID";//this will be changed when we need admin level changed
$result = mysqli_query($conn, $sql);
echo "<table>
		<tr>
			<th>UserUID</th>
			<th>UserTypeUID</th>
			<th>UserEmail</th>
			<th>UserFname</th>
			<th>UserCampus</th>
			<th>Create Owner</th>
			<th>Delete Owner</th>
			<th>Edit Owner</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$UserUID =$row["UserUID"];
    	$UserTypeUID =$row["UserTypeUID"];
    	$UserEmail =$row["UserEmail"];
    	$UserFname =$row["UserFname"];
    	$UserCampus =$row["UserCampus"];

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
		elseif ($UserTypeUID = '4'){
			$UserTypeUID = 'Post Grad';
		}

		 if ($UserCampus == 1) {
            $UserCampus = 'Canterbury';
        }
        elseif ($UserCampus == 2) {
            $UserCampus = 'Medway';
        }
       



    	 echo "<tr>
		    	 <td>$UserUID</td>
		    	 <td>$UserTypeUID</td>
		    	 <td>$UserEmail</td>
		    	 <td> <input class='$UserUID' disabled='true' value='$UserFname'></td>
		    	 <td>$UserCampus</td>
				 <td><button value='$UserUID' class='owner' id='Infobutton'>Make Owner</button></td>
				 <td><button value='$UserUID' class='Downer' id='Infobutton1'>Remove Owner</button></td>
				 <td><button value='$UserUID' class='Eowner' id='Infobutton2'>Edit Owner</button></td>
		    	 <td><button value='$UserUID' class='Update' id='Infobutton2'>Edit Name</button></td>
		    	 <td><input type='submit' value='Delete'></td>
    	 		</tr>"; // delete does not do anything yet
    }
} else
{
    echo "<h2>No Owners On Database yet</h2>";
}

mysqli_close($conn);
?> 





 
<input class="1" disabled="true" name="newsletter">
<button class="Update" value="1">Update</button>
<button class="Done" value="1">Done</button>
<br>

<input class="2" disabled="true" name="milkman">
<button class="Update" value="2">Update</button>
<button class="Done" value="2">Done</button>
<br>
<input class="3" disabled="true" name="newsboy">
<button class="Update" value="3">Update</button>
<button class="Done" value="3">Done</button>
<script>


$(document).ready(function() // wait till the page is ready
{
    $(".Update").click(function() // wait till this button has been pressed
      { 
      		var  jam =  $(this).val();
      		alert(jam);
          $( "input[class*="+jam+"]" ).prop('disabled',false);
         
      });
  });
$(document).ready(function() // wait till the page is ready
{
    $(".Done").click(function() // wait till this button has been pressed
      { 
      		var  jam =  $(this).val();
          $( "input[class*="+jam+"]" ).prop('disabled',true);
      });
  });
</script>
 
</body>
</html>