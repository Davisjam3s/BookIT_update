<script>
    $(document).ready(function() {
        $('.catalog_item').click(function() {
            var jamjam = $(this).attr("value");
            $(".mainp").hide();
            $(".holder").load("ItemPage/GetItemInfro.php?id="+jamjam+"");
        });
    });
</script>
<style>
.mySlides {
    display:none;
    height: 400px;
    width: 100%;
}
.w3-content{
    margin-left: 0;
}
.w3-section{
    margin-top:16px!important;
    margin-bottom:16px!important;
}
.newhold{
    width: 100%;
    height: inherit;
    background-color: black;
    color: white;
    text-align: center;
    text-transform: capitalize;
}
.innerbox{
    width: 33.33333333333333%;
    background-color: red;
    height: 250px;
    float: left;
    color: black;
    overflow: hidden;
}
h1{
    color: black;
    background-color: white;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;

}
@media only screen and (max-width: 768px) {
    .mySlides{
    display:none;
    height: 150px;
    width: 100%;
}
.innerbox{
    width: 100%;
}
h1{
    font-size: 1em;
}

}


</style>
<body>


<div class="w3-content w3-section" style="width: 100%;">
  <img class="mySlides" src="images/slideshow/pic1.jpg">
  <img class="mySlides" src="images/slideshow/pic2.jpg">
  <img class="mySlides" src="images/slideshow/pic3.jpg">
  <img class="mySlides" src="images/slideshow/pic4.jpg">
  <img class="mySlides" src="images/slideshow/matt.jpeg">
  <img class="mySlides" src="images/slideshow/pic5.jpg">
  <img class="mySlides" src="images/slideshow/pic6.jpg">
  <img class="mySlides" src="images/slideshow/pic7.jpg">
  <img class="mySlides" src="images/slideshow/pic8.jpg">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500); // Change image speed
}
</script>
<?php require 'php/Conection.php';

  // selecting all the assets from the asset table, then ordering them, maybe we dont need order by random, but its looks different each time yo
  $sql = "SELECT * FROM Asset where AssetTypeUID = 1 ORDER BY RAND() limit 11";
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
       $MyHeight = 250;
       $MyWidth = 145;
       // set the hight and width for different types of Item that is on the page 
     }
     

     echo "<div class='catalog_item $TypeCss' value='$ItemID '><div class='item_overlay'>$ItemName $AssetType </div> <img src='ajax/Pages/Inventory/images/$ImageLink' height='$MyHeight' width='$MyWidth'> </div>";
   }
 } else {
  echo "0 results";
}

mysqli_close($conn);


?>




