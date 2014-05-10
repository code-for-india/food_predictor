<?php

include_once  'dbfunctions.php';

//User array
function userarray() {
	$uidarray = array('uid'=>new MongoId($_SESSION['uid']));
	global $uresult;
	$uresult = FindOneInCollection('user', $uidarray);
			
}

//Sections associated

function usersections() {
	userarray();
	global $sections, $activesections,$uresult;
	$sections = $uresult["sections"];	
$t=count($sections);
 for($k=0;$k<$t;++$k){
  if($uresult["sections"][$k]["status"]=='active'){
  $activesections[]=$uresult["sections"][$k]["sid"];

}
 }
	
}

//To Return Course Id's associated with a User and particular section 

function mycoursesinsec($sec){
global $cid,$secname;
$query=array('_id'=>new MongoId($sec));
$document = FindOneInCollection('sections', $query);
$secname = $document["name"];
				$t=count($document["subjects"]);
$cid = array();
						 	for($k=0;$k<$t;++$k){
								if($document["subjects"][$k]["teacher"]==$_SESSION['uid']){
									
			  						$cid[]=$document["subjects"][$k]["cid"];
										}

}
}


//Just a Single course id argument and course info

function course($cid){

global $coursename, $syllabus, $chapters,$AllTopics,$AllTopicHours;
$query=array('_id'=>$cid);

$document = FindOneInCollection('course',$query);
//To make $chapters free from prev data
$chapters = array();
//To make $AllTopics free from prev data
$AllTopics = array();
//To make $AllTopicHours free from prev data
$AllTopicHours = 0;
//To make $syllabus free from prev data
$syllabus = array();
$coursename = $document['course_name'];
$syllabus = $document["Syllabus"];
$t=count($syllabus);

					for($k=0;$k<$t;++$k){

											
					 $chapters[]=$document["Syllabus"][$k]["tag"];



							}


//Topic Details
$ccount= count($syllabus);

for($x=0;$x<$ccount;++$x){

		 $AllTopics[]=$syllabus[$x]["topic"];
$AllTopicHours=$AllTopicHours+$syllabus[$x]["topichours"];

							}
}

//Work Flow Database Functions
//Total Work for a section and course
function totalwork($sid,$cid){
global $cursor;
$query=array('course'=>$cid, "sec_id"=> $sid);
$cursor= FindInCollection('workflow',$query);

}

//Complete work for a Logged in teacher

function completework($uid){
global $completework;
$query=array('uid'=>new MongoId($uid));
$completework= FindInCollection('workflow',$query);

}


function distincttags($cid)
{
global $tags;
$sdb = dbconnect();
$collection = new MongoCollection($sdb,'course');
$tags = $collection->distinct("Syllabus.tag", array('_id'=>$cid));

}


function tidtodetails($cid,$tid){
global $tidtotopichours;
$sdb = dbconnect();
$collection = new MongoCollection($sdb,'course');
$out = $collection->aggregate(
   array('$match' => array('_id' => $cid)),
   array('$unwind' => '$Syllabus'),
   array('$match' => array('Syllabus.tid' => new MongoId($tid)))
);
$res = $out['result'];
$tidtotopichours = $res[0]["Syllabus"]["topichours"];
return $res['0']['Syllabus']['topic']; 
}


//Total all Topic ids which are completed-status in a particular course in a section

function completedtids($sec,$cid){
$tidsarray=array();

$sdb = dbconnect();
$collection = new MongoCollection($sdb,'workflow');
$out = $collection->aggregate(
array('$match' => array('topicstatus' => 'completed')),
array('$unwind' => '$topic'),
array('$match' => array('sec_id' =>$sec)),
array('$match' => array('course' =>$cid))
);
$result = $out['result'];
return $result;
}




// User Information Function
function getuser()
		{
			userarray();
			global  $uresult;
			return $uresult;
		}

function getactivesections()
		{
			usersections();
			global $activesections;

			return $activesections;
		}


function getcid($onesection)
		{

	mycoursesinsec($onesection);
	global $cid;

	return $cid;


}

function getsecname($onesection)
		{

	mycoursesinsec($onesection);
	global $secname;

	return $secname;


}

// To print coursename with just an argument of cid
function getcoursename($cid)
		{

	course($cid);
	global $coursename;

	return $coursename;


}


function getchapters($cid)
		{

	course($cid);
	global $chapters;

	return $chapters;


}

//Total Syllabus for a course in a Array of Array of Arrays
function getsyllabus($cid)
		{

	course($cid);
	global $syllabus;

	return $syllabus;


}
//All Topics in a Array of Arrays
function getalltopics($cid)
		{

	course($cid);
	global $AllTopics;

	return $AllTopics;


}
//All TopicHours in a Array of Arrays
function getalltopichours($cid)
		{

	course($cid);
	global $AllTopicHours;

	return $AllTopicHours;


}


//All Topics in a Array of Arrays
function getwork($sid,$cid)
		{

	totalwork($sid,$cid);
	global $cursor;

	return $cursor;


}
function getcompletework($uid)
		{

	completework($uid);
	global $completework;

	return $completework;


}


function getdistincttags($cid)
{

	global $tags;
	distincttags($cid);
	return $tags;

}

function tidtotopichours($cid,$tid){
tidtodetails($cid,$tid);
global $tidtotopichours;

return $tidtotopichours;
}

?>
