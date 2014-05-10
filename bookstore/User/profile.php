<?php 
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/userfunctions.php');
global $directorypath;
if(!checkSession()){
header("location: ".$directorypath."/User/login.php");
}

$uid = $_SESSION['uid'];	
$UserInformation = UserInfo($uid); 

echo $header?>

<body>
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
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.min.js"></script>
	
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="../assets/js/pages/table.js"></script>
	



	<!-- end: JavaScript-->
 
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $mainmenu ?>
 
						
			<!-- start: Content -->
			<div id="content" class="col-lg-10 col-sm-11">
			
			
			<div class="row">	
 

<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<h2><i class="icon-user"></i>Profile</h2>
						</div>
						<div class="box-content">

  <script>
  $(function() {
    $( "#profiletabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.error(function() {
          ui.panel.html(
            "Hi Welcome to your Profile. " +
           "Here user information will be displayed." );
        });
      }
    });
  }); 
  </script>
<div class="nav tab-menu nav-tabs" id="profiletabs" >
 

							 <ul>
						
						<li><a href="http://localhost/socialschoomin/ajax/profile.php">Profile Info</a></li>

						<li class="active"><a href="#classinfo">About Me</a></li>
							</ul>

							
  <div id="classinfo">
    <p>Wait our loyal customer. We'll fix this for sure :p</p>

<?php print_r($UserInformation); ?>
  </div>

</div>

						</div>
					</div>
				</div><!--/col-->
			
			</div><!--/row-->

			</div>
			
			<!-- end: Content -->
				
			</div>	<!--/row-->		
		
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
	</div>
	<div class="clearfix"></div>
	
	<?php echo $footer ?>
	
	
	
</body>
</html>
