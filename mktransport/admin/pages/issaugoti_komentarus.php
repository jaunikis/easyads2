<?php
session_start();
if(isset($_SESSION['user'])){
	require('../../incl/server.php');

	$komentarai='';
	if(isset($_POST['komentarai'])){
		$komentarai=$_POST['komentarai'];
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$sql="UPDATE mktransport_uzsakymai SET komentarai='$komentarai' WHERE id='$id'";
			sqlconnect($sql);
		}
	}
	echo $komentarai;
}
?>