<?php

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'dbfunctions.php');


//All User Accounts

function AllUsers(){
$arr = array('uid' => 1,'first_name' => 1, 'last_name' => 1);
$Users = FindAllAndFilter('UserInfo',$arr);
return 	$Users;
}


//User array
function UserInfo($uid) {
	$uidarray = array('uid'=>new MongoId($uid));
	$uresult = FindOneInCollection('UserInfo', $uidarray);
return $uresult;			
}

//To Get Just First Name of a particular User
function UserFirstName($uid) {
	$uidarray = array('uid'=>new MongoId($uid));
	$uresult = FindOneInCollection('UserInfo', $uidarray);
return $uresult['first_name'];			
}

//To Get Just Last Name of a particular User
function UserLastName($uid) {
	$uidarray = array('uid'=>new MongoId($uid));
	$uresult = FindOneInCollection('UserInfo', $uidarray);
return $uresult['last_name'];			
}

function CheckUserInPDO($pdo_id,$uid){
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'PersonDO');
$pduacs = $pc->aggregate(
array('$match' => array('_id' => new MongoId($pdo_id))),
array('$unwind' => '$UAC_linked'),
array('$match' => array('UAC_linked.uid' => $uid))
); 

$LinkedUsersMatch = $pduacs['result'];
$CountLinkedUsers = count($LinkedUsersMatch);

return $CountLinkedUsers;
}


function CheckPDOInUser($pdo_id,$uid){
$sdb = dbconnect();
$Uc = new MongoCollection($sdb,'Users');
$userac = $Uc->aggregate(
array('$match' => array('_id' => new MongoId($uid))),
array('$unwind' => '$PDO_linked'),
array('$match' => array('PDO_linked.pdo_id' => $pdo_id))
); 

$LinkedPDOsMatch = $userac['result'];
$CountLinkedPDOs = count($LinkedPDOsMatch);

return $CountLinkedPDOs;
}

//All PDO's of a User

function AllPDOsOfUser($uid){
$sdb = dbconnect();
$Uc = new MongoCollection($sdb,'Users');
$userpdos = $Uc->aggregate(
array('$match' => array('_id' => new MongoId($uid))),
array('$unwind' => '$PDO_linked'),
array('$project' => array('PDO_linked.pdo_id'=>1, '_id'=>0))
);

$AllPDOs = $userpdos['result'];
return $AllPDOs;

}
?>
