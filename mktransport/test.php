<table>
	<tr><th>id</th><th>date</th><th>ip</th><th>country</th><th>city</th><th>device</th></tr>

<?php

require('incl/server.php');
//$sql="SELECT * FROM mktransport_visitors WHERE date(date)=CURDATE() - INTERVAL 1 DAY";
//$sql="SELECT * FROM mktransport_visitors WHERE date(date)<=CURDATE() AND date(date)>CURDATE() - INTERVAL 7 DAY";
$sql="SELECT * FROM mktransport_visitors WHERE date >= NOW() - INTERVAL 40 MINUTE";

$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
	$date=$row['date'];
	$ip=$row['ip'];
	$country=$row['country'];
	$city=$row['city'];
	$device=$row['device'];
?>

	<tr>
		<td width="12%"><?php echo $id;?></td>
		<td width="12%"><?php echo $date;?></td>
		<td width="12%"><?php echo $ip;?></td>
		<td width="12%"><?php echo $country;?></td>
		<td width="12%"><?php echo $city;?></td>
		<td width="12%"><?php echo $device;?></td>
	</tr>

<?php
}
?>
</table>
		