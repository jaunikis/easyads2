<?php
session_start();
require_once ('incl/server.php');
if(isset($_POST['ad_code'])){
	$ad_code=$_POST['ad_code'];
	
	
	$_SESSION['ad_code_validate']=$ad_code;
	echo('<script>location.href = "/edit";</script>');
}
?>