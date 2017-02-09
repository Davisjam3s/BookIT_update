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
    <script>
     $(function() {
      $( "#datepicker" ).datepicker();
      $( "#datepicker" ).datepicker("show");

    });
  </script>


  <!-- Show the date picker on the page, put the button and that within the p tag or it dont work bro --> 
  <p>Enter Date To Check Available Items: <input type = "text" id = "datepicker"> <button id="SubmitDate">check</button></p> 



  <!--you know if you connect to the database you would be able to use it? who knew am i right-->
  <?php require '../../../php/Conection.php';

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

     if ($AssetType == 1) {
       $AssetType = "Pi";
       $TypeCss = "ItemPi";
        $MyHeight = 283;
       $MyWidth = 400;
     }
     if ($AssetType == 2) {
       $AssetType = "Book";
       $TypeCss = "ItemBook";
       $MyHeight = 283;
       $MyWidth = 220;
     }
      if ($AssetType == 3) {
       $AssetType = "Lego";
       $TypeCss = "ItemLego";
       $MyHeight = 283;
       $MyWidth = 400;
     }


     echo "<div class='catalog_item $TypeCss'><div class='item_overlay'>$ItemName $AssetType </div> <img src='ajax/Pages/Inventory/images/$ImageLink' height='$MyHeight' width='$MyWidth'> </div>";
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