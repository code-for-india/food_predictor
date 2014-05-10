<?php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'dbfunctions.php');


//Location Info
function LocationInfo($location_id) {
	$location_query = array('_id'=>new MongoId($location_id));
	$location_info = FindOneInCollection('locations', $location_query);
	return 	$location_info;	
}


/**
Locations in a Area with Maximum Distance of $distance
**/

function LocationsInArea($longitude, $lattitude,$distance){

$sdb = dbconnect();
$sc = new MongoCollection($sdb,'locations');
$lnglat = array($longitude, $lattitude);
$LocationsinArea = $sc->aggregate(
array('$geoNear'=>array('near' => $lnglat, 'maxDistance' =>$distance, 'distanceField'=>'dist.calculated', 'spherical' => true))
);
$AllLocations = $LocationsinArea['result'];
return $AllLocations;
}

function LocationsWithRouteCode($RCode){
$sdb = dbconnect();
$sc = new MongoCollection($sdb,'locations');
$LocationsWithRC = $sc->aggregate(
array('$match' => array('Route Code' =>$RCode)),
array('$project' => array('_id' => 1))
);
$RCLocations = $LocationsWithRC['result'];
return $RCLocations;

}


function ConDataofHKHSchool($SchoolName){
$sdb = dbconnect();
$sc = new MongoCollection($sdb,'consumptiondata');
$DataofSchool = $sc->aggregate(
array('$match' => array('SGDESCRIPTION' =>$SchoolName)),
array('$project' => array('_id' => 0,'Indentqty'=>1,'bomname'=>1,'INDENTDATE'=>1 ))
);
$SchoolData = $DataofSchool['result'];
return $SchoolData;
}
?>
