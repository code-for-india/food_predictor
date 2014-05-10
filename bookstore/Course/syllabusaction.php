<meta charset='utf-8'>
<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/cfunctions.php');


	// Get the Form Data and escape the values (Sanitize)
	 

	
	$topic = $_POST['topic'];
	$tag = mysql_escape_string($_POST['tag']);
	$cid = mysql_escape_string($_POST['cid']);
	$topichours = mysql_escape_string($_POST['thours']);
	
     
	// Arrange in a array


	$coursesyllabus = array(
		  'tid'=> new MongoId(),
		  'topic' =>$topic,
	          'topichours' =>$topichours,
		  'tag' =>$tag,
		  );

$condition = array('_id' =>new MongoId($cid));

	$syarray = array('$addToSet' => array("Syllabus" => $coursesyllabus));
	$csaved = updateColl('Courses',$condition,$syarray);


						

if(!$csaved){
echo "There is problem in saving your Syllabus";

echo $cid;
echo $tag;
}
else {

echo "Data Saved Succesfully";
header("location: /socialschoomin/Course/syllabus.php");	
}


//print_r($workflow);
?> 
