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
if($email==''){echo 'email empty';}
$pieces=explode('@',$email);
if(count($pieces)!==2){echo 'false';}
$pieces2=explode('.',$pieces[1]);
if(count($pieces2)!==2){echo 'false';}
if(strlen($pieces2[1])<2){echo 'false';}

//get random code
$x=md5(uniqid(rand(), true));
//echo 'pieces count: '.count($pieces).'<br>'.$timestamp.'<br>'.$ip.'<br>'.$email.'<br>'.$x;

//deleting old entries
$sql="DELETE FROM forgot WHERE timestamp<$timestamp-86400";
sqlconnect($sql);

//checking is email in users db
$sql="SELECT email FROM users WHERE email='$email'";
$result=sqlconnect($sql);
$count = $result->num_rows;
$useris=0;
if($count!==0){
	//checking in DB for recent insert
	$sql="SELECT * FROM forgot WHERE timestamp>$timestamp-20";
	$result=sqlconnect($sql);
	$count = $result->num_rows;
	//echo '<h2>'.$count.'</h2>';
	if($count==0){
		$sql="INSERT INTO forgot (code,ip,timestamp,email) VALUES ('$x','$ip','$timestamp','$email')";
		sqlconnect($sql);
		$subject='Password change request';
		$msg='to change your password, please follow this link: 
		<a href="http://www.easyads.ie/password_change/'.$email.'/'.$x.'">Change your password</a>';
		//echo $msg;
		$send=send_mail($email,$subject,$msg);
		echo $send;
	}else{echo 'too many';}
}else{echo 'nera user';}

// header('Location: /login');
?>