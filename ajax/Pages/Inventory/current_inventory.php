<style>
    .phpechofront1,.phpechofront2{
        display: none;
    }
</style>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".deleteItem").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront1").show(); // show the main nav
      });
  });
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".editItem").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront2").show(); // show the main nav
      });
  });
</script>
<?php
echo "<p>Your Inventory</p>"; // dont delete this
?>
<?php require 'user_info.php' ?>
<?php require '../../../php/Conection.php';?>
<?php
$sql = "SELECT * FROM Asset WHERE OwnerUID = '$user' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>
		<tr class='toptitles'>
			<th>AssetUID</th>
			<th>AgreementUID</th>
			<th>OwnerUID</th>
			<th>AssetTypeUID</th>
			<th>AssetDescription</th>
			<th>AssetCondition</th>
			<th>AssetRestriction</th>
			<th>Delete</th>
            <th>Edit</th>
			
		</tr>";
    while($row = mysqli_fetch_assoc($result)) 
    {
    	$Asset =$row["AssetUID"];
		$AgreementType =$row["AgreementUID"];
    	$Owner =$row["OwnerUID"];
		$AssetType = $row['AssetTypeUID'];
    	$AssetDescription =$row["AssetDescription"];
		$AssetCondition =$row["AssetCondition"];
    	
    	$ItemType =$row["AssetTypeUID"];   	
    	$Restriction =$row["AssetRestriction"];
    	
    	

    	if ($AgreementType == 3 ) {
    		$AgreementType = 'EEG Agree';
    	}
        if ($AgreementType == 4 ) {
            $AgreementType = 'Ian Agree';
        }
         if ($AgreementType == 5 ) {
            $AgreementType = 'Matteo Agree';
        }
         if ($AgreementType == 6 ) {
            $AgreementType = 'None';
        }
    	
    	if ($ItemType == 1 ) {
    		$ItemType = 'Pi';
    	}
    	if ($ItemType == 2 ) {
    		$ItemType = 'Book';
    	}
    	if ($ItemType == 3 ) {
    		$ItemType = 'Lego';
    	}
    	if ($AssetCondition == 1 ) {
    		$AssetCondition = 'Perfect';
    	}
    	if ($AssetCondition == 2 ) {
    		$AssetCondition = 'Minor Scuffs';
    	}
    	if ($AssetCondition == 3 ) {
    		$AssetCondition = 'Some Damage';
    	}
    	if ($AssetCondition == 4 ) {
    		$AssetCondition = 'Broken';
    	}
		if ($Restriction ==1){
			$Restriction = 'All';
		}
		if ($Restriction ==2){
			$Restriction = 'Third Year and Above';
		}
		if ($Restriction ==3){
			$Restriction = 'Post Grads only';
		}
		if ($Restriction ==4){
			$Restriction = 'Tutors only';
		}


    	 echo "<tr class='$Asset'>
		    	 <td>$Asset</td>
		    	 <td>
                    <select class='$Asset' id='Agreement' disabled='true'>
                        <option value='' selected disabled>$AgreementType</option>
                        <option value='3'>EEG Agreement</option>
                        <option value='4'>Ians Agreement</option>
                        <option value='5'>Matteo Agreement</option>
                        <option value='6'>None</option>
                    </select>
                 </td>
		    	 <td>$Owner</td>
		    	 <td>$ItemType</td>
		    	 <td><input class='$Asset' disabled='true' id ='Description' value='$AssetDescription'></td>
		    	 <td>
                    <select class='$Asset' disabled='true' id='Condition' name='Condition'>
                        <option value='' selected disabled>$AssetCondition</option>
                        <option value='1'>Perfect</option>          
                        <option value='2'>Minor scuffs</option>
                        <option value='3'>Some Damage</option>
                        <option value='4'>Broken</option>
                     </select>
                 </td>
		    	 <td>
                    <select class='$Asset' disabled='true' id='Restriction' name='Restriction'>
                        <option value='' selected disabled>$Restriction</option>
                        <option value='1'>All</option>
                        <option value='2'>Third Year or Above</option>
                        <option value='3'>PostGrad only</option>
                        <option value='4'>Tutors Only</option>
                    </select>
                 </td>
                 <td><button class='deleteItem' value='$Asset' id='Infobutton1'>Delete</button></td>
                 <td><button class='editItem' value='$Asset' id='Infobutton2'>Edit</button></td>
    	 		</tr>"; // delete does not do anything yet
    }
} else
{
    echo "0 results";
}
mysqli_close($conn);
?>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".editItem").click(function() // wait till this button has been pressed
      { 
            var  jam =  $(this).val();
           
          $( "input[class*="+jam+"]" ).prop('disabled',false).height(40);
          $( "select[class*="+jam+"]" ).prop('disabled',false).height(40);
          //$("tr").not("tr[class*="+jam+"]").hide("slow");



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


<div class='phpechofront1'>
    <h1 class='agreeTitle'>Removing Item</h1>
    <h2 class='help'>By deleting this Item all the Assets will be lost</h2>
        <input type='text' id='ItemName' required class ='FormItems testname' disabled='true'>
    <span id='error'></span>
        <button id='Infobutton1' class='FormItems'> Submit </button>
        <button  class='FormItems CancelDelete'> Cancel </button>
</div>

<div class='phpechofront2'>
    <h1 class='agreeTitle'>Editing Item</h1>
    <h2 class='help'>Edit this fine Asset</h2>
        <input type='text' id='ItemName' required class ='FormItems testname' disabled='true'>
    <span id='error'></span>
        <button id='Infobutton2' class='FormItems'> Submit </button>
        <button   class='FormItems CancelDelete'> Cancel </button>
</div>
<script>
$(document).ready(function() {
        $('.deleteItem').click(function() {
            $(".testname").val($(this).val());

        });
    });
    
</script>
<script>
$(document).ready(function() {
        $('.editItem').click(function() {
            $(".testname").val($(this).val());

        });
    });
    
</script>
<script>
$(document).ready(function() // wait till the page is ready
{
    $(".CancelDelete").click(function() // wait till this button has been pressed
      { 
          $(".phpechofront1").hide(); // show the main nav
		  $(".phpechofront2").hide();
      });
  });
</script>
<script>
    $('#Infobutton1').click(function() { //wait for the button to be pressed, this will need a name change 
       var val1 = $('#ItemName').val(); 

        
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Inventory/remove_inventory.php', // this is where we're posting 
        data: { AssetUID: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $(".holder").load("ajax/Pages/Inventory/current_inventory.php");
        }
        });
});
</script>
<script>
    $('#Infobutton2').click(function() { //wait for the button to be pressed, this will need a name change 
       var val1 = $('#ItemName').val();
	   var val2 = $('#Description').val();
	   var val3 = $('#Agreement').val();
	   var val4 = $('#Condition').val();
	   var val5 = $('#Restriction').val();
        
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ajax/Pages/Inventory/edit_inventory.php', // this is where we're posting 
        data: { AssetUID: val1,Description: val2,Agreement: val3,Condition: val4,Restriction: val5}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $(".holder").load("ajax/Pages/Inventory/current_inventory.php");
        }
        });
});
</script>
</table>