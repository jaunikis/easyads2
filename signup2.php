<?php
require_once ('incl/server.php');
require_once ('incl/mail.php');
$date = new DateTime();$timestamp=$date->getTimestamp();

if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['password1'])){$password1=$_POST['password1'];}
if(isset($_POST['password2'])){$password2=$_POST['password2'];}
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['terms'])){$terms=$_POST['terms'];}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$browser=$_SERVER['HTTP_USER_AGENT'];

/*
echo 'email: '.$email.'<br>';
echo 'password1: '.$password1.'<br>';
echo 'password2: '.$password2.'<br>';
echo 'terms: '.$terms.'<br>';
echo 'ip: '.$ip.'<br>';
echo $browser.'<br>';
*/
$password=md5($password1);

//checking if same ip registered in more than 3 times in 1 hour
$timestamp3=$timestamp-3600;
$sql="SELECT timestamp,ip FROM users WHERE timestamp>'$timestamp3' AND ip='$ip'";
$result=sqlconnect($sql);
$ad_count = $result->num_rows;
//echo 'ip: '.$ip.'<br>';
//echo 'timestamp: '.$timestamp.'<br>';
//echo 'ad_count: '.$ad_count.'<br>';
if($ad_count<3){
	$sql="INSERT INTO users (email,password,name,active,ip,browser,timestamp) VALUES ('$email','$password','$name','yes','$ip','$browser','$timestamp')";
	$res=sqlconnect($sql);
	if($res==0){
		echo "<script>alert('user not created! try again later, can be email already exist, if the problem persist please contact us.');</script>";
		send_mail('easyads.ie signup problem',$ip);
		return;
	}
	session_start();
	$_SESSION['user']=$name;
	$_SESSION['email']=$email;
	$_SESSION['location']='All Locations';
	$_SESSION['user_id']=$res;
			//$_SESSION['phone']=$row['phone'];
			//$_SESSION['registered']=$row['registered'];
			$_SESSION['email']=$email;
			//$_SESSION['photo']=$row['photo'];
			//$_SESSION['active']=$row['active'];
			//$_SESSION['location']=$row['location'];
			//$_SESSION['saved']=$row['saved'];
			$_SESSION['photo_blob']='';
			$_SESSION['user_name']=$name;
}else{
	echo "<script>alert('user not created! try again later, if the problem persist please contact us.');</script>";
	send_mail('easyads.ie signup problem',$ip);
}
	
header('Location: /');

?>