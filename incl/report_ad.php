<?php
require_once ('server.php');
require_once ('mail.php');
session_start();
$user_id='';
$date = new DateTime();$timestamp2=$date->getTimestamp();

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if(isset($_SESSION['user_id'])){$user_id=$_SESSION['user_id'];}

if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['reason'])){$reason=$_POST['reason'];}
if(isset($_POST['reason2'])){if($_POST['reason2']!=''){
	if($reason=='Other'){$reason='';}
	$reason.=' '.$_POST['reason2'];}}

//to db
$sql = "INSERT INTO reported_ads (ad_id,reason,user,ip,timestamp) VALUES ('$id','$reason','$user_id','$ip','$timestamp2')";
$result=sqlconnect($sql);

//sending mail
$msg='<b>ad_id:</b> '.$id.'<br>'.'<b>reason:</b> '.$reason;
send_mail('easyads.ie ad report',$msg);

//echo $id.' - '.$reason.' - '.$reason2;
?>