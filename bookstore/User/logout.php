<?php

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');
global $directorypath;	
session_start();

session_destroy();
header("location: ".$directorypath."/User/login.php");

?>
