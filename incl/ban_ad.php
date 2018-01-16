<?php
if(isset($_POST['secret'])){$secret=$_POST['secret'];}
if(isset($_POST['id'])){$id=$_POST['id'];}

if($secret=='425611'){
	require_once ('server.php');
	$sql="UPDATE skelbimai SET active='banned' WHERE id='$id'";
	$result=sqlconnect($sql);
	echo $result;
}

?>