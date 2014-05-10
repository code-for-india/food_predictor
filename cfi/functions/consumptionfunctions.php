<?php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'dbfunctions.php');

function SchoolConsDateRange($L_id){
$daterange = '6 Jun 13';
$daterange2 = '2 Apr 14';
$sdb = dbconnect();
$sc = new MongoCollection($sdb,'consumptiondata');
$CDSingleSchool = $sc->aggregate(
array('$match' => array('location_id' =>$L_id)),
array('$project' => array('_id' => 0,'INDENTDATE'=>1))
);
$SSData = $CDSingleSchool['result'];
return $SSData;

}

/**

array('$match' => array('INDENTDATE' => array(
        '$gte' => $daterange1,
        '$lte' => $daterange2
    ))),
**/
?>
