<?php 

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');


echo $header?>
<!-- start: JavaScript-->
	<!--[if !IE]>-->

			<script src="../assets/js/jquery-2.0.3.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="../assets/js/jquery-1.10.2.min.js"></script>
	
	<![endif]-->

	<!--[if !IE]>-->

		<script type="text/javascript">
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
<body>
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $mainmenu?>
						
			<!-- start: Content -->
			<div id="content" class="col-lg-10 col-sm-11">
			
							
			<div class="row">
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<h2><i class="icon-edit"></i>Assign a Class to Student</h2>



								 

							<div class="box-icon">
								<a href="form-elements.html#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="form-elements.html#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="form-elements.html#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<form class="form-horizontal" action="assignaction.php" method="post">
							  <fieldset class="col-sm-12">	
					<div class="form-group">
	<label class="control-label" for="selectErrorT">Select Institution</label>
		<div class="controls">
		  <select name="iid" id="selectErrorT" class="form-control" data-rel="chosen">
								
<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');


$arr = array('institute_name' => 1);
$instis = FindAllAndFilter('Institutions',$arr);
foreach($instis as $insti){

echo '<option value="'.$insti['_id'].'">'.$insti['institute_name'].'</option>';

}

?>


		  </select>
		</div>
  </div>


							<div class="form-group">
	<label class="control-label" for="selectErrorT">Select Student/Students</label>
		<div class="controls">
		  <select name="pdoids[]" id="selectErrorT" class="form-control" multiple data-rel="chosen">
								
<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/ifunctions.php');
foreach($instis as $institute){
$i_id = $institute['_id'];
$I_PDOs = AllInstiRolePDO("$i_id","Student");

	
foreach ($I_PDOs as $PDO) {

echo '<option value="'.$PDO['_id'].'">'.$PDO['first_name'].$PDO['last_name'].'</option>';

}
}
?>


		  </select>
		</div>
  </div>


	


										<div class="form-group">
	<label class="control-label" for="selectErrorT">Select a Class to Assign</label>
		<div class="controls">
		  <select name="classid" id="classid" class="form-control"  data-rel="chosen">
								
	<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
foreach($instis as $institute){
$i_id = $institute['_id'];
$I_Classes = InstiClasses("$i_id");

foreach ($I_Classes as $class) {

echo '<option value="'.$class['_id'].'">'.$class['name'].'</option>';

}
}			
?>
		</select>
		</div>
  </div>



<div class="form-group">
	<label class="control-label" for="selectErrorT">Select Role/Roles to Assign</label>
		<div class="controls">
		  <select name="classroles[]" id="selectErrorT" class="form-control" multiple data-rel="chosen">
								
<?php
$DR = DefaultRoles('Class_Role','default');

$DRcount = count($DR);
for($i=0;$i<$DRcount;$i++){
echo '<option value="'.$DR[$i]["_id"].'">'.$DR[$i]["role_name"].'</option>';
}

?>


		  </select>
		</div>
  </div>


<script type='text/javascript'>

$(document).ready(function() {

$('#classid').change(function() {
$('#courses').html('options');
$.getJSON('../ajax/coursesinclass.php?cid='+ $(this).val(), function (data) {
		
		$.each(data, function (key, val) {
			$('#courses').append('<option value="'+ key+ '">' + val+ '</option>');
		});

	});
});

});
</script>

<div class="form-group">
	<label class="control-label" for="selectErrorT">Select Course/Courses to Assign</label>
<div class="controls" >
	 <select name="courses[]" id="courses"  class="form-control" multiple>
 </select>
</div>
</div>

							<div class="form-actions">
								  <button type="submit" class="btn btn-primary">Assign Class</button>
								  <button type="reset" class="btn">Cancel</button>
								</div>

    
					
			</div>
			<!-- end: Content -->
				
				</div><!--/row-->		
		
	</div><!--/container-->
	
		</div></div>
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
	
	
	
		
	
	
	<!-- page scripts -->
	<script src="../assets/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../assets/js/jquery.sparkline.min.js"></script>
	<script src="../assets/js/jquery.chosen.min.js"></script>
	<script src="../assets/js/jquery.cleditor.min.js"></script>
	<script src="../assets/js/jquery.autosize.min.js"></script>
	<script src="../assets/js/jquery.placeholder.min.js"></script>
	<script src="../assets/js/jquery.maskedinput.min.js"></script>
	<script src="../assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.min.js"></script>
	<script src="../assets/js/bootstrap-timepicker.min.js"></script>
	<script src="../assets/js/moment.min.js"></script>
	<script src="../assets/js/daterangepicker.min.js"></script>
	<script src="../assets/js/jquery.hotkeys.min.js"></script>
	<script src="../assets/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../assets/js/bootstrap-colorpicker.min.js"></script>
	
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="../assets/js/pages/form-elements.js"></script>
	
	<!-- end: JavaScript-->
	
</body>
</html>
