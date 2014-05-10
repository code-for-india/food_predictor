<?php  include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/cfunctions.php');
error_reporting(-1);
ini_set('display_errors', 'On');
echo $header?>

<body>
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $ClassMenu?>

<?php 
//Variable in Get Distinct tags function might be confusing, so changed to $cadd on this page
$cidd = $_GET['cid'];
$_SESSION['courseid'] = $cidd;

?>

						
			<!-- start: Content -->
			<div id="content" class="col-lg-12 col-sm-11">
			
			

<div class="row">
<div class="col-lg-12">


<div class="box">



						<div class="box-header">
							<h2><i class="icon-list-alt"></i><span class="break"></span>Syllabus of </h2>
							<div class="box-icon">
								<a href="charts-flot.html#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="charts-flot.html#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="charts-flot.html#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">

								

<div class="tabbable ">
 <ul class="nav nav-tabs tabs-left">
<?php

$tags = DistinctTags($cidd);
$tagscount = count($tags);
$total =array();
for($t=0;$t<1;++$t)
{

echo "<li class ='active'><a href='#".sha1($tags[$t])."' data-toggle='tab'>".$tags[$t]."</a></li>";

}
for($t=1;$t<$tagscount;++$t)
{

echo "<li><a href='#".sha1($tags[$t])."' data-toggle='tab'> <font color='red'>".$tags[$t]."</font></a></li>";

}


echo "</ul>";
echo '<br><br>';
echo "<div class='tab-content'>";
foreach($tags as $tag)
{

$sdb = dbconnect();
$collection = new MongoCollection($sdb,'Courses');
$out = $collection->aggregate(
   array('$match' => array('_id' => new MongoId($cidd))),
   array('$unwind' => '$Syllabus'),
   array('$match' => array('Syllabus.tag' => $tag))
);
$res = $out['result']; 



$count = count($res);
$cc ='0';
$chaptertopics = array();

for($k=0;$k<$count;++$k){


array_push($chaptertopics, $res[$k]["Syllabus"]["topic"]);


$i = $res[$k]["Syllabus"]["topichours"];


$cc = $cc+$i;


}


if($tags['0']==$tag){
echo "<div id='".sha1($tag)."' class='tab-pane active'>";
}

else{
echo "<div id='".sha1($tag)."' class='tab-pane'>";
}

//To Print Topics in a Chapter- Generated Automatically in the above foreach loop.

$countchaptertopics = count($chaptertopics);
for($ct=0;$ct<$countchaptertopics;++$ct){
echo  "  
      ".$chaptertopics[$ct]." <br>

    ";
}
	
echo "</div>";

$myy = array ('label' => $tag, 'data' =>$cc);
array_push($total, $myy);
}



echo "</div></div>";


?>

</div>

				</div>





<div class="row">


<div class="col-lg-12">

					<div class="box">
						<div class="box-header">
							<h2><i class="icon-list-alt"></i><span class="break"></span>Syllabus Chart</h2>
							<div class="box-icon">
								<a href="charts-flot.html#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="charts-flot.html#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="charts-flot.html#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
								<div id="piechart" style="height:300px"></div>
						</div>
					</div>

</div></div>

</div>
</div>

			<div class="row">		
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header" data-original-title>
							<h2><i class="icon-user"></i><span class="break"></span>Syllabus Work Flow of </h2>
							<div class="box-icon">
								<a href="viewwork.php#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="viewwork.php#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="viewwork.php#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
<?php


$syllabus = TotalSyllabus($cidd);

$t=count($syllabus);
echo "
This subject has  ".$t." topics ";?>
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>S.No</th>
									  <th>Chapter/Tag</th>
									  <th>Topic Name</th>
									  <th>Topic Weightage (Hours)</th>
									  <th>Status</th>
								  </tr>
							  </thead>   
							  <tbody>
								

<!-- Continuation of PHP script-->
<?php
					for($k=0;$k<$t;++$k){
$sno = $k+1;

echo " 
<tr>
									<td>$sno</td>
									<td class='center'>".$syllabus[$k]['tag']."</td>
									<td class='center'>".$syllabus[$k]['topic']."</td>
									<td class='center'>".$syllabus[$k]['topichours']."</td>
									
									<td class='center'>
										<a class='btn btn-success' href='#'>
											<i class='icon-zoom-in '></i>  
										</a>
										<a href ='#'> C </a> 
										<a href ='#'> NC </a>
									</td>
								</tr> ";
}
?> 
								
							  </tbody>
						  </table>            
						</div>
					</div>
				</div><!--/col-->
			
			</div><!--/row-->

			
			
			
    
					
			</div>
			<!-- end: Content -->
				
				</div><!--/row-->		
		


	</div><!--/container-->
	
		
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>Here settings can be configured...</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	
	<div class="clearfix"></div>
	
	<?php echo $footer ?>
	
	<!-- start: JavaScript-->
	<!--[if !IE]>-->

			<script src="../assets/js/jquery-2.0.3.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="../assets/js/jquery-1.10.2.min.js"></script>
	
	<![endif]-->

	<!--[if !IE]>-->

		<script type="text/javascript">


/* ---------- Pie chart ---------- */
$(document).ready(function(){
	


	var data =
<?php echo json_encode($total); ?>;


	
	if($("#piechart").length)
	{
		$.plot($("#piechart"), data,
		{
			series: {
					pie: {
							show: true
					}
			},
			grid: {
					hoverable: true,
					clickable: true
			},
			legend: {
				show: false
			},
			colors: ["#FA5833", "#2FABE9", "#FABB3D", "#78CD51"]
		});
		
		function pieHover(event, pos, obj)
		{
			if (!obj)
					return;
			percent = parseFloat(obj.series.percent).toFixed(2);
			$("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
		}
		$("#piechart").bind("plothover", pieHover);
	}
	
	
});

			window.jQuery || document.write("<script src='../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
			</script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='../assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		
	<![endif]-->
	<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	
		
	<script src="../assets/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../assets/js/jquery.sparkline.min.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../assets/js/excanvas.min.js"></script><![endif]-->
	<script src="../assets/js/jquery.flot.min.js"></script>
	<script src="../assets/js/jquery.flot.pie.min.js"></script>
	<script src="../assets/js/jquery.flot.stack.min.js"></script>
	<script src="../assets/js/jquery.flot.resize.min.js"></script>
	<script src="../assets/js/jquery.flot.time.min.js"></script>
	
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
	
	<!-- page scripts -->
	<script src="../assets/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../assets/js/jquery.sparkline.min.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.min.js"></script>
	
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="../assets/js/pages/table.js"></script>
	
	<!-- end: JavaScript-->
	
</body>
</html>
