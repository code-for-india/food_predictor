<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');

error_reporting(ALL);
ini_set('display_errors', 'On');

$pdoids = $_POST['pdoids'];
$classid = $_POST['classid'];
$classroles = $_POST['classroles'];
/**
**Using Aggregate Framework, Search for same classid record
**Useful to avoid duplicate assigning of Classes to the Same PDO
**/
function assignclass($pdo_id,$classid,$classroles){
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'PersonDO');
$pdclasses = $pc->aggregate(
array('$match' => array('_id' =>new mongoId($pdo_id))),
array('$unwind' => '$classes'),
array('$match' => array('classes.class_id' =>$classid)),
array('$project' => array('classes.class_id' => 1,'_id' => 0))
);
$res = $pdclasses['result'];
$count = count($res);

//If Class is already assigned, print break
//If Class Id was not assigned to PDO, Just Push the array into classes array() of PDO
if(!$count>=1){

$saa = array('_id' => new mongoId($pdo_id));
$sbb = array('$push'=>array('classes'=>array('class_id' =>$classid, 'class_roles'=>$classroles,'asigned_time'=>new MongoDate(),'assigned_by'=> 'admin')));

UpdateCollection('PersonDO',$sbb,$saa);

}
else {
echo "break";
}

}


/**
**
**/
function updatetoclass($pdo_id,$classid){

$condition = array('_id' =>new MongoId($classid));



$ClassInfo = FindOneInCollection('Classes',$condition);
$coursecount = count($ClassInfo['courses']);
for($s=0;$s<$coursecount;++$s){

	$cpdoarray = array('$addToSet' => array("courses.$s.teachers" => $pdo_id));
	$csaved = updateColl('Classes',$condition,$cpdoarray);
}
}



if (!$_POST['pdoids'] ) 
{
die('Please Select atleast one Teacher');
}
if (!$_POST['classid'] ) 
{
die('Please Select the Class Name to Assign');
}


//$assign = assignclass($_POST['pdoids'],$_POST['classid'],'admin');
//assignclass($pdo_id,$classid);


foreach($pdoids as $pdoid){

$assign = assignclass($pdoid,$classid,$classroles);
$toclasses = updatetoclass($pdoid,$classid);
}


if(!$assign) {
	header("location: ".$directorypath."/PDO/index.php");
	}
	else {

session_start();
	
	header("location: ".$directorypath."/linkaccount.php");
	
	} 

?>
