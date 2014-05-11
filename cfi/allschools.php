<?php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
$AllSchools = FindAllInCollection('locations'); 
?>
<head>
<!-- start: CSS -->
	<link href='../assets/css/bootstrap.min.css' rel='stylesheet'>
	<link href='../assets/css/style.min.css' rel='stylesheet'>
	<link href='../assets/css/retina.min.css' rel='stylesheet'>
	<!-- end: CSS -->
</head>

<div class="row">		
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header" data-original-title>
							<h2><i class="icon-user"></i><span class="break"></span>All Schools </h2>
							<div class="box-icon">
								<a href="viewwork.php#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="viewwork.php#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="viewwork.php#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">

							<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>S.No</th>
									  
									  <th>School Name</th>
										<th>Route Name</th>
									  <th>Route Code</th>
									  
								  </tr>
							  </thead>   
							  <tbody>
								

<!-- Continuation of PHP script-->
<?php
$sno = 0;
					foreach($AllSchools as $OneSchool){


$sno = $sno + 1;
echo " 
<tr>
									<td>$sno</td>
									
			<td class='center'><a href = location.php?locationid=".$OneSchool['_id']."><font color='red'>".$OneSchool['School_Name']."</a></font></td>
									<td class='center'>".$OneSchool['Route_Name']."</td>
								<td class='center'>".$OneSchool['Route_Code']."</td>
									
								</tr> ";
}
?> 
								
							  </tbody>
						  </table>            
						</div>
					</div>
				</div><!--/col-->
			
			</div><!--/row-->

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
        <script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.min.js"></script>
	
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="../assets/js/pages/form-elements.js"></script>
	<script src="../assets/js/pages/table.js"></script>
