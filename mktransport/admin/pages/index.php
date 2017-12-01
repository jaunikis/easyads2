<?php
session_start();
if(!isset($_SESSION['user'])){header('Location: login.php');}else
	{

	require('head_index.php');
	require('nav.php');
	require('dashboard.php');
	require('footer.php');
	}
?>