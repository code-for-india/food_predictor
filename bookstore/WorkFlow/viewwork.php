<?php include_once 'source.php'; 
include_once  'functions/workfunctions.php';

echo $header?>

<body>
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $coursemenu?>
						
			<!-- start: Content -->
			<div id="content" class="col-lg-10 col-sm-11">
			
			
			<div class="row">		
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header" data-original-title>
							<h2><i class="icon-user"></i><span class="break"></span>Total Work Flow <?php echo getsecname($_SESSION['sectionid']); echo '&nbsp'; echo getcoursename($_SESSION['courseid']); ?></h2>
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
									  <th>Work Type</th>
									  <th>Date of Work</th>
									  <th>Topic/Work</th>
									  <th>Status</th>
									  <th>By</th>
									  <th>Actions</th>
								  </tr>
							  </thead>   
							  <tbody>
								

<?php 
$cid= $_SESSION['courseid'];
$sid = $_SESSION['sectionid'];
getwork($sid,$cid);
global $cursor;
foreach($cursor as $document){
$t=count($document["topic"]);

//$ctcount = $ctcount + $t;
 for($k=0;$k<$t;++$k){
 
if($document['topicstatus']=='running'){
$label = 'label-danger';
}
else {
$label = 'label-success';
}
echo " 
<tr>
									<td>".$document['worktype']."</td>
									<td class='center'>".date('d-M-y', $document['date']->sec)."</td>
									<td class='center'>".tidtodetails($cid,$document['topic'][$k])."</td>
									<td class='center'>

							<span class='label ".$label."'>".$document['topicstatus']."</span>
									</td>
									<td class='center'>Me </td>
									<td class='center'>
										<a class='btn btn-success' href='#'>
											<i class='icon-zoom-in '></i>  
										</a>
										<a class='btn btn-info' href='#'>
											<i class='icon-edit '></i>  
										</a>
										<a class='btn btn-danger' href='#'>
											<i class='icon-trash '></i> 
										</a>
									</td>
								</tr> ";

 }
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

			<script src="assets/js/jquery-2.0.3.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="assets/js/jquery-1.10.2.min.js"></script>
	
	<![endif]-->

	<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
			</script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		
	<![endif]-->
	<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
		
	
	
	<!-- page scripts -->
	<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>
	
	<!-- theme scripts -->
	<script src="assets/js/custom.min.js"></script>
	<script src="assets/js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="assets/js/pages/table.js"></script>
	
	<!-- end: JavaScript-->
	
</body>
</html>
