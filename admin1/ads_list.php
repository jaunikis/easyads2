<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>easyads.ie admin ads_list</title>
	<meta name="description" content="easyads.ie admin panel">
	<meta name="author" content="Marius V">
	<meta name="keyword" content="">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>

<?php
session_start();
if(!isset($_SESSION['email'])){
	header("Location: login.php"); /* Redirect browser */
	//require('login.php');
	exit();
}else{$username=$_SESSION['user_name'];}
require('navbar_top.php');
?>
	
<div class="container-fluid-full">
<div class="row-fluid">
				
<?php 
require('navbar_left.php');
?>
			
<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
		<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
	</div>
</noscript>
			
<!-- start: Content -->
<?php 
require('ads_list2.php');
?>
<!-- end: Content -->

</div><!--/#content.span10-->
</div><!--/fluid-row-->
		
<?php
require('modal.php');
require('footer.php');
?>
	
	
	
</body>
</html>

<?php
//require('head.php');
//require('navbar.php');
// start: Content
//require('index1.php');
// end: Content
//require('footer.php');
?>



