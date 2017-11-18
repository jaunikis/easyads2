<?php
require_once ('incl/server.php');

$sql="SELECT id,ip,country FROM skelbimai LIMIT 100 OFFSET 1200";
$result=sqlconnect($sql);
$count=$result->num_rows;
echo 'results count: '.$count.'<hr>';
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
	$ip=$row['ip']; 
	$country=$row['country'];
	echo $id.' - '.$ip.' - '.$country.' - ';
	//getting country, city
	$country='';//$city='';$countryCode='';
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
	if($query && $query['status'] == 'success') {
	$country=$query['country'];
	//$city=$query['city'];
	//$countryCode=$query['countryCode'];
	}
	$sql="UPDATE skelbimai SET country='$country' WHERE id='$id'";
	$res=sqlconnect($sql);
	echo $country.' - '.$res.'<br>';
	
	
}
?>