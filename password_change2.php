<?php
session_start();
require_once ('incl/server.php');

if(isset($_POST['password1'])){$password1=$_POST['password1'];}
if(isset($_POST['password2'])){$password2=$_POST['password2'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['code'])){$code=$_POST['code'];}
//echo $password1;

//checking for code in forgot
$sql="SELECT email,code FROM forgot WHERE code='$code' AND email='$email'";
$result=sqlconnect($sql);
$count = $result->num_rows;
//echo $count;
if($count==1){
	$password=md5($password1);
	$sql="UPDATE users SET password='$password' WHERE email='$email'";
	$res=sqlconnect($sql);
	if($res==1){
		echo '<h3>Password changed successfully!</h3><p>You can <a href="/login">Login</a> now.</p>';
	}else{header('Location: /');}
}




?>