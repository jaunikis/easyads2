<?php
function send_mail($to,$subject,$msg){
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <webmaster@easyads.ie>' . "\r\n";
	$msg2='
	<html>
	<head>
	<title>easyads.ie</title>
	</head>
	<body>
	<h1>easyads.ie</h1>
	';
	$msg2.=$msg;
	$msg2.='
	</body>
	</html>
	';
	mail($to,$subject,$msg2,$headers);
}
?>