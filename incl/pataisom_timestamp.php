<?php
//pataisome timestamp2 bump skelbimuose
$date = new DateTime();
$current=$date->getTimestamp();
$sql="SELECT id, timestamp2, valid_till, bump_days FROM skelbimai WHERE ($current-timestamp2)>(bump_days*86400) ORDER BY id DESC";
$result=sqlconnect($sql);
$ad_count = $result->num_rows;
//echo 'total: '.$ad_count.'<hr>';
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
	$timestamp2=$row['timestamp2'];
	$valid_till=$row['valid_till'];
	$bump_days=$row['bump_days'];if($bump_days==0){$bump_days=3;}
	$new_timestamp=$current-(($current-$timestamp2)%($bump_days*86400));
	$sql="UPDATE skelbimai SET timestamp2='$new_timestamp' WHERE id='$id'";
	sqlconnect($sql);
}

?>