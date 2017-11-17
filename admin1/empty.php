<?php
if(!isset($_SESSION['email'])){
	header("Location: login.php"); /* Redirect browser */
	exit();
}else{$username=$_SESSION['email'];}
?>


<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="/admin1">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#"><?php echo $page;?></a></li>
	</ul>
	namas
</div>