<?php
	include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'dbfunctions.php');
	
	$locations = FindAllInCollection('locations');
	echo "hi";

	foreach ($locations as $value) {
		echo "NEW \n";
		print_r($value->lon);
	}
?>