
<?php 

$x = 1; 

echo "<p>All items</p>";
while($x <= 52) {
    echo "<div class='catalog_item'><div class='item_overlay'>Item $x </div>$x</div>";
    $x++;
} 

?>