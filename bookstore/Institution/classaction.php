<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;	
	
function createclass($name,$iid,$atype, $usrid)
	{

	$class = array(
	'name'=>$name,
	'i_id'=>$iid,
	'attendance_type'=>$atype,
        'created_time'=>new MongoDate(),
        'created_by'=> $usrid,
        );


SaveCollection('Classes',$class);
$class_id=$class['_id'];
return $class_id;

}

if (!$_POST['cname'] ) 
{
die('You did not complete all of the required fields');
}
$create = createclass($_POST['cname'],$_POST['iid'],$_POST['atype'],'admin');


if(!$create) {
	header("location: ".$directorypath."/Institution/index.php");
	}
	else {

	header("location: ".$directorypath."/Institution/addclass.php");
	
	} 
?>
