<!-- this page shows the owner all of the pending loans awaiting confirm or deny. possible recall at a later date  The confirm and deny button doesnt work YET--> 
<?php
echo "<p>Bookings of your Inventory</p>"; // dont delete this the <p> is what stops everything hiding under the menu bar!

//need to use the users information and the database connection files
require '../../../php/user_info.php';
require '../../../php/Conection.php';

//this is the sql to get all the needed info from the joined tables to show the owners bookings

// this sql statement brings in all information about possible bookings for that owner
	$sql = "SELECT Asset.AssetDescription, Loan.LoanUID,Loan.LoanDate, LoanContent.ReturnDate, User.UserEmail, Owner.OwnerLocation, User.UserCampus 
	FROM User 
	JOIN Loan on User.UserUID = Loan.UserUID 
	JOIN LoanContent on Loan.LoanUID = LoanContent.LoanUID 
	JOIN Asset on LoanContent.AssetUID = Asset.AssetUID 
	JOIN Owner on Asset.OwnerUID = Owner.OwnerUID  
	WHERE Owner.OwnerUID = '$user' ORDER BY Loan.LoanUID DESC ";
	 
	//just a variable to store the query result
	$result = mysqli_query($conn, $sql);

		//if there is a result from the query (the user does have loans) put headers into a table
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		echo "<table>
			<tr class='toptitles'>
				<th>Loan No</th>
				<th>Item</th>
				<th>Pickup Date</th>
				<th>Return Date</th>
				<th>Users Email</th>
				<th>Status</th>
				<th>Confirm</th>
				<th>Deny</th>
			</tr>";
			//use the results as variables
		while($row = mysqli_fetch_assoc($result)) 
		{
			$LoanID=$row['LoanUID'];
			$Asset =$row["AssetDescription"];
			$LoanDate =$row["LoanDate"];
			$ReturnDate = $row["ReturnDate"];
			$UserEmail = $row['UserEmail'];
			$OwnerLocation =$row["OwnerLocation"];
			$UserCampus =$row["UserCampus"];
			
					//use the variables as the table data
			echo 	"<tr class='$Asset'>
						<td>$LoanID</td>
						<td>$Asset</td>
						<td>$LoanDate</td>
						<td>$ReturnDate</td>
						<td>$UserEmail</td>
						<td>somone write the sql, many loves james</td>
						<td><button >Confirm</button></td>
						<td><button >Deny</button></td>
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