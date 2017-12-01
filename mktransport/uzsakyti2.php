<?php
echo 'data:<br>';
$vardas=$_POST['vardas'];
$tel=$_POST['tel'];
$adresas=$_POST['adresas'];
$emailas=$_POST['emailas'];
$svoris=$_POST['svoris'];
$papildoma=$_POST['papildoma'];

//get ip
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
 $ip = getRealUserIp();

//getting country, city
$salis='';$miestas='';//$countryCode='';
if($ip!='127.0.0.1'){
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
	if($query && $query['status'] == 'success') {
		$salis=$query['country'];
		$miestas=$query['city'];
	}
}else{$salis='admin';}

//get device
$device='desktop';
require_once 'incl/Mobile_Detect.php';
$detect = new Mobile_Detect;
// Any mobile device (phones or tablets).
if ($detect->isMobile()) {$device='mobile';}
if ($detect->isTablet()) {$device='tablet';}
if ($detect->version('iPhone')) {$device='iPhone';}

	
echo $device.'<br>';
echo $vardas.'<br>';
echo $tel.'<br>';
echo $adresas.'<br>';
echo $emailas.'<br>';
echo $svoris.'<br>';
echo $papildoma.'<br>';
echo $salis.'<br>';
echo $miestas.'<br>';
echo $device.'<br>';

require('incl/server.php');
$sql="INSERT INTO mktransport_uzsakymai (ip,device,vardas,tel,adresas,emailas,svoris,papildoma,salis,miestas,busena) VALUES ('$ip','$device','$vardas','$tel','$adresas','$emailas','$svoris','$papildoma','$salis','$miestas','pending')";
//$sql="SELECT * FROM mktransport_uzsakymai";
$result=sqlconnect($sql);
//$count = $result->num_rows;
echo '<h2>'.$result.'</h2>';

//siunciam maila
function send_mail($salis,$miestas,$from,$subject,$msg){
	if($from==''){$from='info@mk-transport.lt';}
	$to = "jaunikis@icloud.com";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <'.$from.'>' . "\r\n";
	
	$date = new DateTime();$timestamp2=$date->getTimestamp();
	$tdate=date("d/m/Y");
	$time=date("H:i",time()-7200);
	$ip=$_SERVER['REMOTE_ADDR'];
	
	//$msg=wordwrap($msg,70);
	
	$msg2='
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<h1 style="color:tomato;">mk-transport.lt</h1><h5>Uzsakymas:</h5>
	';
	$msg2.='<h4>'.$miestas.' '.$salis.'</h4>'.
	$tdate.' '.$time.'<hr>';
	$msg2.=$msg;
	$msg2.='
	</body>
	</html>
	';
	
		//mail($to,$subject,$msg2,$headers);
		echo 'from: '.$from.'<br>';echo $msg2;
	}
	
$msg='Vardas: '.$vardas.'<br>'.
'Telefonas: '.$tel.'<br>'.
'Adresas: '.$adresas.'<br>'.
'Svoris: '.$svoris.'<br>'.
'Papildoma inf: '.$papildoma;

send_mail($salis,$miestas,$emailas,'subjektas',$msg);
?>
