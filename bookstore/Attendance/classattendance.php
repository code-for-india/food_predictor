<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/afunctions.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
global $directorypath;

$classid = $_POST['classid'];
$violations = $_POST['violations'];
$datef = str_replace('/', '-', $_POST['date']);


$attendancedate = strtotime($datef);
//Checck & Avoid Duplicate Attendance for a PDO
function CheckforDuplicateAPDO($classid,$pdo_id,$attendancedate){
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'AttendancePDO');
$out = $pc->aggregate(
array('$match' => array('class_id' => $classid,'pdo_id' => $pdo_id)),
array('$unwind' => '$day_attendance'),
array('$match' => array('day_attendance.date' => new MongoDate($attendancedate)))
); 
$res = $out['result'];
$count = count($res);
return $count;
}

//Check and avoid Duplicate entry of a day conducted for a class
function CheckforDuplicateCPDO($classid,$attendancedate){
$sdb = dbconnect();
$ClassAtColl = new MongoCollection($sdb,'ClassAttendance');
$CheckforData = $ClassAtColl->aggregate(
array('$match' => array('_id' => $classid)),
array('$unwind' => '$day_attendance'),
array('$match' => array('day_attendance.date' => new MongoDate($attendancedate)))
); 
$TotalDatedData = $CheckforData['result'];
$DateCount = count($TotalDatedData);
return $DateCount;
}


$CPDODatedCount = CheckforDuplicateCPDO($classid,$attendancedate);

if(!$CPDODatedCount>=1){
$classcondition = array('_id' => $classid );
$dayattendance = array('$addToSet' => array('day_attendance'=> array( 'created_time'=>new MongoDate(),
        'created_by'=> 'admin','date' =>new MongoDate($attendancedate))));
$atclassinsert = updateColl('ClassAttendance',$classcondition,$dayattendance);

}
else{

$criteria = array("_id" => $classid,"day_attendance.date" => new MongoDate($attendancedate));
$setarray = array('$set' => array("day_attendance.$.last_updated_time" => new MongoDate()));
$atclassinsert = UpdateCollection('ClassAttendance',$setarray,$criteria);

}





if (!$_POST['violations'] ) {
header("location: ".$directorypath."/Attendance/index.php");
}
else {
foreach($violations as $pdo_id => $violation) {

$CheckAPDO = CheckforDuplicateAPDO($classid,$pdo_id,$attendancedate);

if($CheckAPDO>=1){
$a1 = array("class_id" => $classid,"pdo_id" => $pdo_id,"day_attendance.date" => new MongoDate($attendancedate));
$a2 = array('$set' => array("day_attendance.$.violation" => $violation,"day_attendance.$.updated_time" => new MongoDate()));
UpdateCollection('AttendancePDO',$a2,$a1);
}
else{

$a1= array('class_id' => $classid,'pdo_id' => $pdo_id );
$a2 = array('$push' => array( 'day_attendance'=> array('violation' => $violation, 'created_time'=>new MongoDate(),
        'created_by'=> 'admin','date' =>new MongoDate($attendancedate))));
$atinsert = updateColl('AttendancePDO',$a1,$a2);
}
  


}
}





	

if (!$_POST['classid'] ) 
{
die('You did not complete all of the required fields');
}





if(!$atclassinsert) {
	header("location: ".$directorypath."/Attendance/view.php");
	}
	else {


	header("location: ".$directorypath."/Attendance/index.php");
	
	} 


?>
