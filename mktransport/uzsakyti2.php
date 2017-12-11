<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Construct the Google verification API request link.
    $params = array();
    $params['secret'] = '6LeSAzwUAAAAACQITkNf7Jk8DjMKE3AMovwXgpjq'; // Secret key
    if (!empty($_POST) && isset($_POST['g-recaptcha-response'])) {
		//echo $_POST['g-recaptcha-response'];
        $params['response'] = urlencode($_POST['g-recaptcha-response']);
    }
    $params['remoteip'] = $_SERVER['REMOTE_ADDR'];

    $params_string = http_build_query($params);
    $requestURL = 'https://www.google.com/recaptcha/api/siteverify?' . $params_string;

    // Get cURL resource
    $curl = curl_init();

    // Set some options
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $requestURL,
    ));

    // Send the request
    $response = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);

    $response = @json_decode($response, true);

    if ($response["success"] == false) {
        header("location:javascript://history.go(-1)");
    } else {
//echo 'data:<br>';
$vardas=$_POST['vardas'];
$tel=$_POST['tel'];
$adresas=$_POST['adresas'];
$emailas=$_POST['emailas'];
$svoris=$_POST['svoris'];
$papildoma=$_POST['papildoma'];
//if($vardas=='' || $tel=='' || $adresas==''){header("location:javascript://history.go(-1)");}
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

	
//echo $device.'<br>';
//echo $vardas.'<br>';
//echo $tel.'<br>';
//echo $adresas.'<br>';
//echo $emailas.'<br>';
//echo $svoris.'<br>';
//echo $papildoma.'<br>';
//echo $salis.'<br>';
//echo $miestas.'<br>';
//echo $device.'<br>';

require('incl/server.php');
$sql="INSERT INTO mktransport_uzsakymai (ip,device,vardas,tel,adresas,emailas,svoris,papildoma,salis,miestas,busena) VALUES ('$ip','$device','$vardas','$tel','$adresas','$emailas','$svoris','$papildoma','$salis','$miestas','Laukiama')";
//$sql="SELECT * FROM mktransport_uzsakymai";
$result=sqlconnect($sql);
//$count = $result->num_rows;
//echo '<h2>'.$result.'</h2>';
if($result>0){
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
	<h1 style="color:tomato;">mk-transport.lt</h1><h5>Uzsakymas:<br>';
	$msg2.=$miestas.' '.$salis.'</h5>'.
	$tdate.' '.$time.'<hr>';
	$msg2.=$msg;
	$msg2.='
	</body>
	</html>
	';
	
		mail($to,$subject,$msg2,$headers);
		//echo 'from: '.$from.'<br>';echo $msg2;
	}
	
$msg='Vardas: '.$vardas.'<br>'.
'Telefonas: '.$tel.'<br>'.
'Adresas: '.$adresas.'<br>'.
'Svoris: '.$svoris.'<br>'.
'Papildoma inf: '.$papildoma;

send_mail($salis,$miestas,$emailas,'mk-transport.lt Užsakymas',$msg);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MK Transport - Užsakymo forma</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
	<link href="css/mano.css" rel="stylesheet">

  </head>

	<body id="page-top">

    <!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color:white;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php#page-top" style="color:tomato;">MK Transport</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php#about"  style="color:black;">Pradžia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#services" style="color:black;">Paslaugos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#apiemus" style="color:black;">Apie Mus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#contact" style="color:black;">Kontaktai</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="color:tomato;">Užsakyti</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	<section class="bg-primary" id="uzsakyti">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h3 class="section-heading text-white">Siuntos užsakymas sėkmingai išsiųstas!</h3>
			<div class="text-faded" style="padding:10px; border: 1px solid lightGrey;">
			<p>Vardas: <?php echo $vardas;?></p>
			<p>Telefonas: <?php echo $tel;?></p>
			<p>Adresas: <?php echo $adresas;?></p>
			</div>
            <p class="text-faded" style="padding-top:15px;">Papildomai skambinti nereikia. Prieš atvažiuojant, mes susisieksime su Jumis.</p>
			<hr class="light my-4">
			<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php#page-top">Grįžti</a>
		  </div>
        </div>
      </div>
    </section>
	
	<?php
	include "footer.php";
	?>
	
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
	
	</body>

<?php
}else{header("Location: index.php");}
	}
}
?>
