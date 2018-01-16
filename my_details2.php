<?php
session_start();
require_once ('incl/server.php');
//if(isset($_POST['email'])){$email=$_POST['email'];echo $email.'<br>';}
$email=$_SESSION['email'];
if(isset($_POST['website'])){$website=$_POST['website'];}
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}
if(isset($_POST['location'])){$location=$_POST['location'];}
if(isset($_POST['old_password'])){$old_password=md5($_POST['old_password']);}
if(isset($_POST['password1'])){
	$password1=$_POST['password1'];
	if($password1!=''){
		if(isset($_POST['password2'])){$password2=$_POST['password2'];}
		if($password1==$password2){
			$password=md5($password1);
			if($_SESSION['password']==$old_password || $_SESSION['password']==''){
				$sql="UPDATE users SET password='$password' WHERE email='$email'";
				$result=sqlconnect($sql);
				//echo $result.'<hr>';
			}
		}
	}
}



$sql="UPDATE users SET name='$name', phone='$phone', location='$location', website='$website' WHERE email='$email'";
	$result=sqlconnect($sql);


	$_SESSION['user']=$name;
	$_SESSION['phone']=$phone;
	$_SESSION['location']=$location;
	$_SESSION['website']=$website;
header('Location: /my_details');

//echo 'old_password: '.$old_password.'<br>';
//echo 'password: '.$password.'<br>';
//echo 'password1: '.$password1.'<br>';
//echo 'password2: '.$password2.'<br>';
//echo 'email: '.$email.'<br>';
//echo 'session password: '.$_SESSION['password'].'<br>';


?>