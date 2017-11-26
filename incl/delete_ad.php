<?php
session_start();
require_once ('server.php');
$key='';
if(isset($_SESSION['user_id'])){
	if(isset($_POST['ad_id'])){$id=$_POST['ad_id'];}
	if(isset($_POST['key'])){$key=$_POST['key'];}
	//if(isset($_GET['ad_id'])){$id=$_GET['ad_id'];}

	if($key==4461){
		$sql="DELETE FROM skelbimai WHERE id='$id'";
		$result=sqlconnect($sql);
		
		$sql="SELECT * FROM images WHERE ad_id=$id";
		$result=sqlconnect($sql);
		while ($row = $result->fetch_assoc()) {
			$images1file=$row['images1file'];
			$images2file=$row['images2file'];
			//$path = $_SERVER['DOCUMENT_ROOT'];
			//$path .= "/ads_images/";
			unlink('../ads_images/'.$images1file);
			unlink('../ads_images/'.$images2file);
		}
		
		$sql="DELETE FROM images WHERE ad_id='$id'";
		$result=sqlconnect($sql);
		
		//echo $key;
	}
}
echo 'key: '.$key;
?>