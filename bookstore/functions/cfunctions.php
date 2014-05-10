<?php
//This file has functions of Course-related Code

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'dbfunctions.php');

function TotalCourses() {
	$arr = array('course_name' => 1);
	$courses = FindAllAndFilter('Courses',$arr);
	return 	$courses;	
}

//Returns Name of a Course 
function CourseName($courseid){
$query=array('_id'=>new MongoId($courseid));

$CourseData = FindOneInCollection('Courses',$query);
return $CourseData['course_name'];
}

//Just a Single course id argument and course info
//Returns all Distinct Tags
function DistinctTags($courseid)
{

$sdb = dbconnect();
$collection = new MongoCollection($sdb,'Courses');
$tags = $collection->distinct("Syllabus.tag", array('_id'=>new MongoId($courseid)));
return $tags;
}

//Returns Syllabus of a Course as a Array of Arrays
function TotalSyllabus($courseid){
$query=array('_id'=>new MongoId($courseid));

$TotalSyllabus = FindOneInCollection('Courses',$query);
return $TotalSyllabus['Syllabus'];
}

?>
