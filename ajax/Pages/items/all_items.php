  <!--
    **This page shows the user all the items within the database, this uses an sql statement to select all of the information in the database

    **eventaully you should be able to choose a data and then see if the item is avalible on that day, if it is it will show, if it is not it wont 

    ** the pages uses Jquery for the data picker, this is how the user will evetually click on a data and it should show 

    **the sql using order by random to display the items in a different order each time, this might want to be changed 

    **The page was created by James Davis, and Marie
    **Commented by James Davis

    **Tasks for this page
      * choose how the items should be orderd on the page 
      * allow the user to filter items
      * get the items to show up based on the date they are avaliable <-The Important one 

    -->
    <!-- Script is for the data picker, using this will show the data picker when its needed -->
  <style>
    a{
      color: black;
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
        float: left;
    }
  </style>
<script>
    $(document).ready(function() {
        $('.catalog_item').click(function() {
            var jamjam = $(this).attr("value");
            $(".holder").load("ItemPage/GetItemInfro.php?id="+jamjam+"");
        });
    });
</script>



  <!-- Show the date picker on the page, put the button and that within the p tag or it dont work bro --> 
  <p>&nbsp;</p> 
  



  <!--you know if you connect to the database you would be able to use it? who knew am i right-->
  <?php require '../../../php/Conection.php';

  echo "
        <select id='FilterItems' class='BookButton' name='FilterItems'>
        <option value='0'>All Items</option>
        <option value='1'>Books</option>
        <option value='2'>Lego</option>
        <option value='3'>Pi</option>
        <option value='4'>EEG Headset</option>
  </select> <br><br><br>

  " ;
  // selecting all the assets from the asset table, then ordering them, maybe we dont need order by random, but its looks different each time yo
  $sql = "SELECT * FROM Asset ORDER BY RAND()";
  $result = mysqli_query($conn, $sql);


  //once we got that stuff from the db
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     $ItemID =$row["AssetUID"];
     $AssetType = $row["AssetTypeUID"];
     $OwnerID =$row["OwnerUID"];
     $ItemName =$row["AssetDescription"];
     $ImageLink =$row["AssetImage"];

     if ($AssetType == 1) { // Book
       $AssetType = "Book"; // Book
       $TypeCss = "ItemBook"; // ItemBook
       $MyHeight = 283;
       $MyWidth = 220;
       // set the hight and width for different types of Item that is on the page 
     }
     if ($AssetType == 2) { //lego
       $AssetType = "Lego"; // Lego
       $TypeCss = "ItemLego"; //  ItemLego
       $MyHeight = 283;
       $MyWidth = 400;
     }
      if ($AssetType == 3) { // Pi
       $AssetType = "Pi"; // Pi
       $TypeCss = "ItemPi"; // ItemPi
       $MyHeight = 283;
       $MyWidth = 400;
     }
      if ($AssetType == 4) { // EEG HEADSET
       $AssetType = "EEG Headset"; // Pi
       $TypeCss = "ItemEEGHeadset"; // ItemPi
       $MyHeight = 283;
       $MyWidth = 400;
     }

     echo "<div class='catalog_item $TypeCss' value='$ItemID'><div class='item_overlay'>$ItemName $AssetType  </div> <img src='ajax/Pages/Inventory/images/$ImageLink' height='$MyHeight' width='$MyWidth'> </div>";
   }
 } else {
  echo "0 results";
}

mysqli_close($conn);


?>

<!-- now we better send the date, i might have thought of a better way to do this, idk yet-->
<script>
      $('#SubmitDate').click(function() { //wait for the button to be pressed, this will need a name change 
      var Date = $('#datepicker').val(); // set Date to the date picked

      
          $.ajax({ // now the ajax
          type: 'POST', // we are posting it 
          url: 'php/AvailableItems.php', // this is where we're posting 
          data: { ItemName: Date }, // set the php values
          success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);

          }
        });
        });
      </script>
<script>
  $('#FilterItems').change(function() {
    var jamjamjam = $(this).val(); 
    if (jamjamjam == 0)//book 
    {
      $(".ItemBook").show();
      $(".ItemPi").show();
      $(".ItemLego").show();
      $(".ItemEEGHeadset").show();
    }
    if (jamjamjam == 1)//book 
    {
      $(".ItemBook").show();
      $(".ItemPi").hide();
      $(".ItemLego").hide();
      $(".ItemEEGHeadset").hide();
    }
    if (jamjamjam == 2)//book 
    {
      $(".ItemBook").hide();
      $(".ItemPi").hide();
      $(".ItemLego").show();
      $(".ItemEEGHeadset").hide();
    }
     if (jamjamjam == 3)//book 
    {
      $(".ItemBook").hide();
      $(".ItemPi").show();
      $(".ItemLego").hide();
      $(".ItemEEGHeadset").hide();
    }
     if (jamjamjam == 4)//book 
    {
      $(".ItemBook").hide();
      $(".ItemPi").hide();
      $(".ItemLego").hide();
      $(".ItemEEGHeadset").show();
    }


});
</script>