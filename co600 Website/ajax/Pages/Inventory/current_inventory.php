<?php 
$x = 1; 
$date = date("d-m-y");
$ptime = "11:00";
$dtime = "12:00";
echo "<p>Current Inventory</p>";
echo "<table><tr><th>Item Name</th><th>Item Type</th><th>Booked?</tr>";
while($x <= 10) {
    
    echo "<tr><td>Raspberry pi</td><td>Pi</td><td>No</td></tr>";
    $x++;
} 
echo "</table>";
?>

