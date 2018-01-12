<?php
	if(isset($_SESSION['s_location'])){unset($_SESSION['s_location']);}
	if(isset($_SESSION['search'])){unset($_SESSION['search']);}
	if(isset($_SESSION['cat1'])){unset($_SESSION['cat1']);}

	$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$segments = explode('?', $actual_link);
	//echo $segments[1];
	if(count($segments)>1){
		parse_str($segments[1]);
		if(isset($location)){if($location!=='All Locations'){$_SESSION['s_location']=$location;}}
		if(isset($cat1)){if($cat1!=='All Category'){$_SESSION['cat1']=$cat1;}}
		if(isset($search)){$_SESSION['search']=$search;}
	}
	if(isset($item)){
		require('head_item.php');
		require('top_nav.php');
		require('breadcumb_search.php');
		require('item.php');
		require('footer.php');
	}else{
		require('head_list.php');
		require('top_nav.php');
		require('breadcumb_search.php');
		require('ad_list.php');
		require('footer.php');
	}
?>
