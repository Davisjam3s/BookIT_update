
<script>
	$('.res').on('change', function() {
		if (this.value == 1) 
		{
			$(".restext").show();
			$(".restext").load("ajax/Pages/Inventory/alltext.txt");
		}
		else if (this.value == 2) 
		{
			$(".restext").show();
			$(".restext").load("ajax/Pages/Inventory/tutorsonly.txt");
		}
		else if (this.value == 3) 
		{
			$(".restext").show();
			$(".restext").load("ajax/Pages/Inventory/withsupervision.txt");
		}
	})
</script> <!--some amazing jquery, oh yes,that user can load stuff, only load things i let them-->
<style>

	.restext
	{
		display: none;
		font-family: 'Amaranth', sans-serif;
	}
	.formItems
	{
		margin-top: 1em;
		text-align: center;
		font-family: 'Amaranth', sans-serif; /*what a nice font*/
		font-size: 1em;
	}
	.addextra
	{
		width: 25em;
		height: 5em;
	}

</style><!-- dont worry fam, i will move these later-->
	<p>Add item</p> <!--did you know, I The amazing james, Forgot to add this and broke the page for 3 hours?-->
	<form name="usrform"> <!--thats right, a form, for doing formy things-->
		<input type="text" class="formItems" name="Item_Name" placeholder="Item Name"><br>
		<select class="formItems">
			<option value="1" selected disabled>Type</option> <!--haha trying using that-->
			<option value="1">Book</option>
			<option value="2">Pi</option>
			<option value="3">Lego</option>
			<option value="4">Other</option>
		</select>
		<br>
		<select class="formItems res">
			<option value="0" selected disabled class="res">Restrictions</option>
			<option value="1">All</option>
			<option value="2">Tutors Only</option>
			<option value="3">With Supervision</option>
		</select>
		<div class="restext">hello</div>
		<br>
		<textarea name="comment" class="formItems addextra" form="usrform" placeholder="addition Info, and description"></textarea>
		<br>
		<input  class="formItems" type="submit" value="Confirm" name="add_item">
		<br>
	</form> <!--this is no longer a form-->




