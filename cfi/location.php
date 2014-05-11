<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../bootstrap/assets/ico/favicon.ico">

    <title>Askhaya Patra Food Predictor</title>
	
	<!-- start: CSS -->
	<link href='../assets/css/bootstrap.min.css' rel='stylesheet'>
	<link href='../assets/css/style.min.css' rel='stylesheet'>
	<link href='../assets/css/retina.min.css' rel='stylesheet'>
	<!-- end: CSS -->

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.1/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>    

		<div class = "container">
			<?php
			$l_id = $_GET['locationid'];
			include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/locationfunctions.php');
			include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR . 'functions/consumptionfunctions.php');
			$LocationInfo = LocationInfo($l_id);
			?>
			<br>
			<br>
			<br>
			<div class = "container">
				<div class = "row">
					<div class = "col-md-12">
						<h1><?=$LocationInfo['School_Name'] ?></h1>
						<!--<h2><?=$LocationInfo['Range'] ?></h2>-->
						<p>Latitude: <?=$LocationInfo['loc']['coordinates'][1] ?></p>
						<p>Longitude: <?=$LocationInfo['loc']['coordinates'][0] ?></p>
					</div>
				</div>
			</div>

	  
			<div class="row">		
				<div class="col-md-8">
					<div class="box">
						<div class="box-header" data-original-title>
							<h2><i class="icon-user"></i><span class="break"></span>Total Data of this School</h2>
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
								  <th>Day</th>
								  <th>Quantity</th>
								  <th>Item Name</th>
							  </tr>
						  </thead>   
						  <tbody>						
							<!-- Continuation of PHP script-->
							<?php
							$ReqData = SchoolConsDateRange($l_id);
							$sno = 0;
							$AllQuantities = array();
												foreach($ReqData as $data){

							$AllQuantities[] = $data['Indentqty'];

							$sno = $sno + 1;
							echo " 
							<tr>
																<td>$sno</td>
																
										<td class='center'>".$data['INDENTDATE']."</td>
																<td class='center'>".$data['Indentqty']."</td>
															<td class='center'>".$data['bomname']."</td>
																
															</tr> ";
							}
							?> 			
							  </tbody>
						  </table>            
						</div>
					</div>
				</div><!--/col-->


<?php 
$average_of_quant = array_sum($AllQuantities) / count($AllQuantities); 
$rounded_avg = round($average_of_quant);
?>

			<div class = "col-md-4">
				<u><h1>Tomorrow's Food Prediction</h1></u>
				<h2><?=$rounded_avg?> servings</h2>
			</div>
		</div><!--/row-->
</div>
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

  </body>
</html>
