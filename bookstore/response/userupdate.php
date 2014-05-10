<?php
	/**
	* User info update.
	*/
	include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/userfunctions.php'); 
	
	if(checkSession()){
		if(isset($_POST['oldPassword']) && isset($_POST['newPassword'])){
			return updatePass($_SESSION['uid'],$_POST['oldPassword'],$_POST['newPassword']);
		}
		if(isset($_POST['fname']) && isset($_POST['email']) ){
			return updateInfo($_SESSION['uid'], $_POST['fname'], $_POST['email']);
		}
	}
	else{
		redirect();
	}
?>
