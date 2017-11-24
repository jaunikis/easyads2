<?php
//pataisome timestamp2 bump skelbimuose
$date = new DateTime();
$current=$date->getTimestamp();
$sql="SELECT id, timestamp, timestamp2, cat1, valid_till, bump_days FROM skelbimai WHERE ($current-timestamp2)>(bump_days*86400) ORDER BY id DESC";
$result=sqlconnect($sql);
$ad_count = $result->num_rows;
//echo 'total: '.$ad_count.'<hr>';
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
	$cat1=$row['cat1'];
	$timestamp=$row['timestamp'];//echo $timestamp.' tikras<br>';
	$ad_timestamp=strtotime($timestamp);
	$days=floor(($current-$ad_timestamp)/86400);
	$timestamp2=$row['timestamp2'];
	$valid_till=$row['valid_till'];
	$bump_days=$row['bump_days'];if($bump_days==0){$bump_days=1;}
	$new_timestamp=$current-(($current-$timestamp2)%($bump_days*86400));
	if($days<30 || $cat1=='Business'){
		$new_timestamp=$current-(($current-$timestamp2)%($bump_days*86400));
		$bump_days=rand(1,$days);
		$sql="UPDATE skelbimai SET timestamp2='$new_timestamp', bump_days=$bump_days WHERE id='$id'";
		sqlconnect($sql);
	}else{
		$sql="UPDATE skelbimai SET bump_days='99999' WHERE id='$id'";
		sqlconnect($sql);
	}
}

$sql="SELECT * FROM skelbimai WHERE id=150";
$result=sqlconnect($sql);
$row = $result->fetch_assoc();
$timestamp=$row['timestamp'];

//echo 'timestamp: '.$timestamp.'<br>';
//$ad_timestamp=strtotime($timestamp);
//echo 'ad timestamp: '.$ad_timestamp.'<br>';
//echo 'current timestamp: '.$current.'<br>';
//$days=floor(($current-$ad_timestamp)/86400);
//echo 'diference days: '.$days;



?>