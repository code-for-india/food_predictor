<?php
error_reporting('ALL');
ini_set('display_errors', 'On');
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/consumptionfunctions.php');
/**
$TotalData = ConDataofHKHSchool("GLPS-HANUMANTHA SAGAR");
foreach($TotalData as $eachschooldata){

print_r(json_encode($eachschooldata));
echo "<br>";
} 
**/
$ReqData = SchoolConsDateRange('536dbd1a340e655369f096b3');
foreach($ReqData as $data){
	foreach( $data as $value){

echo $value;

echo "<br>";
}
} 
?>
