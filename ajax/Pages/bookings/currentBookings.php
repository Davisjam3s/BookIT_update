<!-- this page shows the user all of their current loans by connection to the db.  The delete button doesnt work YET--> 
<?php
echo "<p>Your Bookings</p>"; // dont delete this the <p> is what stops everything hiding under the menu bar!

//need to use the users information and the database connection files
require '../../../php/user_info.php';
require '../../../php/Conection.php';

//this is the sql to get all the needed info from the joined tables to show the user their bookings

// hey guys i just changed the SQL so it orders it by the most recent booking first this was done byt using ORDER BY DESC which you can see below
	$sql = "SELECT Asset.AssetDescription, Loan.LoanDate, Loan.LoanConfirm, LoanContent.ReturnDate, User.UserFName, Owner.OwnerLocation, User.UserCampus 
	FROM Loan 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID 
	JOIN User on Owner.OwnerUID = User.UserUID  
	WHERE Loan.UserUID = '$user' ORDER BY Loan.LoanUID DESC ";
	 
	//just a variable to store the query result
	$result = mysqli_query($conn, $sql);

		//if there is a result from the query (the user does have loans) put headers into a table
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		echo "<table>
			<tr class='toptitles'>
				<th>Item</th>
				<th>Pickup Date</th>
				<th>Return Date</th>
				<th>Owners Name</th>
				<th>Item Location</th>
				<th>Campus</th>
				<th>Status</th>
				<th>Cancel</th>				
			</tr>";
			//use the results as variables
		while($row = mysqli_fetch_assoc($result)) 
		{
			$Asset =$row["AssetDescription"];
			$LoanDate =$row["LoanDate"];
			$Confirmed = $row["LoanConfirm"];
			if ($Confirmed == 0){
					$Confirmed ="Pending";
				}
			elseif ($Confirmed == 1){
					$Confirmed = "Confirmed";
				}
			elseif ($Confirmed == 2){
					$Confirmed = "Refused";
				}
			$ReturnDate = $row["ReturnDate"];
			$UserFName = $row['UserFName'];
			$OwnerLocation =$row["OwnerLocation"];
			$UserCampus =$row["UserCampus"];
			
					//use the variables as the table data
			 echo "<tr class='$Asset'>
					 <td>$Asset</td>
					 <td>$LoanDate</td>
					 <td>$ReturnDate</td>
					 <td>$UserFName</td>
					 <td>$OwnerLocation</td>
					 <td>$UserCampus</td>
					 <td>$Confirmed</td>
					 
					 <td><button class='deleteItem $Asset' value='$Asset' id='Infobutton1'>Delete</button></td>
					</tr>"; // delete does not do anything yet but we will do something with it later
		}
	} else //if the user does not have any loans
	{
		echo "<table>
			<tr class='toptitles'>
				<th>Item</th>
				<th>Pickup Date</th>
				<th>Return Date</th>
				<th>Owners Name</th>
				<th>Item Location</th>
				<th>Campus</th>
							
			</tr>";
	}
	mysqli_close($conn);
	?>
	<!---insert into Loan (UserUID, LoanDate)values ('mh709', '2017-02-21');
	insert into LoanContent (LoanUID, AssetUID,SetReturn,ReturnDate)values (1,409,1,'2017-03-21');-->