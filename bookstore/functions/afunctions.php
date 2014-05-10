<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'dbfunctions.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ifunctions.php');

// Function to display all Student PDO's of a Particular Class
function AllClassPDO($class_id) {
	$myarr = array();
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'Classes');
$classpdo = $pc->aggregate(
array('$match' => array('_id' =>new mongoId($class_id))),
array('$unwind' => '$courses'),
array('$project' => array('courses.students'=>1, '_id'=>0))
);
$AllClassPDOs = $classpdo['result'];

//This aggregation results in Ex: Array ( [0] => Array ( [courses] => Array ( [cid] => cb09te [students] => Array (0,1,2,...)

$studentcount = count($AllClassPDOs);

for($k=0;$k<$studentcount;++$k){
$myarr = array_merge($myarr, $AllClassPDOs[$k]["courses"]["students"]);
$StudentPDOsTotal = array_unique($myarr);
}
return $StudentPDOsTotal;
}



//Day-wise Attendance Functions

function CheckClassesInAPDO($pdo_id) {
$sdb = dbconnect();
$at_collection = new MongoCollection($sdb,'Attendance');
$PDO_Att = $at_collection->aggregate(
array('$match' => array('_id' =>new MongoId($pdo_id))),
array('$unwind' => '$classes')
);

return $PDO_Att['result'];
}

function AvoidSameDated($pdo_id,$classid, $attendancedate){
$sdb = dbconnect();
$at_collection = new MongoCollection($sdb,'Attendance');
$AttendanceDated = $at_collection->aggregate(
array('$match' => array('pdo_id' =>$pdo_id,'class_id' => $classid)),
array('$unwind' => '$day_attendance'),
array('$match' => array('day_attendance.date' => new MongoDate($attendancedate)))
);
return  $AttendanceDated['result'];
}
?>
