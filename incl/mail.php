<?php
function send_mail($subject,$msg){

	$to = "jaunikis@icloud.com";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <webmaster@easyads.ie>' . "\r\n";
	
	$date = new DateTime();$timestamp2=$date->getTimestamp();
	$tdate=date("d/m/Y");
	$time=date("H:i",time()-7200);
	$ip=$_SERVER['REMOTE_ADDR'];
	$user_id=0;
	if(isset($_SESSION['user_id'])){$user_id=$_SESSION['user_id'];}

	$msg=wordwrap($msg,70);
	
	$msg2='
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<h1>easyads.ie</h1>
	';
	$msg2.=$tdate.' '.$time.'<br>'.$ip.'<br>';
	if($user_id!=0){$msg2.='user_id: '.$user_id.'<br>';}
	
	$msg2.=$msg;
	
	$msg2.='
	</body>
	</html>
	';
	
	//if($_SESSION['slt']==1){
	//	$_SESSION['slt']=0;
		//echo $msg2;
		mail($to,$subject,$msg2,$headers);
	//}
}
?>