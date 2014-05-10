<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/ifunctions.php'); 


$pdo_id = '5316baa9d1f73c22228b4567';
$class_id = '5316ba70d1f73c21228b4567';
$ClassInfo=ClassInfo($class_id);
print_r($ClassInfo['about']);
return $ClassInfo['about'];

 ?>
