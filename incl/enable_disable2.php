<?php
session_start();
if(isset($_POST['key'])){$key=$_POST['key'];}
if(isset($_POST['ad_id'])){$id=$_POST['ad_id'];}
if(isset($_POST['action'])){$action=$_POST['action'];}
require_once ('server.php');
if($key='4461'){
	if($action=='enable'){
		$sql="UPDATE skelbimai SET active='Active' WHERE id='$id'";
		$result=sqlconnect($sql);
		//$ad_count = $result->num_rows;
		$ad_count='enabled';
	}
	if($action=='disable'){
		$sql="UPDATE skelbimai SET active='Not active' WHERE id='$id'";
		$result=sqlconnect($sql);
		//$ad_count = $result->num_rows;
		$ad_count='disabled';
	}
}
echo $action;
?>