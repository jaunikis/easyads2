<?php 

if(isset($_GET['pageid'])){
	if($_GET['pageid']=='generator'){require('generator/index.php');}
}

session_start();
include_once("incl/analytics_tracking.php");

require_once ('incl/server.php');
require('incl/pataisom_timestamp.php');

if(isset($_COOKIE['user'])){$_SESSION['user']=$_COOKIE['user'];}
//require_once ('incl/defined_vars.php');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);
//echo($path);
//echo $segments[3];
//for($a=1;$a<count($segments);$a++){echo $a.'  -  '.$segments[$a].'<br>';}

//skaiciuojam userius
$ip=$_SERVER['REMOTE_ADDR'];
$date = new DateTime();$timestamp=$date->getTimestamp();
//tikriname kada paskutinis
$timestamp3=$timestamp-60;
//$sql="SELECT timestamp,ip,path FROM stats WHERE timestamp>'$timestamp3' AND ip='$ip' AND path='$path'";
$sql="SELECT timestamp,ip,path FROM stats WHERE timestamp>'$timestamp3' AND ip='$ip'";
$result=sqlconnect($sql);
$ad_count = $result->num_rows;
//echo $ad_count;
if($ad_count==0){
	$user_id='';
	if(isset($_SESSION['user_id'])){$user_id=$_SESSION['user_id'];}
	$referer='';
	if(isset($_SERVER['HTTP_REFERER'])){$referer=$_SERVER['HTTP_REFERER'];}
	//getting country, city
	$country='';$city='';$countryCode='';
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
	if($query && $query['status'] == 'success') {
	$country=$query['country'];
	$city=$query['city'];
	$countryCode=$query['countryCode'];
}
	$sql="INSERT INTO stats (ip,timestamp,path,user_id,referer,country,city,countryCode) VALUES ('$ip','$timestamp','$path','$user_id','$referer','$country','$city','$countryCode')";
	$res=sqlconnect($sql);
}

$segm='';
if(isset($segments[1])){$segm=$segments[1];}
switch($segm){
case 'share':
	$page='';
    if(isset($segments[2])){$page=$segments[2];}
	$title='';
    if(isset($segments[3])){$title=$segments[3];}
	$location='';
    if(isset($segments[4])){$location=$segments[4];}
	$id='';
    if(isset($segments[5])){$id=$segments[5];}
    //header('Location: /share.php?page='.$page.'&id='.$id);
	echo '<script> window.location.href=("/share.php?page='.$page.'&title='.$title.'&location='.$location.'&id='.$id.'");</script>';
    break;
case 'faq':
	require('faq.php');
	break;
case 'blog':
	require('blog.php');
    break;
case 'admin':
	require('admin.php');
    break;
case 'contact':
    require('contact.php');
    break;
case 'edit':
    require('edit.php');
    break;
case 'favourite':
	require('head_home.php');
    require('top_nav.php');
    require('left_profile.php');
    require('favourite.php');
    require('footer_short.php');
    break;
case 'my_ads':
	require('head_home.php');
    require('top_nav.php');
    require('left_profile.php');
    require('my_ads.php');
    require('footer_short.php');
    break;
case 'my_details':
	require('head_home.php');
    require('top_nav.php');
    require('left_profile.php');
    require('my_details.php');
    require('footer_short.php');
    break;
  case '':
  case 'home':
	require('home.php');
    break;
case 'password_change':
	require('head_home.php');
    require('top_nav.php');
	$_SESSION['heading']='Change Password';
    require('breadcumb.php');
    require('password_change.php');
    require('footer_short.php');
    break;
case 'forgot':
	require('head_home.php');
    require('top_nav.php');
	$_SESSION['heading']='Forgot Password';
    require('breadcumb.php');
    require('forgot.php');
    require('footer_short.php');
    break;
  case 'login':
	require('login.php');
    break;
case 'signup':
	require('signup.php');
    break;
  case 'post_ad':
  case 'post':
	require('post.php');
    break;
case 'items':
	require('items.php');
    break;
  default:
	require('404.php');
    break;
}
?>
	  <!-- Post Ad -->	
      <a href="/post_ad" data-toggle="tooltip" data-placement="left" title="Post Your Ad" class="btn btn-primary btn-lg post-free-add-btn" style="z-index: 2;"><i class="fa fa-pencil"></i></a>
      <!-- jQuery -->
      
      <!-- Custom js--> 
      <script src="/js/custom.js"></script>
      <!-- Bootstrap JavaScript-->
	  <script src="/js/bootstrap.min.js"></script>  
	  
	  

      <!-- Owl Carousel -->
      <script src="/plugins/owl-carousel/owl.carousel2.js"></script>

	
   </body>
</html>