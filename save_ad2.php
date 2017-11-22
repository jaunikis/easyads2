<?php
require_once ('incl/server.php');
require_once ('incl/mail.php');
session_start();

$date = new DateTime();$timestamp2=$date->getTimestamp();
$tdate=date("d/m/Y");
$time=date("H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
//getting country, city
	$country='';//$city='';$countryCode='';
	if($ip!='127.0.0.1'){
		$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
		if($query && $query['status'] == 'success') {
			$country=$query['country'];
		}
	}else{$country='Ireland';}
	
$user_id=0;
if(isset($_SESSION['user_id'])){$user_id=$_SESSION['user_id'];}
$cat1='cat1';$cat2='cat2';
$make='';$model='';$year=0;$fuel='';$condition='';
$price='';$location='All';
$images=[''];$cover=0;
$name='';$email='';$phone='';
$transmission='';$bodyType='';$color='';
$description='';
$images1file=[];$images2file=[];

if(isset($_POST['cover'])){$cover=$_POST['cover'];if($cover==''){$cover=0;}}
if(isset($_POST['title'])){$title=strip_tags(addslashes($_POST['title']));}
if(isset($_POST['cat1'])){$cat1=addslashes($_POST['cat1']);}
if(isset($_POST['cat2'])){$cat2=addslashes($_POST['cat2']);}
if(isset($_POST['make'])){$make=$_POST['make'];}
if(isset($_POST['model'])){$model=$_POST['model'];}
if(isset($_POST['year'])){$year=$_POST['year'];if($year==''){$year=0;}}
if(isset($_POST['fuel'])){$fuel=$_POST['fuel'];}
if(isset($_POST['transmission'])){$transmission=$_POST['transmission'];}
if(isset($_POST['bodyType'])){$bodyType=$_POST['bodyType'];}
if(isset($_POST['color'])){$color=$_POST['color'];}
if(isset($_POST['price'])){$price=strip_tags($_POST['price']);if($price==''){$price=0;}}
if(isset($_POST['location'])){$location=$_POST['location'];}
if(isset($_POST['description'])){$description=strip_tags(addslashes($_POST['description']));}
if(isset($_POST['name'])){$name=strip_tags(addslashes($_POST['name']));}
if(isset($_POST['email'])){$email=strip_tags(addslashes($_POST['email']));}
if(isset($_POST['phone'])){$phone=strip_tags(addslashes($_POST['phone']));}
if(isset($_POST['currency'])){$currency=strip_tags($_POST['currency']);}
if(isset($_POST['engine'])){$engine=strip_tags(addslashes($_POST['engine']));}
if(isset($_POST['mileage'])){$mileage=strip_tags(addslashes($_POST['mileage']));}
if(isset($_POST['mileage_type'])){$mileage_type=strip_tags(addslashes($_POST['mileage_type']));}
if(isset($_POST['tax'])){$tax=strip_tags(addslashes($_POST['tax']));}

$cover=intval($cover);
if(isset($_SESSION['images1'])){$images1file=$_SESSION['images1'];}else{array_push($images1file,'');}
if(isset($_SESSION['images2'])){$images2file=$_SESSION['images2'];}else{array_push($images2file,'');}
unset($_SESSION['images1']);
unset($_SESSION['images2']);

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

$ad_code=generateRandomString(6);

$valid_till=intval($timestamp2+(86400*180));

//echo 'timestamp2: '.$timestamp2.'<br>';
//echo 'ip: '.$ip.'<br>';


$active='Active';
//tikriname keiksmazodzius
require_once ('incl/swear.php');


//atimame rand idejimo laika
//$minus=rand(1,43000);$timestamp2=-$minus;

$bump_days=rand(6,30);
//$sql = "INSERT INTO skelbimai (cover,cover1file,ip,user,title,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,price,location,condition2,description,name,email,phone,active,timestamp2) VALUES ('$images1[$cover]','$images1file[$cover]','$ip','$user','$title','$cat1','$cat2','$make','$model','$year','$fuel','$transmission','$bodyType','$color','$price','$location','$condition','$description','$name','$email','$phone','$active',$timestamp2)";
$sql = "INSERT INTO skelbimai (country,engine,mileage,mileage_type,tax,ad_code,cover1file,ip,user_id,title,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,price,currency,location,condition2,description,name,email,phone,active,timestamp2,valid_till,bump_days) VALUES ('$country','$engine','$mileage','$mileage_type','$tax','$ad_code','$images1file[$cover]','$ip','$user_id','$title','$cat1','$cat2','$make','$model','$year','$fuel','$transmission','$bodyType','$color','$price','$currency','$location','$condition','$description','$name','$email','$phone','$active','$timestamp2','$valid_till','$bump_days')";
$ad_id=sqlconnect($sql);
//if($ad_id){echo '<script>alert("namas");</script>';}

//tikriname kada idetas paskutinis skelbimas is to pacio ip
$timestamp3=$timestamp2-120;
$sql="SELECT timestamp2,ip FROM skelbimai WHERE timestamp2>'$timestamp3' AND ip='$ip'";
$result=sqlconnect($sql);
$ad_count = $result->num_rows;
if($ad_count>2){if($active=='Active'){$active='';}$active.='to_many';}

//if country !=Ireland {not active}
if($country!='Ireland'){if($active=='Active'){$active='';}$active.='country';}

	
if($active!='Active'){
	$sql="UPDATE skelbimai SET active='$active' WHERE id='$ad_id'";
	sqlconnect($sql);
	$mail_timestamp=0;
	if(isset($_SESSION['mail_timestamp'])){$mail_timestamp=$_SESSION['mail_timestamp'];}
	if($mail_timestamp<$timestamp2-360){
		$msg='<b>Ad Id:</b> '.$ad_id.'<br>'.'<b>ip:</b> '.$ip.'<br>'.'<b>Country: </b>'.$country.'<br>';
		send_mail('easyads.ie '.$active,$msg);
		$_SESSION['mail_timestamp']=$timestamp2;
	}
}

//echo 'active: '.$active.'<br>';
//echo 'cover: '.$cover;
//echo '<h3>'.$ad_id.'</h3>';

	//save image to db
	//echo count($images1).'   ';
	for($i=0;$i<count($images1file);$i++){
		$x='';
		if($i==$cover){$x='cover';}
		//$img1=$images1[$i];
		//$img2=$images2[$i];
		$file1=$images1file[$i];
		$file2=$images2file[$i];
		if($file1!=''){rename('ads_temp_images/'.$file1,'ads_images/'.$file1);}
		if($file2!=''){rename('ads_temp_images/'.$file2,'ads_images/'.$file2);}
		//$sql = "INSERT INTO images (images1,images2,ad_id,cover,images1file,images2file) VALUES ('$img1','$img2','$ad_id','$x','$file1','$file2')";
		$sql = "INSERT INTO images (ad_id,cover,images1file,images2file) VALUES ('$ad_id','$x','$file1','$file2')";
		$result=sqlconnect($sql);
		//echo $result.'   ';
		$_SESSION['last_id']=$result;
		$_SESSION['ad_id']=$ad_id;
		$_SESSION['ad_code']=$ad_code;
		
		
	}
	
//echo $ad_id;
	//echo 'id:'.$ad_id.' cover:'.$cover;
	//echo '<p><a href="/items">easyads/items</a></p>';
	
	//echo $_SESSION['user_id'];
	
// save user's location, name, phone
if(isset($_SESSION['user_id'])){
	$sql="UPDATE users SET name='$name', phone='$phone', location='$location' WHERE id='$user_id'";
	//echo $sql;
	$res=sqlconnect($sql);
	//echo '<hr>'.$res;
	$_SESSION['user_name']=$name;
	$_SESSION['phone']=$phone;
	$_SESSION['location']=$location;
	
}
$_SESSION['active']=$active;
$_SESSION['email']=$email;
//echo $active;
header("Location: /post_ad/success");
	
	
?>