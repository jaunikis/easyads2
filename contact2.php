<?php
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['msg'])){$msg=$_POST['msg'];}

echo $name.'<br>'.$email.'<br>'.$msg.'<hr>';

$msg=wordwrap($msg,70);

$to = "jaunikis@icloud.com";
$subject = "subjektas";
$headers = "From: webmaster@easyads.ie" . "\r\n";

$msg2='Name: '.$name.'<br>'.'Email: '.$email.'<br>'.'Message: '.$msg;

echo $msg2;
//mail($to,$subject,$msg2,$headers);
?>