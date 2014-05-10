<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/ifunctions.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/cfunctions.php');
$course_id_from_ajax = $_GET['cid'];
$Co_Class = CoursesInClass($course_id_from_ajax);
echo json_encode($Co_Class);
?>
