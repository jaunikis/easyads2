<?php
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['password'])){$password=md5($_POST['password']);}
$remember='';
if(isset($_POST['remember'])){$remember=$_POST['remember'];}
//echo $user.' , '.$password;
session_start();

require_once ('incl/server.php');
$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
	$user_email=$row['email'];
	$user_password=$row['password'];
	if($user_email==$email && $user_password==$password){
		//iraso i sesija
		$_SESSION['user_id']=$row['id'];
		//$_SESSION['email']=$user_email;
		//$_SESSION['password']=$password;
		$_SESSION['phone']=$row['phone'];
		$_SESSION['registered']=$row['registered'];
		$_SESSION['email']=$row['email'];
		$_SESSION['photo']=$row['photo'];
		$_SESSION['active']=$row['active'];
		$_SESSION['location']=$row['location'];
		$_SESSION['saved']=$row['saved'];
		$_SESSION['photo_blob']=$row['photo_blob'];
		$_SESSION['user_name']=$row['name'];
		
		if($remember=='on'){setcookie('user', $user, time() + (86400 * 90));} // 86400 = 1 day
		
		if($_SESSION['email']=='admin'){$_SESSION['link']='/items';}
		if(isset($_SESSION['link'])){ 
	 header('Location: '.$_SESSION['link']);
	 }else{
		header('Location: /');
	 }
		exit;
}

}
 //echo md5("as");
 
 header('Location: /login');
	 
	

//echo($_COOKIE['user']);

?>