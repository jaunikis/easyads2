<?php
session_start();
$secret='';
$id='';
$first_name='';
$last_name='';
$email_name='';
$response='';

if(isset($_POST['secret'])){$secret=$_POST['secret'];}
if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['first_name'])){$first_name=$_POST['first_name'];}
if(isset($_POST['last_name'])){$last_name=$_POST['last_name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}

if($secret==='425611'){
	require_once ('incl/server.php');
	$sql="SELECT * FROM users WHERE email='$email'";
	$result=sqlconnect($sql);
	$count = $result->num_rows;
	//echo 'count='.$count.' - ';
	if($count==0){
		$date = new DateTime();
		$timestamp=$date->getTimestamp();
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		$browser=$_SERVER['HTTP_USER_AGENT'];
		$password='';
		
		$sql="INSERT INTO users (email,password,name,active,ip,browser,timestamp) VALUES ('$email','$password','$first_name','yes','$ip','$browser','$timestamp')";
		$res=sqlconnect($sql);
		if($res>=0){
			$_SESSION['user_id']=$res;
			//$_SESSION['phone']=$row['phone'];
			//$_SESSION['registered']=$row['registered'];
			$_SESSION['email']=$email;
			//$_SESSION['photo']=$row['photo'];
			$_SESSION['active']='yes';
			//$_SESSION['location']=$row['location'];
			$_SESSION['saved']='';
			//$_SESSION['photo_blob']=$row['photo_blob'];
			$_SESSION['user_name']=$first_name;
			$response='ok';
		}
	}else{
		while ($row = $result->fetch_assoc()) {
			//iraso i sesija
			$_SESSION['user_id']=$row['id'];
			$_SESSION['phone']=$row['phone'];
			$_SESSION['registered']=$row['registered'];
			$_SESSION['email']=$row['email'];
			$_SESSION['photo']=$row['photo'];
			$_SESSION['active']=$row['active'];
			$_SESSION['location']=$row['location'];
			$_SESSION['saved']=$row['saved'];
			$_SESSION['photo_blob']=$row['photo_blob'];
			$_SESSION['user_name']=$row['name'];
			$_SESSION['website']=$row['website'];
			$response='ok';
		}
	}
}

echo $response;
//echo $id.' '.$secret.' '.$first_name.' '.$last_name;


?>