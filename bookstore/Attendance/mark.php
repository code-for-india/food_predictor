<?php 
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/ifunctions.php');
	
global $directorypath;
if(!checkSession()){
		redirect();
	} else {
	$classid = $_SESSION['classid'];
$pdoid = $_SESSION['pdoid'];
	}
$rpid = '531f22cfd1f73c622e8b4567';
if(CheckRolePermissionForClass($pdoid,$classid,$rpid)){

}
else {
header("location: ".$directorypath."/Attendance/view.php");
}

echo $header?>

<body>
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $ClassMenu?>
						
			<!-- start: Content -->
			<div id="content" class="col-lg-10 col-sm-11">
			
							
			<div class="row">

				<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<h2><i class="icon-edit"></i>Students Attendance Register</h2>



								 

							<div class="box-icon">
								<a href="form-elements.html#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="form-elements.html#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="form-elements.html#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<form class="form-horizontal" action="classattendance.php" method="post">
							  <fieldset class="col-sm-12">	
					
  
							

<?php
echo "
<input type='hidden' name = 'classid' value =".$classid." > ";

?>
<div class="form-group">
								  <label class="control-label" for="date01" id="date" name="date"> Date</label>
								  <div class="controls row">
									<div class="input-group date col-sm-4" id="date" name="date">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
						<input type="text" class="form-control date-picker" id="date" name="date" data-date-format="dd/mm/yyyy" value ="<?php echo date('d/m/Y');; ?>" />
									</div>	
								  </div>
								</div>


<div class="form-group">
	<label class="control-label" for="selectErrorT">Select Students</label>
		<div class="controls">
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/afunctions.php');

$students = AllClassPDO($classid);
$myarrcount = count($students);

for($i=0;$i<$myarrcount;++$i){
$PDOInfo = PDOInfo($students[$i]);
echo '

				'.$PDOInfo['first_name'].' &nbsp; '.$PDOInfo['last_name'].'    &nbsp; <input type="checkbox" name= violations['.$students[$i].']  value="Absent" /> Absent 
<input type="checkbox" name= violations['.$students[$i].'] value="Tardy" /> Tardy 
<br>
									 
';
} 
?>
	</div>	</div>						<div class="form-actions">
								  <button type="submit" class="btn btn-primary">Mark Attendance</button>
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


		<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(':checkbox').on('change',function(){
 var th = $(this), name = th.prop('name'); 
 if(th.is(':checked')){
     $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);   
  }
});
});//]]>  

</script>
	
	<!-- end: JavaScript-->
	
</body>
</html>
