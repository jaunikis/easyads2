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
	<a href="sms://0862221538">Send an SMS</a>
	<br>
	
	<?php
	require_once '../Mobile_Detect.php';
					$detect = new Mobile_Detect;
					// Any mobile device (phones or tablets).
					if($detect->isMobile()){echo 'mobile';}else{echo 'not mobile';}
					echo '<hr>';
					if($detect->is('Chrome')){echo 'chrome';};
						
	?>
	
</div>