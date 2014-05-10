<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/userfunctions.php');
global $directorypath;
if(!checkSession()){

}
else{
header("location: ".$directorypath."/User/profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Log In | Bookstore</title>
	<meta name="description" content="Schoomin">
	<meta name="author" content="Satish">
	<meta name="keyword" content="Schoomin, School Administration, Software SIS, Big-Data, Analytics, Education, Real Time Analytics">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/style.min.css" rel="stylesheet">
	<link href="../assets/css/retina.min.css" rel="stylesheet">
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<script src="../assets/css/ie6-8.css"></script>
		
	<![endif]-->
	
	<!-- start: Favicon and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../assets/ico/books.png">
	<!-- end: Favicon and Touch Icons -->	
	

<style>
body {
  background: url(../assets/img/front.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>
</head>
<body>
        <!-- Start: Header-->
        <header class="navbar"> <a class="navbar-brand col-lg-2 col-sm-1 col-xs-12" href="index.php"><span>Bookstore</span></a>
        <div class="container">  </div>
        </header>
        <!--end: Header-->
      
		<div class="container">
		<div class="row">
				
			<div class="row">
				<div class="login-box">
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="checklogin.php" method="post">
						<fieldset>
							
							<input class="input-large col-xs-12" name="uname" id="uname" type="text" placeholder="Username"/>

							<font color ="red"> <input class="input-large col-xs-12" name="upassword" id="upassword" type="password" placeholder="Got a Password?"/> </font>

							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							
							<div class="clearfix"></div>
							
							<button type="submit" class="btn btn-primary col-xs-12">Login</button>
						</fieldset>	

					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="login.php">click here</a> to get a new password.
					</p>	
				</div>
			</div><!--/row-->
			 
                
				</div><!--/row-->		
		
	</div><!--/container-->
	
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
	
		
	
		
	<!-- theme scripts -->
	<script src="../assets/js/custom.min.js"></script>
	<script src="../assets/js/core.min.js"></script>
		
	<!-- end: JavaScript-->
	
</body>
</html>
