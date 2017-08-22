<?php
session_start();
require_once ('incl/server.php');
require_once ('incl/mail2.php');

//get ip
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

//get timestamp
$date = new DateTime();$timestamp=$date->getTimestamp();

//get email
$email='';
if(isset($_POST['email'])){$email=$_POST['email'];}
if($email==''){header('Location: /forgot');}
$pieces=explode('@',$email);
if(count($pieces)!==2){$_SESSION['msg']='Wrong email';header('Location: /forgot');}
$pieces2=explode('.',$pieces[1]);
if(count($pieces2)!==2){$_SESSION['msg']='Wrong email';header('Location: /forgot');}
if(strlen($pieces2[1])<2){$_SESSION['msg']='Wrong email';header('Location: /forgot');}

//get random code
$x=md5(uniqid(rand(), true));
echo 'pieces count: '.count($pieces).'<br>'.$timestamp.'<br>'.$ip.'<br>'.$email.'<br>'.$x;

//deleting old entries
$sql="DELETE FROM forgot WHERE timestamp<$timestamp-86400";
sqlconnect($sql);

//checking in DB for recent insert
$sql="SELECT * FROM forgot WHERE timestamp>$timestamp-60";
$result=sqlconnect($sql);
$count = $result->num_rows;
echo '<h2>'.$count.'</h2>';
if($count==0){
	$sql="INSERT INTO forgot (code,ip,timestamp,email) VALUES ('$x','$ip','$timestamp','$email')";
	sqlconnect($sql);
	$subject='Password change request';
	$msg='<a href="www.easyads.ie/password_change/'.$email.'/'.$x.'">Change your password</a>';
	echo '<hr>'.$msg;
	send_mail($email,$subject,$msg);
}




// header('Location: /login');
?>