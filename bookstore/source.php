<?php 
/***
* Source File
*
* This file contains header, footer, menu information and can be called 
* 
**/
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/userfunctions.php');

if(!checkSession()){
		$name = 'Howdy';
	} else {
$uid = $_SESSION['uid'];	
$UserInformation = UserInfo($uid); 
$name = $UserInformation['first_name'];
	}

global $directorypath;
$header = " <!DOCTYPE html>
<html lang='en'>
<head>
	
	<!-- start: Meta -->
	<meta charset='utf-8'>
	<title>A Novel Idea</title>
	<meta name='description' content='Schoomin'>
	<meta name='author' content='Satish'>
	<meta name='keyword' content='Schoomin, School Administration, Software SIS, Big-Data, Analytics, Education, Real Time Analytics'>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link href='".$directorypath . DIRECTORY_SEPARATOR ."assets/css/bootstrap.min.css' rel='stylesheet'>
	<link href='".$directorypath . DIRECTORY_SEPARATOR ."assets/css/style.min.css' rel='stylesheet'>
	<link href='".$directorypath . DIRECTORY_SEPARATOR ."assets/css/retina.min.css' rel='stylesheet'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	[if lt IE 9]>
	
	  	<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
		<script src='".$directorypath . DIRECTORY_SEPARATOR ."assets/js/respond.min.js'></script>
		<script src='".$directorypath . DIRECTORY_SEPARATOR ."assets/css/ie6-8.css'></script>
		
	<![endif]-->
	
	<!--  start: Favicon and Touch Icons  -->
	<link rel='apple-touch-icon-precomposed' sizes='144x144' href='".$directorypath . DIRECTORY_SEPARATOR ."assets/ico/apple-touch-icon-144-precomposed.png'>
	<link rel='apple-touch-icon-precomposed' sizes='114x114' href='".$directorypath . DIRECTORY_SEPARATOR ."assets/ico/apple-touch-icon-114-precomposed.png'>
	<link rel='apple-touch-icon-precomposed' sizes='72x72' href='".$directorypath . DIRECTORY_SEPARATOR ."assets/ico/apple-touch-icon-72-precomposed.png'>
	<link rel='apple-touch-icon-precomposed' href='".$directorypath . DIRECTORY_SEPARATOR ."assets/ico/apple-touch-icon-57-precomposed.png'>
	<link rel='shortcut icon' href='".$directorypath . DIRECTORY_SEPARATOR ."assets/ico/books.png'>
	
	<!-- end: Favicon and Touch Icons -->	
		
</head> ";


//Top Menu
$topmenu= "<!-- start: Header -->
	<header class='navbar'>
		<div class='container'>
			<button class='navbar-toggle' type='button' data-toggle='collapse' data-target='.sidebar-nav.nav-collapse'>
			      <span class='icon-bar'></span>
			      <span class='icon-bar'></span>
			      <span class='icon-bar'></span>
			</button>
			<a id='main-menu-toggle' class='hidden-xs open'><i class='icon-reorder'></i></a>		
				<a class='navbar-brand col-lg-2 col-sm-1 col-xs-12' href='".$directorypath . DIRECTORY_SEPARATOR ."index.php'><span>Bookstore</span></a>
			<!-- start: Header Menu -->
			<div class='nav-no-collapse header-nav'>
				<ul class='nav navbar-nav pull-right'>
					<li class='dropdown hidden-xs'>
						<a class='btn dropdown-toggle' data-toggle='dropdown' href='#'>
							<i class='icon-warning-sign'></i>
						</a>
						<ul class='dropdown-menu notifications'>
							<li class='dropdown-menu-title'>
								<span>You have 1 notification</span>
							</li>	
                        	
							<li>
							<span class='message'>Syllabus Deadline </span>
                            <!--    <a href='#'>
									<span class='icon blue'><i class='icon-user'></i></span>
									<span class='message'>Syllabus Deadline </span>
									<span class='time'>yesterday</span> 
