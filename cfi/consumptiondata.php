<?php
$l_id = $_GET['locationid'];
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/consumptionfunctions.php');

echo "<br>";
$ReqData = SchoolConsDateRange($l_id);
foreach($ReqData as $data){
 print_r(json_encode($data));
echo "<br>";

} 
?>
