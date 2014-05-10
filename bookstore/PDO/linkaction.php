<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/userfunctions.php');

error_reporting(ALL);
ini_set('display_errors', 'On');

$pdoid = $_POST['pdoid'];
$uid = $_POST['uid'];

$UsersinPDOCount = CheckUserInPDO($pdoid,$uid);

if($UsersinPDOCount<1){
$a1= array('_id' => new MongoId($pdoid));
$a2 = array('$push' => array( 'UAC_linked'=> array('uid' => $uid, 'linked_time'=>new MongoDate(),
        )));
updateColl('PersonDO',$a1,$a2);
}
else{
echo "Already exists in PersonDO";
}

$PDOsinUserCount = CheckPDOInUser($pdoid,$uid);
if($PDOsinUserCount<1){
$x1= array('_id' => new MongoId($uid));
$x2 = array('$push' => array( 'PDO_linked'=> array('pdo_id' => $pdoid)));
$LinktoUser = updateColl('Users',$x1,$x2);
}
else{
echo "Already exists in Users";
}

if (!$_POST['pdoid'] ) 
{
die('Please Select atleast one Student');
}
if (!$_POST['uid'] ) 
{
die('Please Select atleast One User');
}



if(!$LinktoUser) {
	header("location: ".$directorypath."/PDO/index.php");
	}
	else {

session_start();
	
	header("location: ".$directorypath."/PDO/linkaccount.php");
	
	} 

?>
