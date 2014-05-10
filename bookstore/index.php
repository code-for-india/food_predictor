<?php 
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR  . 'source.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/userfunctions.php');
global $directorypath;
if(!checkSession()){
header("location: ".$directorypath."/User/login.php");
}
else{
header("location: ".$directorypath."/User/profile.php");
}
?>
