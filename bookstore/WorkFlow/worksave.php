<meta charset='utf-8'>
<?php

include_once 'source.php';


	// Get the Form Data and escape the values (Sanitize
	 $uid = $m->getuserid();
	
	$secid = mysql_escape_string($_POST['secid']);
	$course = mysql_escape_string($_POST['cid']);
	$worktype = mysql_escape_string($_POST['worktype']);
	$topic = $_POST['topic'];
      if (isset($_POST['topicstatus']))
	{
		$topicstatus = mysql_escape_string($_POST['topicstatus']);
	}
	else
		{ $topicstatus = "running"; }
	$aid = mysql_escape_string($_POST['aid']);
	$remarks = mysql_escape_string($_POST['remarks']);
	$period = mysql_escape_string($_POST['period']);
	$date = mysql_escape_string($_POST['date']);
	$usrid = mysql_escape_string($_POST['usrid']);



$datef = str_replace('/', '-', $date);

$workdate = strtotime($datef);

 
	// Arrange in a array

	$workflow = array(
		  'uid'=>$uid,
		  'sec_id' =>$secid,
	          'course' =>$course,
		  'date' =>new MongoDate($workdate),
		  'worktype' =>$worktype ,
		  'topic' =>$topic,
		  'topicstatus' =>$topicstatus,
		  'aid' =>$aid,
		  'remarks' =>$remarks,
		  'submited_time' => new MongoDate(),
		  'submited_by' =>$usrid,
		        );


	$wsaved = SaveCollection('workflow',$workflow);

if(!$wsaved){
echo "There is problem in saving your Work on $date";
}
else {

echo "Data Saved Succesfully";
header("location: /schoomin/viewwork.php");	
} 
?> 
