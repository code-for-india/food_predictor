<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/afunctions.php');
$m = new Mongo;
$c = $m->selectDB("socialschoomin")->selectCollection("AttendancePDO");
$class_id = '5308f381d1f73cdc0e8b4567';
$violation = 'Absent';
$students = AllClassPDO($class_id);
$out = $c->aggregate(
array('$match' => array('class_id' => $class_id)),
array('$project' => array('pdo_id'=>1,'_id'=>0,'violation' => '$day_attendance.violation'))

);
$res = $out['result'];
$count = count($res);
for($i=0;$i<$count;++$i){
$pdo_id[$i]=$res[$i]["pdo_id"]; 
$myarr=array_count_values($res[$i]["violation"]);
print_r($myarr);
if($myarr["Absent"]==NULL)
{
$large[$i]=0;
}
else{
$large[$i] = $myarr["Absent"];
}
}
sort($large);
print_r($large);
$p = count($large);
echo $p;
$result = array_diff($students,$pdo_id);
print_r($result);
$diffcount=count($result);
$studentcount=count($students);
$avg = array_sum($large)/$studentcount;
if($diffcount>=1){
echo "least value is 0";
}
else{
echo "least value is".$large[0];
}
echo "max value is".$large[$p-1];

echo "<br>";
$s = $m->selectDB("socialschoomin")->selectCollection("ClassAttendance");
$out = $s->aggregate(
array('$match' => array('_id' => $class_id)),
array('$project' => array('_id' => 0,'day_attendance' => 1))
);
$res = $out['result'][0]['day_attendance'];
print_r($res);
$count = count($res);
echo $count;
$avg = $count - $avg;
echo "avg value is".$avg;
?>
