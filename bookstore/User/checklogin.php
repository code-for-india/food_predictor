<?php

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');

global $directorypath;
	
	$uname = $_POST['uname']; //Get Email from the form
	$upass = $_POST['upassword']; //Get password from the form
	
	global $global_salt;
	//Get the Posted fields to array and Password mix with globalsalt
	$arr = array('username' => $uname,'password' => sha1($upass.$global_salt));
	
	//Check the Credentials with the database
	$login = FindOneInCollection('Users',$arr); 
	
	if($login) {
	session_start();
	$_SESSION['uid'] = $login['_id'];
	header("location: ".$directorypath."/User/profile.php");
	}
	else {
	header("location: ".$directorypath."/User/login.php");
	} 


?>
