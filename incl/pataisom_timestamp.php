<?php
//pataisome timestamp2 bump skelbimuose
$date = new DateTime();
$current=$date->getTimestamp();
$sql="SELECT id, timestamp, timestamp2, valid_till, bump_days FROM skelbimai WHERE ($current-timestamp2)>(bump_days*86400) ORDER BY id DESC";
$result=sqlconnect($sql);
$ad_count = $result->num_rows;
//echo 'total: '.$ad_count.'<hr>';
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
	$timestamp=$row['timestamp'];//echo $timestamp.' tikras<br>';
	$ad_timestamp=strtotime($timestamp);
	$days=floor(($current-$ad_timestamp)/86400);
	if($days<40){
		$timestamp2=$row['timestamp2'];
		$valid_till=$row['valid_till'];
		$bump_days=$row['bump_days'];if($bump_days==0){$bump_days=3;}
		$new_timestamp=$current-(($current-$timestamp2)%($bump_days*86400));
		$sql="UPDATE skelbimai SET timestamp2='$new_timestamp' WHERE id='$id'";
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