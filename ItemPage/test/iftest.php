<?php
$Create = date_create('2000/01/01');
$Create = $Create->format("Y/m/d");
$TodaysDay = date("Y/m/d");
$TestDate = date("Y/m/d");
$BookedDay    = date('Y/m/d', strtotime($TestDate . '+ 1 days'));
echo "
Todays day: $TodaysDay <br>
Todays day Before Add: $TestDate <br>
Today With Added day(s): $BookedDay <br>
$Create <br>";


if ($Create == $TodaysDay) {
	echo "Booked For Today";
}
elseif ($Create < $TodaysDay) {
	echo "Past Booking";
}
elseif ($Create > $TodaysDay) {
	echo "Future Booking";
}

?>
