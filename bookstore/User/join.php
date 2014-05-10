<?php
	/**
	* Processes user login and returns status.
	*/
	
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;	
	
function createuser($uname,$upass,$ufname,$ulname,$uemail,$udob,$ugender,$usrid)
	{
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php');
global $global_salt;	
/**	$uname = mysql_escape_string($uname);
	$upass = sha1(mysql_escape_string($upass).$global_salt);
	$ufname = mysql_escape_string($ufname);
	$ulname = mysql_escape_string($ulname);
	$uemail = mysql_escape_string($uemail);
	$udob = mysql_escape_string($udob);
	*/ 
$upass = sha1($upass.$global_salt);
if (isset($_POST['ugender']))
	{
		/**$ugender = mysql_escape_string($ugender);*/
$ugender=$ugender;
	}

	
	

$datef = str_replace('/', '-', $udob);

$udob = strtotime($datef);

	$users = array(
	   'username'=>$uname,
	   'password'=>$upass,
	   'email'=>$uemail,
	   'created_time'=>new MongoDate(),
	   'created_by'=> $usrid,
	   'status'=>"Active",
        );

	
	

	$Email = CheckField('Users','email',$uemail);
	$Username = CheckField('Users','username',$uname);

	if($Email||$Username)
	
	 { //Just Stopping junk data to not to enter the DB, User Validation shall be fantastic for this

	echo "Email or Username Already Registered";
	}

	else
	 {
	SaveCollection('Users',$users); //Save to the Database
	$uid=$users['_id'];
	// Saving User Info Record
	
        
	$userinfo = array(  'uid'=>$uid,
			'first_name'=>$ufname,
			'last_name'=>$ulname,
			'birthday'=>new MongoDate($udob),
			'gender'=>$ugender,
			);
	SaveCollection('UserInfo',$userinfo);

	
	}
return $uid;

}


$create = createuser($_POST['uname'],$_POST['upass'],$_POST['ufname'],$_POST['ulname'],$_POST['uemail'],$_POST['udob'],$_POST['ugender'],'admin');


if(!$create) {
	header("location: ".$directorypath."/User/signup.php");
	}
	else {

session_start();
	$_SESSION['uid'] = $create;

	header("location: ".$directorypath."/index.php");
	
	} 

?>
