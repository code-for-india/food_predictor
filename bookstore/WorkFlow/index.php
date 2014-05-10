<?php 

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');

echo $header?>

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
							<h2><i class="icon-edit"></i>Work Flow Submission Form for </h2>



								 

							<div class="box-icon">
								<a href="form-elements.html#" class="btn-setting"><i class="icon-wrench"></i></a>
								<a href="form-elements.html#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="form-elements.html#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">

							<form class="form-horizontal" action="worksave.php" method="POST">
							  <fieldset class="col-sm-12">	


 								

								<div class="form-group">
									<label class="control-label" for="disabledInput">Teacher Name</label>
									<div class="controls">
									  <input class="form-control disabled" id="disabledInput" type="text" placeholder="" disabled="">
									</div>
								  </div>

								<div class="form-group">
									<label class="control-label" for="disabledInput">Class & Section Name</label>
									<div class="controls">
									 <input class="form-control disabled"  type="text" placeholder="" disabled="">
									</div>
								  </div>

			<input type="hidden" value="" name="secid" id="secid">

								<div class="form-group">
									<label class="control-label" for="disabledInput">Subject Name</label>
									<div class="controls">
									  <input class="form-control disabled"  type="text" placeholder="" disabled="">
									</div>
								  </div>


				




							<div class="form-group">
								  <label class="control-label" for="date01" id="date" name="date"> Date</label>
								  <div class="controls row">
									<div class="input-group date col-sm-4" id="date" name="date">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
						<input type="text" class="form-control date-picker" id="date" name="date" data-date-format="dd/mm/yyyy" value ="" />
									</div>	
								  </div>
								</div>


							<div class="form-group">
									<label class="control-label" for="selectError">Select Type of Work</label>
									<div class="controls">
					<select id="selectError" class="form-control" data-rel="chosen" name="worktype" id="worktype">
										
							<option value="Syllabus" selected >Syllabus</option>
							<option value="Revision" >Revision</option>
							<option value="Assessment">Assessment</option>
							<option value="Activity">Activity</option>
							<option value="Other">Other</option>

													

									  </select>
									</div>
								  </div>




	


								<div class="form-group">
									<label class="control-label">Topic Status</label>
									<div class="controls">
									  <label class="checkbox inline">
				<input type="checkbox" id="inlineCheckbox1"  id="topicstatus" name="topicstatus" value="completed"> Completed
									  </label>
									  
									</div>
								  </div>


							<div class="form-group has-success">
								  <label class="control-label" for="inputSuccess">Aid Used</label>
							  <input type="text" class="form-control"  id="aid" name="aid">
								</div>





							<div class="form-group has-success">
								  <label class="control-label" for="inputSuccess">Remarks</label>
						  <input type="text" class="form-control" id="remarks" name="remarks">
								</div>

						

								<div class="form-actions">
								  <button type="submit" class="btn btn-primary">Submit</button>
								  <button type="reset" class="btn">Reset</button>
								</div>



						
							  </fieldset>
							</form>   

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
	
	<!-- end: JavaScript-->
	
</body>
</html>
