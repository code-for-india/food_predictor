<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;	
	
function createinsti($name,$usrid)
	{

	$insti = array(
	'institute_name'=>$name,
        'created_time'=>new MongoDate(),
        'created_by'=> $usrid,
        );


	
	

SaveCollection('Institutions',$insti);
	$i_id=$insti['_id'];
return $i_id;

}

if (!$_POST['iname'] ) 
{
die('You did not complete all of the required fields');
}
$create = createinsti($_POST['iname'],'admin');


if(!$create) {
	header("location: ".$directorypath."/Institution/index.php");
	}
	else {


	header("location: ".$directorypath."/Institution/addclass.php");
	
	} 

?>
