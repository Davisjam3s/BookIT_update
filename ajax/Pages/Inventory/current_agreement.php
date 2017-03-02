<!--
  ** This page was created so the inventoiry owner can see their own items, this will allow them to see what items they have in their own inventory

  ** this Page also allows the the user to edit their items which they have, incase they need to update the status of a certain item or if they made a mistake when adding the item 

  ** css on this page directly means that we only want the css to work on this page. although if we diecied to edit like this on other pages it might be needed 

  ** this page uses jquery in order to active boxes, create varibles and move IDs around, this was done so that only one editable box would have one ID at a time as if each textfield had the same id it would not work

  ** Matt should comment about the SQL he did it not me - James
  
  ** there are alot of PHP if statements on this page, this was just a cheap way to turn numbers into text, although this could be read from the datbase 

  ** The page echos out a table that shows the inventory of the currentowner who is logged in 

  ** The page has script that gets that finds the class of a particular field and gives it a new ID, this ID is used to collected the information when it is entered into the database, it does this by gettting the varible from the button that is clicked, this being given to the button when it is echoed out onto the page. it then gathers this information and then uses ajax to put this information into the page. giving the approprate text feilds the correct ID's. it also hides the other table elements that are not needed as we dont need to worry about those when we're not using them

  ** This pages was created by James D, Marie H, Matt H
  ** This page Has been commented by James D

  ** To Do list for this page 
    *refactor code
    * styles need their own home, altough they are only read b this page or they will mess up styles on other pages 
    * scripts could do with being moved

-->
<style>


    .viewAgreement {
      width: 100%;
      height: 100%;
    }
	.AgreementBox
	{
		
		width: 60%;
		height: 15em;
		
	}

</style>




<?php
echo "<p>Agreements</p>"; // dont delete this
?>
<div align="center">
    <textarea class='AgreementBox'id='result'></textarea>
</div>
<?php require '../../../php/Conection.php';?>
<?php

	
$sql = "SELECT * from Agreement";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>
		<tr class='toptitles'>
			<th>AgreementUID</th>
			<th>AgreementName</th>
			<th>AssetDescription</th>
			<th>View</th>
			
		</tr>";
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$AgreementUID =$row["AgreementUID"];
		$AgreementName = $row["AgreementName"];
    	$AgreementDescription =$row["AgreementDescription"];

    	 echo "<tr class='$AgreementUID'>
		    	 <td>$AgreementUID</td>
				 <td>$AgreementName</td>
				 <td>$AgreementDescription</td>
                 <td><button class='viewAgreement' value='$AgreementUID' id='Infobutton1'>View</button></td>
    	 		</tr>";						
    }

} else
{
    echo "0 results";
}

mysqli_close($conn);
?>

<script>
    $('.viewAgreement').click(function() {

        var jamjam = $(this).val(); 
        var val1 = jamjam;
        $.ajax({ 
        type: 'POST', 
        url: 'ajax/Pages/Inventory/getAgreementDesc.php', 
        data: { Description: val1}, 
        success: function(response) {
            $('#result').html(response);
        }
        });
});
</script>








</table>