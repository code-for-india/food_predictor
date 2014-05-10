<?php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/locationfunctions.php');
echo "Hi";
$Locations = LocationsWithRouteCode("RC00020");
foreach($Locations as $location){
echo "<br>";
print_r($location);
}


print_r(LocationInfo('536dbd1a340e655369f097af'));
?>
