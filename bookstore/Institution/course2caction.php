<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;	
	
function assigncourse($classid,$cid,$usrid)
	{

	$courseinfo = array(
	'course_id'=>$cid,
        'course_added_time'=>new MongoDate(),
        'added_by'=> $usrid,
        );

$condition = array('_id' =>new MongoId($classid));

	$syarray = array('$addToSet' => array("courses" => $courseinfo));
	$csaved = updateColl('Classes',$condition,$syarray);


return $csaved;

}

if (!$_POST['classid'] ) 
{
die('You did not complete all of the required fields');
}

foreach($_POST['cid'] as $courseid){

$addcourse = assigncourse($_POST['classid'],$courseid,'admin');

}

if(!$addcourse) {
	header("location: ".$directorypath."/Institution/index.php");
	}
	else {

	header("location: ".$directorypath."/PDO/assignclass.php");
	
	} 


?>
