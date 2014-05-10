<?php
	include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'dbfunctions.php');
	$criteria = array("id" => ObjectId("536dbd1a340e655369f09aca"));
	$set_arr = array("$unset" => array("loc" => "", "lon" => ""));
	UpdateCollection($coll,$set_arr,$criteria)
?>