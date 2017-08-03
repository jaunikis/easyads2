<h2>tst</h2>
<form action="" method="POST">
<p>user : <input name="user" type="input"></p>
<p>password : <input name="password" type="password"></p>
<p>name : <input name="name" type="input"></p>
<hr>
<p>pass : <input name="pass" type="input"></p>
<p><button>enter</button>
</form>
<p><a href="/test/">home</a></p>
<?php
require_once ('server.php');
$user="";
$password="";
$name="";
$pass='';
if(isset($_POST['user'])){$user=strip_tags(addslashes($_POST['user']));}
if(isset($_POST['password'])){$password=strip_tags(addslashes($_POST['password']));}
if(isset($_POST['name'])){$name=strip_tags(addslashes($_POST['name']));}
if(isset($_POST['pass'])){$pass=strip_tags(addslashes($_POST['pass']));echo $pass;}

if($user!=''){
$sql="INSERT INTO testas (user,password,name)VALUES('$user','$password','$name')";
//echo $sql;
$res=sqlconnect($sql);
echo $res;
}

$sql="SELECT * FROM testas WHERE password='$pass' ORDER BY id DESC";
$result=sqlconnect($sql);
echo '<table>';
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
	$user=$row['user'];
	$password=$row['password'];
	$name=$row['name'];
	echo '<tr><td><b>id:</b>'.$id.'</td><td><b>user:</b>'.$user.'</td><td><b>password:</b>'.$password.'</td><td><b>name:</b>'.$name.'</td></tr>';
}	
echo '</table>';

?>