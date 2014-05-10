<?php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/locationfunctions.php');

$lat = $_GET['lat'];
$lon = $_GET['lon'];

$AllSchools = LocationsInArea((float)$lon, (float)$lat, 0.0005696123);

/*foreach($AllSchools as $SingleSchool){
print_r($SingleSchool);
echo "<br>";
echo "<br>";
}*/
//print_r(LocationInfo('536dbd1a340e655369f097af'));
echo json_encode($AllSchools);

?>