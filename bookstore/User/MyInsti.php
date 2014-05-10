<?php 
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'source.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/userfunctions.php');
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/ifunctions.php');
global $directorypath;
if(!checkSession()){
header("location: ".$directorypath."/User/login.php");
}
$uid = $_SESSION['uid'];	
$UserInformation = UserInfo($uid); 

echo $header?>

<body>
		<?php echo $topmenu; ?>
	
		<div class="container">
		<div class="row">
				
			<?php echo $InstiMenu?>
 
				<div id="content" class="col-lg-10 col-sm-11">

  <div>
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        
      </ul>
    </div><!-- /btn-group -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
      </ul>
    </div><!-- /btn-group -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
      </ul>
    </div><!-- /btn-group -->
    
  </div>
<?php 

$pdos = AllPDOsOfUser($uid);



$count = count($pdos);
for($k=0;$k<$count;++$k){
$TotalPDOs[$k] = $pdos[$k]["PDO_linked"]["pdo_id"];
//$myclasses[$k] = ($pdos[$k]["PDO_linked"]["pdo_id"]);
}

echo"
<!-- start: Content -->
			<div id='content' class='col-lg-10 col-sm-11'>

<div class='row'>

<div class='col-lg-12'>";
foreach($TotalPDOs as $singlepdo){
$PDOInfo = PDOInfo($singlepdo);

$InstiProfile= InstiProfile($PDOInfo['i_id']);
$iname = $InstiProfile['institute_name'];
$iid = $PDOInfo['i_id'];

echo"
<div class='panel panel-default'>
<div class='panel-heading'>
$iname
</div>
<div class='panel-body'>";



print_r($PDOInfo['first_name'].$PDOInfo['last_name']);
$Classes = ClassesInPDO($singlepdo);
//Break For Each-PDO i.e Grouping of Classes in a Single PDO


foreach($Classes as $class){
$ClassInfo = ClassInfo($class);
$ClassName = $ClassInfo['name'];
echo "<a href='class.php?classid=$class&amp;pdoid={$singlepdo}'>
<div class='col-md-2 col-sm-4'>

					<div class='tempStatBox'>
						<div class='tempStat'><font size ='3'>".$ClassName."</font></div></a>

 </div></div>";
}
echo"</div></div>";
}

?>

</div>	</div></div>
				
			</div>
			
		</div>
			
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
