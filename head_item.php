<?php
$cat1='';
$cat2='';
$make='';
$model='';
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
$sql="SELECT * FROM skelbimai WHERE id='$item'";
$result=sqlconnect($sql);
$ad_count=$result->num_rows;
if($ad_count<1){exit('Ad not exist');}
while ($row = $result->fetch_assoc()) {
	$active=$row['active'];
	$id=$row['id'];
    $title=$row['title'];
	$cover=$row['cover1file'];if($cover==''){$cover='no-image.png';}
	$price=$row['price'];
	//$timestamp=$row['timestamp'];
	$cat1=$row['cat1'];
	$cat2=$row['cat2'];
	$make=$row['make'];
	$model=$row['model'];
	$fuel=$row['fuel'];
	$year=$row['year'];
	$engine=$row['engine'];
	$transmission=$row['transmission'];
	$bodyType=$row['bodyType'];
	$color=$row['color'];
	$location3=$row['location'];
	$condition2=$row['condition2'];
	$ad_views=$row['ad_views']; $ad_views++;
		$sql="UPDATE skelbimai SET ad_views='$ad_views' WHERE id='$item'";
		$result2=sqlconnect($sql);
	$description=$row['description'];$description = nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));
	$saved=$row['saved'];
	$phone=$row['phone'];
	$name=$row['name'];
	$user_id=$row['user_id'];
	$timestamp2=$row['timestamp2'];
	$currency=$row['currency'];
	$mileage=$row['mileage'];
	$mileage_type=$row['mileage_type'];
	$tax=$row['tax'];
	$email=$row['email'];
	$www=$row['www'];
}
?>

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
	
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $title;?>" />
	<meta property="og:description"   content="<?php echo strip_tags($description);?>" />
	<meta property="og:image"         content="http://www.easyads.ie/ads_images/<?php echo $cover;?>" />
	<meta property="og:image:type"    content="image/jpeg" />	

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ireland's Free Classified Ads, Sell and Buy adverts">
    <meta name="author" content="Marius Vorosilovas">
	  
	<meta name="keywords" content="<?php echo $cat1;?> for sale in Ireland, <?php echo $cat2;?> for sale in Ireland, <?php echo $cat1.' '.$cat2;?> for sale in Ireland, <?php echo $cat1;?>, <?php echo $cat2;?>, <?php echo $title;?>">
	
	<meta name="geo.country" content="IE">
	
	<meta name="rating" content="general">
	<meta http-equiv="content-language" content="en">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="global">
	
	
	
    <title><?php echo $title;?></title>
      
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



<img style="display:none" src="/images/fblogo.jpg">
 <div id="fb-root"></div>
