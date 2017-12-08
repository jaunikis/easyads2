<?php
session_start();
if(isset($_SESSION['user'])){
	require('../../incl/server.php');

	$txt='';
	if(isset($_POST['txt'])){
		$txt=$_POST['txt'];
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$sql="UPDATE mktransport_uzsakymai SET busena='$txt' WHERE id='$id'";
			sqlconnect($sql);
		}
	}
	echo 'id: '.$id.'  txt: '.$txt;
}
?>