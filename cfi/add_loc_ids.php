<?php
	include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'dbfunctions.php');

	// testing split function:
	// $string = "yo yo yo dadf-dsoie";
	function splitify($string) {
		$str_arr = explode(" ", $string); // split on " "
		$new_arr = array();
		foreach ($str_arr as $string) {
			$fully_split = explode("-", $string);
			$new_arr = array_merge($new_arr, $fully_split);
		}
		return $new_arr;
	}
	
	$route_codes = FindDistinctValues('consumptiondata', "ROUTECODE");
	
	$locs = FindAllInCollection('locations');
	foreach ($route_codes as $route_code) {
		$cd = FindAllAndFilter('consumptiondata', array("ROUTECODE" => $route_code));
		$cd_len = count($cd);
		foreach ($cd as $cd_entry) {
			echo 'cd id ' . $cd_entry['_id'] . '<br>';
			$sgdesc = $cd_entry['SGDESCRIPTION'];
			$sgdesc_arr = splitify($sgdesc);
			$max_num_matches = 0;
			$max_location_id = 0;
			foreach ($locs as $loc) {
				$loc_id = $loc['_id'];
				$school_name = $loc['School_Name'];
				$school_name_arr = splitify($school_name);
				$num_matches = count(array_intersect($sgdesc_arr, $school_name_arr));
				if ($num_matches >= $max_num_matches) {
					// echo $num_matches;
					$max_location_id = $loc_id;
					$max_num_matches = $num_matches;
				}
			}
			print_r('max loc id: ' . $max_location_id . '<br>');
$a1 = array('$set' => array("location_id" => (string)$max_location_id));
$a2 = array("_id" => $cd_entry["_id"]);
print_r($a1);
print_r($a2);
			UpdateCollection('consumptiondata',$a1,$a2);

			
		}
		
	}
?>
