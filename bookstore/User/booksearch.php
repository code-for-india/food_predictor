<?php 
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');
	
global $directorypath;
if(!checkSession()){
		redirect();
	} else {
	
	}




echo $header?>

<body>
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $mainmenu?>
						
			<!-- start: Content -->
			<div id="content" class="col-lg-10 col-sm-11">

			
						
			<div class="row">

<?php
$AllBooks = FindAllInCollection('books');
//print_r($AllBooks);

?>


			<div class="row">		
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header" data-original-title>
							<h2><i class="icon-user"></i><span class="break"></span>Books </h2>
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
									  
									  <th>Book Name</th>
									  <th>ISBN</th>
									  <th>Author</th>
									  <th>Publisher</th>
									  <th>Category</th>
									  
									  
								  </tr>
							  </thead>   
							  <tbody>
								

<!-- Continuation of PHP script-->
<?php
$sno = 0;
					foreach($AllBooks as $OneBook){


$sno = $sno + 1;
echo " 
<tr>
									<td>$sno</td>
									
									<td class='center'>".$OneBook['book_name']."</td>
									<td class='center'>".$OneBook['isbn']."</td>
									<td class='center'>".$OneBook['author']."</td>
									<td class='center'>".$OneBook['publisher']."</td>
									<td class='center'>".$OneBook['category']."</td>
									
									
								</tr> ";
}
?> 
								
							  </tbody>
						  </table>            
						</div>
					</div>
				</div><!--/col-->
			
			</div><!--/row-->


				</div></div><!--/row-->		
		
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
        <script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.min.js"></script>
	
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="../assets/js/pages/form-elements.js"></script>
	<script src="../assets/js/pages/table.js"></script>



	
	
	
	
	


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
