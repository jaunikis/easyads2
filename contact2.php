<?php
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['message'])){$message=$_POST['message'];}

echo $name.'<br>'.$email.'<br>'.$message;
?>