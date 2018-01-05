<?php
if(isset($segments[2])){
	if($segments[2]!=''){
		require('blog_one.php');
	}else{require('blog_home.php');}
}else{require('blog_home.php');}
?>