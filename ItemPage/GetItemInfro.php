<?php require '../php/Conection.php';?>
<?php
$Item_ID = $_REQUEST['id'];
$sql = "SELECT * FROM Asset WHERE AssetUID = $Item_ID  ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) 
    {
    	$AssetUID =$row["AssetUID"];
		$AgreementType =$row["AgreementUID"];
		$OwnerUID =$row["OwnerUID"];
		$AssetType = $row['AssetTypeUID'];
    	$AssetDescription =$row["AssetDescription"];
		$AssetCondition =$row["AssetCondition"];
		$AssetImage = $row["AssetImage"];
    	$AssetType =$row["AssetTypeUID"];   	
    	$Restriction =$row["AssetRestriction"];
    	$AssetInBasket =$row["AssetInBasket"];    	 
    }
} else
{
    echo "This Item Does not exist";
}
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
    	
    	if ($AssetType == 1 ) {
    		$AssetType = 'Book';
    		$MyHeight = 400;
       		$MyWidth = 350;
    	}
    	if ($AssetType == 2 ) {
    		$AssetType = 'Lego';
    		$MyHeight = 250;
       		$MyWidth = 150;
    	}
    	if ($AssetType == 3 ) {
    		$AssetType = 'Pi';
    		$MyHeight = 350;
       		$MyWidth = 450;
    	}
      	if ($AssetType == 4 ) {
        	$AssetType = 'EEG Headset';
        	$MyHeight = 350;
       		$MyWidth = 450;
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
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "$AssetDescription";  ?></title>
	<style>
		body, html{
			background-color: #ebebeb;
		}
		.ItemHolder{
			width: 100%;
			height: auto;
			margin-left: 0;
			background-color: yellow;
			text-align:none;
		}
		.ItemTitle{
			text-align: center;
			background-color: blue;
			width: 100%;
			font-size: 2em;
			overflow: auto;
			
		}
		.ItemImage{
			overflow: auto;
			float: left;
			height: auto;
			width: auto;
			
		}
		.ItemStats{
			background-color: #FF69B4;
			width: 10em;
			font-size: 1.5em;
			overflow: auto;

		}
		.BookButton{
  			background:none;
  			border: none;
  			background-color: #05345C;
  			width: 10em;
  			font-size: 2em;
  			color: white;
  			margin-bottom: 1px;
  			min-width: 25%;
  			cursor: pointer;
		}
		@media only screen and (max-width: 768px) {
			.BookButton, .ItemStats{
				width: 100%;
			}
		}
	</style>
</head>
<body>



<?php echo "<p>$AssetDescription</p>"; ?>

<div class="ItemImage">
	<?php echo "<img src='ajax/Pages/Inventory/images/$AssetImage' height='$MyHeight' width='$MyWidth'>";  ?>
</div>

<div class="ItemStats">
	ItemID : <?php echo "$AssetUID"; ?><br>
	Type : <?php echo "$AssetType"; ?><br>
	Condition : <?php echo "$AssetCondition  "; ?><br>
	Restriction : <?php echo "$Restriction"; ?><br>
	AgreementType : <?php echo "$AgreementType"; ?><br>
	In Basket? : <?php echo "$AssetInBasket"; ?><br>
	Owner : <?php echo "$OwnerUID "; ?><br>
</div>

<div class="buttonHolder">




	<select id="advanced" class="BookButton" name="advanced">
		<?php // this is for getting the days, the user can choose the day they want to collect the item
			$dayday = 1; // this is a verible used to count and set the value
			$mydate2 = date("Y/m/d"); // set the date for today 
			while($dayday<= 182) { // lets half year 
			$dateadd2 = date('Y/m/d', strtotime($mydate2. '+'.$dayday.' days')); // this is the value we needl, we needed to add 7 days to the current date so lets add them days 
    		echo "<option value='$dayday'>$dateadd2</option>"; // echo them out in within the option box 
   			$dayday++; // add one to this so it can add more day
			} 
		?>
	</select>
	<br>
	
	<select id="DaysBooked" class="BookButton" name="DaysBooked">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
	</select>
	<div id="result">
		
	</div>

<?php echo "<button class='BookButton BookBook' value='$AssetUID'>BOOK NOW</button><br>";?>


	
	<button class="BookButton Catalogue">Catalogue</button><br>
	<span style="font-size: 0.7em;">You Can press this button all you want but it dont work yet</span>
</div>
<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);
?>

<script>
	$(document).ready(function() // when the document is ready
    {
    	$(".Catalogue").click(function() // when has this div been pressed?
            {
            	
                $("Title").text("BookIT|Catalogue"); // change the title
            	$(".holder").show(); // show the hidden div
            	$(".holder").load("ajax/Pages/items/all_items.php"); // fill the hidden div
            });
    });
    // end of bacl to catalog
</script>
<script>
	$('.BookBook').click(function() {
		var jamjam = $(this).attr("value"); 
	   	var val1 = $('#advanced').val();	
		var val2 = $('#DaysBooked').val();
		$.ajax({ 
		type: 'POST', 
        url: 'ItemPage/InsertLoan.php?id='+jamjam+'', 
        data: { advanced: val1 , DaysBooked: val2 }, 
        success: function(response) {
            $('#result').html(response);
            $(".BookBook").attr("disabled", true).css("background-color", "yellow");
        }
        });
});
</script>


</body>
</html>