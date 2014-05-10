<?php
	/**
	* Processes user login and returns status.
	*/

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;	
	
function createpdo($fname,$lname,$udob,$ugender,$parent,$nationality,$lang,$iid,$pdo_categories,$usrid)
	{

	if (isset($_POST['ugender']))
	{
		$ugender = $ugender;
	}

//date_default_timezone_set('Asia/Kolkata');	
	

$datef = str_replace('/', '-', $udob);

$udob = strtotime($datef);

	$pdo = array(
	'first_name'=>$fname,
	'last_name'=>$lname,
	'dob'=>new MongoDate($udob),
	'gender'=>$ugender,
	'parent'=>$parent,
	'nationality'=>$nationality,
	'languages'=>$lang,
	'i_id'=>$iid,
'pdo_categories' => $pdo_categories,
        'created_time'=>new MongoDate(),
        'created_by'=> $usrid,
        );

	print_r($pdo);
	
/**
	$Email = CheckField('PersonDO','email',$uemail);
	$Username = CheckField('PersonDO','username',$uname);

	if($Email||$Username)
	
	 { //Just Stopping junk data to not to enter the DB, User Validation shall be fantastic for this

	echo "Email or Username Already Registered";
	}
**/
SaveCollection('PersonDO',$pdo);
	$pdo_id=$pdo['_id'];
return $pdo_id;

}


$create = createpdo($_POST['fname'],$_POST['lname'],$_POST['udob'],$_POST['ugender'],$_POST['parent'],$_POST['nationality'],$_POST['lang'], $_POST['iid'],$_POST['categories'],'admin');


if(!$create) {
	header("location: ".$directorypath."/PDO/index.php");
	}
	else {

session_start();
	$_SESSION['uid'] = $create;

	header("location: ".$directorypath."/PDO/assignclass.php");
	
	} 

?>
