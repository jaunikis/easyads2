<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page not found">
    <meta name="author" content="Marius Vorosilovas">
	  
	
	<meta name="geo.country" content="IE">
	
	<meta name="rating" content="general">
	<meta http-equiv="content-language" content="en">
	<meta name="robots" content="no-index,no-follow">
	<meta name="distribution" content="global">
	
	
	
    <title>Page not found</title>
      
	<script src="/js/jquery-3.2.1.js"></script>
	  
	  <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon.png">
      <link rel="icon" type="image/png" href="/images/favicon.png">
      <!-- Bootstrap CSS -->    
	  <link href="/css/bootstrap.min.css" rel="stylesheet">
	  <!-- Google Font -->
      <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin" type="text/css" />
      <!-- Custom CSS -->
      <link href="/css/style.css" rel="stylesheet">
	  <link href="/css/style2-2.css" rel="stylesheet">
	  <!-- favourites, myads CSS -->
      <link href="/css/myfav.css" rel="stylesheet">
      <!-- Owl Carousel -->
      
      <!-- Font Awesome   -->
      <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  
	 
   </head>

<body>

<?php
require('top_nav.php');
$_SESSION['heading']='Page not found!';
require('breadcumb.php');
require('not_found.php');
require('footer_short.php');
?>