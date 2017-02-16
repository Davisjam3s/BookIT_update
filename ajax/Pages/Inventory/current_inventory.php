
<style>
    .phpechofront1,.phpechofront2{
        display: none;
    }
    input, select{
      width: 100%;
      border: none;
      background-color: transparent;
    }
    input:disabled, select:disabled{
      color: black;
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
$sql = "SELECT Asset.AssetUID,Agreement.AgreementUID,Agreement.AgreementName,Owner.OwnerUID,Asset.AssetTypeUID,Asset.AssetDescription,Asset.AssetCondition,Asset.AssetRestriction FROM Asset LEFT JOIN Owner ON Asset.OwnerUID=Owner.OwnerUID LEFT JOIN Agreement ON Asset.AgreementUID=Agreement.AgreementUID WHERE Owner.OwnerUID='$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>
		<tr class='toptitles'>
			<th>AssetUID</th>
			<th>AgreementName</th>
			<th>AgreementUID</th>
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
		$AgreementName = $row["AgreementName"];
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
    		$ItemType = 'Book';
    	}
    	if ($ItemType == 2 ) {
    		$ItemType = 'Lego';
    	}
    	if ($ItemType == 3 ) {
    		$ItemType = 'Pi';
    	}
      if ($ItemType == 4 ) {
        $ItemType = 'EEG Headset';
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
				 <td>$AgreementName</td>
		    	 <td>
                    <select class='Agreement$Asset' disabled='true'>
                        <option value='' selected disabled>$AgreementType</option>
                        <option value='3'>EEG Agreement</option>
                        <option value='4'>Ians Agreement</option>
                        <option value='5'>Matteo Agreement</option>
                        <option value='6'>None</option>
                    </select>
                 </td>

		    	 <td>$ItemType</td>
		    	 <td><input class='Description$Asset' disabled='true'  value='$AssetDescription'></td>
		    	 <td>
                    <select class='Condition$Asset' disabled='true'>
                        <option value='' selected disabled>$AssetCondition</option>
                        <option value='1'>Perfect</option>          
                        <option value='2'>Minor scuffs</option>
                        <option value='3'>Some Damage</option>
                        <option value='4'>Broken</option>
                     </select>
                 </td>
		    	 <td>
                    <select class='Restriction$Asset' disabled='true'>
                        <option value='' selected disabled>$Restriction</option>
                        <option value='1'>All</option>
                        <option value='2'>Third Year or Above</option>
                        <option value='3'>PostGrad only</option>
                        <option value='4'>Tutors Only</option>
                    </select>
                 </td>
                 <td><button class='deleteItem $Asset' value='$Asset' id='Infobutton1'>Delete</button></td>
                 <td><button class='editItem $Asset' value='$Asset' id='Infobutton2'>Edit</button></td>
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
            var  jam =  $(this).val(); // value of the button 
           
          $( "input[class*="+jam+"]" ).prop('disabled',false).height(40); // enable any class with varible
          $( "select[class*="+jam+"]" ).prop('disabled',false).height(40); // enable any input type select with varible 
          $( "input[class|='Description"+jam+"']" ).attr("id","Description");
          $( "select[class|='Agreement"+jam+"']" ).attr("id","Agreement");
          $( "select[class|='Condition"+jam+"']" ).attr("id","Condition");
          $( "select[class|='Restriction"+jam+"']" ).attr("id","Restriction");
          $( "#Infobutton2").addClass(jam);
          $( ".CancelDelete").addClass(jam);


          $(".toptitles").addClass(jam);
          $("button").not("button[class*="+jam+"]").prop('disabled',true);

          // this jquery enables the text box when the button is pressed, it also sets an attribute to the ones that are selected, givving them the ID that will be used to send to the database 
          // var jam is used to store the value that is collected from the button 
          $("tr").not("tr[class*="+jam+"]").hide("slow"); // this only shows the field that you would want to edit
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
       $(".holder").load("ajax/Pages/Inventory/current_inventory.php");
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