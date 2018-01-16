<!DOCTYPE html>
<html lang="en">
   <head>
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-4761601799795972",
		enable_page_level_ads: true
	  });
	</script>

	<!-- You can use Open Graph tags to customize link previews.
		Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://www.easyads.ie" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Free Ireland's Classified Ads" />
	<meta property="og:description"   content="Buy and sell, post your free ad today." />
	<meta property="og:image"         content="http://www.easyads.ie/images/easy-logo.png" />
	<meta property="og:image:type"    content="image/jpeg" />	

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Signup | easyads.ie">
    <meta name="author" content="Marius Vorosilovas">
	  
	<meta name="keywords" content="signup, new account">
	
	<meta name="keyphrases" content="signup, new account">
	<meta name="geo.country" content="IE">	
	
    <title>Signup | easyads.ie</title>
      
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
      <link rel="stylesheet" href="/plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="/plugins/owl-carousel/owl.theme.css">
      <!-- Font Awesome   -->
      <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  
	 
   </head>

<body>
<!-- facebook sdk app id -->
<script>
 // initialize and setup facebook js sdk
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '113602379360573',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		    //FB.getLoginStatus(function(response) {
		    //	if (response.status === 'connected') {
		    //		document.getElementById('status').innerHTML = 'We are connected.';
		    //		document.getElementById('login_fb').style.visibility = 'hidden';
		    //	} else if (response.status === 'not_authorized') {
		    //		document.getElementById('status').innerHTML = 'We are not logged in.'
		    //	} else {
		    //		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    //	}
		    //});
		};
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// login with facebook with extra permissions
		function login() {
			FB.login(function(response) {
				if (response.status === 'connected') {
					getInfo();
		    	} else if (response.status === 'not_authorized') {
		    		alert('You are not logged in.');
		    	} else {
		    		alert('You are not logged into Facebook.');
		    	}
			}, {scope: 'email'});
		}
		
		// getting basic user info
		function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,email,id,picture.width(150).height(150)'}, function(response) {
				$.post("fb-login2.php",
					{
						secret: '425611',
						id: response.id,
					  first_name: response.first_name,
					  last_name: response.last_name,
					  email: response.email
					},
					function(data,status){
						//alert("Data: " + data + "\nStatus: " + status);
						if(data=='ok'){window.location.replace("/my_ads");}
					});
				});
				
		}
</script>


<?php
require('top_nav.php');
$_SESSION['heading']='Sign up';
require('breadcumb.php');
require('signup1.php');
require('footer_short.php');
?>