-->                                </a>
                            </li>
                            <li class='dropdown-menu-sub-footer'>
                        		<a>View all notifications</a>
							</li>	
						</ul>
					</li>
					<!-- start: Notifications Dropdown -->
					<li class='dropdown hidden-xs'>
						<a class='btn dropdown-toggle' data-toggle='dropdown' href='index.php'>
							<i class='icon-tasks'></i>
						</a>
				<!--		<ul class='dropdown-menu tasks'>
							<li>
								<span class='dropdown-menu-title'> You have 3 orders(orders in user shopping cart)  </span>
                        	</li>
							
							<li>
                                <a href='#'>
									<span class='header'>
										<span class='title'>Book Name </span>
										<span class='percent'></span>
									</span>
                                    <div class='taskProgress progressSlim progressGreen'>63</div> 
                                </a>
                            </li>
                            <li>
                                <a href='#'>
									<span class='header'>
										<span class='title'>Book catogery</span>
										<span class='percent'></span>
									</span>
                                    <div class='taskProgress progressSlim progressPink'>80</div> 
                                </a>
                            </li>
							<li>
                        		<a class='dropdown-menu-sub-footer'>View all List</a>
							</li>	
						</ul>
					--> </li>
					<!-- end: Notifications Dropdown -->
					<!-- start: Message Dropdown -->
					<li class='dropdown hidden-xs'>
						<a class='btn dropdown-toggle' data-toggle='dropdown' href='index.php#'>
							<i class='icon-envelope'></i>
						</a>
						<ul class='dropdown-menu messages'>
							<li>
								<span class='dropdown-menu-title'>You have 2 orders</span>
							</li>	
                        	
                            <li>
                                <a href='#'>
									<span class='avatar'><img src='".$directorypath . DIRECTORY_SEPARATOR ."assets/img/avatar5.jpg' alt='Avatar'></span>
									<span class='header'>
										<span class='from'>
									    	Employee1
									     </span>
										<span class='time'>
									    	April  30, 2014
									    </span>
									</span>
                                    <span class='message'>
                                        All Employees.
                                    </span>  
                                </a>
                            </li>
							<li>
                        		<a class='dropdown-menu-sub-footer'>View all orders</a>
							</li>	
						</ul>
					</li>
					<!-- end: Message Dropdown -->
					<li>
						<a class='btn' href='#'>
							<i class='icon-wrench'></i>
						</a>
					</li>
					<!-- start: User Dropdown -->
					<li class='dropdown'>
						<a class='btn account dropdown-toggle' data-toggle='dropdown' href='#'>
							<div class='avatar'><img src='".$directorypath . DIRECTORY_SEPARATOR ."assets/img/avatar5.jpg' alt='Avatar'></div>
							<div class='user'>
								<span class='hello'>Welcome!</span>
								<span class='name'> $name </span>
							</div>
						</a>
						<ul class='dropdown-menu'>
							<li class='dropdown-menu-title'>
								
							</li>
							<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/profile.php'><i class='icon-user'></i> Profile</a></li>
							<li><a href='#'><i class='icon-cog'></i> Settings</a></li>
							<li><a href='#'><i class='icon-envelope'></i> Orders List</a></li>
							<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/logout.php'><i class='icon-off'></i> Logout</a></li>
						</ul>
					</li>
					<!-- end: User Dropdown -->
				</ul>
			</div>
			<!-- end: Header Menu -->
			
		</div>	
	</header>
	<!-- end: Header --> ";

	
//Menu
$mainmenu = " <!-- start: Main Menu -->
			<div id='sidebar-left' class='col-lg-2 col-sm-1'>
				
				<input type='text' class='search hidden-sm' placeholder='...' />
				
				<div class='nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse'>
					<ul class='nav nav-tabs nav-stacked main-menu'>
						<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/insertbook.php'><i class='icon-bar-chart'></i><span class='hidden-sm'>Insert Book</span></a></li>
						
						
						<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/booksearch.php'><i class='icon-dashboard'></i><span class='hidden-sm'>booksearch</span></a></li>

						<li><a href='#'><i class='icon-dashboard'></i><span class='hidden-sm'>My Cart</span></a></li>
<li><a href='#'><i class='icon-dashboard'></i><span class='hidden-sm'>Purchase History</span></a></li>
<!-- 
<li><a href='#'><i class='icon-dashboard'></i><span class='hidden-sm'> </span></a></li>
	 -->					
						
						
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->  ";
/*
<!-- 
$InstiMenu = " <!-- start: Main Menu -->
<!--   			<div id='sidebar-left' class='col-lg-2 col-sm-1'>
				
				<input type='text' class='search hidden-sm' placeholder='...' />
				
				<div class='nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse'>
					<ul class='nav nav-tabs nav-stacked main-menu'>
						<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."index.php'><i class='icon-bar-chart'></i><span class='hidden-sm'> Dashboard</span></a></li>
						
						
						<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/MyInsti.php'><i class='icon-dashboard'></i><span class='hidden-sm'>My Insti's</span></a></li>

						

						
						
						
					</ul>
				</div>
			</div>-->
			<!-- end: Main Menu -->  ";
<!-- 
$ClassMenu = " <!-- start: Main Menu -->
	
	<!-- 		<div id='sidebar-left' class='col-lg-2 col-sm-1'>
				
				<input type='text' class='search hidden-sm' placeholder='...' />
				
				<div class='nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse'>
					<ul class='nav nav-tabs nav-stacked main-menu'>
						
<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/MyInsti.php'><i class='icon-dashboard'></i><span class='hidden-sm'>My Insti</span></a></li>						
						<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/aboutclass.php'><i class='icon-dashboard'></i><span class='hidden-sm'>About Class</span></a></li>

						<li><a href='#'><i class='icon-dashboard'></i><span class='hidden-sm'>Teachers</span></a></li>

						<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."Attendance/mark.php'><i class='icon-dashboard'></i><span class='hidden-sm'>Mark Attendance</span></a></li>
<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."Attendance/view.php'><i class='icon-dashboard'></i><span class='hidden-sm'>View Attendance</span></a></li>
	<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."User/courses.php'><i class='icon-dashboard'></i><span class='hidden-sm'>Courses</span></a></li>
<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."WorkFlow/workflow.php'><i class='icon-dashboard'></i><span class='hidden-sm'>Enter Work</span></a></li>
<li><a href='".$directorypath . DIRECTORY_SEPARATOR ."WorkFlow/viewwork.php'><i class='icon-dashboard'></i><span class='hidden-sm'>View Work</span></a></li>
		
						
					</ul>
				</div>
			</div>  
			<!-- end: Main Menu -->  ";



$footer = "<footer>
			<p>
				<span style='text-align:left;float:left'>&copy; 2014 <a href='http://satinos.com' alt='Satinos Technologies Private Limited'>Satinos</a></span>
				<span class='hidden-phone' style='text-align:right;float:right'>Powered by: <a href='http://chava.com' alt='School Administration Software'>Schoomin</a></span>
			</p>

		</footer>"; 

*/			
?>
