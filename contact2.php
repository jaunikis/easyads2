<?php
session_start();
require_once ('incl/mail.php');
if(isset($_POST['name'])){$name=strip_tags(addslashes($_POST['name']));}
if(isset($_POST['email'])){$email=strip_tags(addslashes($_POST['email']));}
if(isset($_POST['msg'])){$msg=strip_tags(addslashes($_POST['msg']));}

	
$msg='<b>Name:</b> '.$name.'<br>'.'<b>Email:</b> '.$email.'<br>'.'<b>Message:</b> '.$msg;
	

send_mail('easyads.ie message',$msg);

header("Location: /");
?>