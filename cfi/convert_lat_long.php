<?php
	include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'dbfunctions.php');
	
	$locations = FindAllInCollection('locations');

	foreach ($locations as $value) {
		echo "NEW \n";
		$id = $value['_id'];
		$lon = $value['log']; // longitude
		$lat = $value['lon']; // latitude
		echo $id;
		$new_loc = array("type" => "Point", "coordinates" => array("0" => $lon, "1" => $lat));
		$criteria = array("_id" => $id);
		$update_ops = array('$set' => array("loc" => $new_loc));
		UpdateCollection('locations', $update_ops, $criteria);
		// var_dump($new_loc);
		//var_dump($criteria);
		//var_dump($update_ops);
	}
?>