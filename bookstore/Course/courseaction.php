<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;	
	
function createcourse($name,$usrid)
	{

	$course = array(
	'course_name'=>$name,
        'created_time'=>new MongoDate(),
        'created_by'=> $usrid,
        );


SaveCollection('Courses',$course);
	$c_id=$course['_id'];
return $c_id;

}

if (!$_POST['cname'] ) 
{
die('You did not complete all of the required fields');
}
$create = createcourse($_POST['cname'],'admin');


if(!$create) {
	header("location: ".$directorypath."/Course/create.php");
	}
	else {


	header("location: ".$directorypath."/Course/syllabus.php");
	
	} 

?>
