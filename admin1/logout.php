<?php 
session_start();
//setcookie('user', '', time() - 63600);
//unset($_COOKIE["user"]);
if(isset($_SESSION['user_id'])){unset($_SESSION['user_id']);}
if(isset($_SESSION['email'])){unset($_SESSION['email']);}
//if(isset($_SESSION['phone'])){unset($_SESSION['phone']);}
//if(isset($_SESSION['user_name'])){unset($_SESSION['user_name']);}
//if(isset($_SESSION['location'])){unset($_SESSION['location']);}
//echo $_COOKIE['user'];
header('Location: /admin1');
?>