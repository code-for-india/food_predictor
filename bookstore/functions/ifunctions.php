<?php

include_once  'dbfunctions.php';

/***
Function to retrieve total Institute data
**$i_id is the argument sent to the function to get the Profile of a Particular Institution.
**$insti_profile is the result array, which has total information like Name, Vision, About, Founded date, Insti_admin users etc.
** There will be several other functions where we query for specific field inside Institution.
**/
function InstiProfile($i_id) {
	$insti_query = array('_id'=>new MongoId($i_id));
	$insti_profile = FindOneInCollection('Institutions', $insti_query);
	return 	$insti_profile;	
}
/**
**Total Classes Started by the Institution.
**There might be any number of classes owned by a particular institution
** Use ActiveClasses() to select non-archived, active classes of a institution
**/
function InstiClasses($i_id) {

	$insti_classes_query = array('i_id'=>$i_id);	
	$insti_classes = FindInCollection('Classes', $insti_classes_query);

	return 	$insti_classes;	
}


/** 
**Returns Only Particular status - Classes of a Institution.
**Useful in printing only present active timeline rather total classes owned by institute along the years.
** Use InstiClasses() to select all Classes including Archived
**/
function ClassesWithStatus($i_id,$status) {
	$active_classes_query = array('i_id'=>new MongoId($i_id), 'status'=>$status);
	
	$active_classes = FindInCollection('Classes', $active_classes_query);
	return 	$active_classes;	
}
// Function to display all PDO's of a Institution
function AllInstiPDO($i_id) {
	
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'PersonDO');
$instipdo = $pc->aggregate(
array('$match' => array('i_id'=>$i_id)),
array('$project' => array('first_name' => 1,'last_name' => 1))
);
$AllInstiPDOs = $instipdo['result'];
return $AllInstiPDOs;
}



// Function to display only PDO's with role as Student/Teacher etc of a Institution
function AllInstiRolePDO($i_id,$pdo_role) {
	
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'PersonDO');
$instipdo = $pc->aggregate(
array('$match' => array('i_id'=>$i_id)),
array('$unwind' => '$pdo_categories'),
array('$match' => array('pdo_categories' => $pdo_role)),
array('$project' => array('first_name' => 1,'last_name' => 1))
);
$AllInstiRolePDOs = $instipdo['result'];
return $AllInstiRolePDOs;
}


// Pass PDO_id as a argument and Get Name as return
function PDOInfo($pdo_id) {
	
$condition = array('_id' =>new MongoId($pdo_id));

$PDO_Info = FindOneInCollection('PersonDO',$condition);
return $PDO_Info;
}



/**
**Function to retrieve Class information. 
**Class_id will be sent as an argument and total information stored in the documnet is returned. 

**/
function ClassInfo($c_id) {
	$class_query = array('_id'=>new MongoId($c_id));
	
	$class_info = FindOneInCollection('Classes', $class_query);
	return 	$class_info;	
}

/**
**Function to retrieve Courses in a Class information. 
***/
function CoursesInClass($c_id) {
include_once('functions/cfunctions.php');
	$class_query = array('_id'=>new MongoId($c_id));
	
	$sdb = dbconnect();
	$ClassesCollection = new MongoCollection($sdb,'Classes');
	$AllCourses = $ClassesCollection->aggregate(
	array('$match' => array('_id' => new MongoId($c_id))),
	array('$unwind' => '$courses'),
	array('$project' => array('courses.course_id' => 1,'_id' => 0))
	);
$ACs = $AllCourses['result'];
foreach($ACs as $AC){
$CoursesinClass[$AC["courses"]["course_id"]] =  CourseName($AC["courses"]["course_id"]);
}
return $CoursesinClass;	
}


/***
** Determine, How many Sections were enrolled for a particular PDO (either Student/Staff)
** 
***/
function ClassesInPDO($pdo_id) {
	
$sdb = dbconnect();
$PDOCollection = new MongoCollection($sdb,'PersonDO');
$AggrResult = $PDOCollection->aggregate(
array('$match' => array('_id' => new MongoId($pdo_id))),
array('$unwind' => '$classes'),
array('$project' => array('classes.class_id' => 1,'_id' => 0))
);
$PDO_Classes = $AggrResult['result'];
foreach($PDO_Classes as $SingleClass){
$ClassesinPDO[] = $SingleClass["classes"]["class_id"];
}
return $ClassesinPDO;
}

//Return Course_ids from the Class in Which a PDO is enrolled as a Student
function PDOCoursesInClass($pdo_id,$class_id) {
	
$sdb = dbconnect();
$ClassesCollection = new MongoCollection($sdb,'Classes');
$AggrCourses = $ClassesCollection->aggregate(
array('$match' => array('_id' => new MongoId($class_id))),
array('$unwind' => '$courses'),
array('$match' => array('courses.students' => $pdo_id)),
array('$project' => array('courses.course_id' => 1,'_id' => 0))
);
$PDO_Courses = $AggrCourses['result'];


foreach($PDO_Courses as $course){

$course_id = $course['courses']['course_id'];

$AllCourses[] = $course_id;
}
return $AllCourses;

}
//This Function Checks the Whether a PDO has a particular Permission in a particular Class or Not!!
function CheckRolePermissionForClass($pdo_id,$class_id,$rpid) {
$sdb = dbconnect();
$PDOCollection = new MongoCollection($sdb,'PersonDO');
$RolesInClass = $PDOCollection->aggregate(
array('$match' => array('_id' => new MongoId($pdo_id))),
array('$unwind' => '$classes'),
array('$match' => array('classes.class_id' => $class_id)),
array('$unwind' => '$classes.class_roles'),
array('$project' => array('classes.class_roles'=>1, '_id'=>0))
);


$AllRoles = $RolesInClass['result'];
$count = count($AllRoles);

for($k=0;$k<$count;$k++){
$RolesCollection = new MongoCollection($sdb,'Roles');
$P_in_Roles = $RolesCollection->aggregate(
array('$match' => array('_id' => new MongoId($AllRoles[$k]["classes"]["class_roles"]))),

array('$project' => array('permissions'=>1, '_id'=>0))
);

$Role_Permissions = $P_in_Roles['result'][0]["permissions"];
}
if(!in_array($rpid,$Role_Permissions)){
return false;
}
else{
return true;
}

}//Returns Boolean Value Only



function DefaultRoles($rtype,$rcategory){
$sdb = dbconnect();
$pc = new MongoCollection($sdb,'Roles');

$DefaultRoles = $pc->aggregate(
array('$match' => array('category' => $rcategory,'role_type' => $rtype)),
array('$project' => array('role_name'=>1))
);
$DR = $DefaultRoles['result'];

return $DR;

}

?>
