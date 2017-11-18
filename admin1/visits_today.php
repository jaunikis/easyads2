<?php
if(!isset($_SESSION['email'])){
	header("Location: login.php"); /* Redirect browser */
	exit();
}else{$username=$_SESSION['email'];}

require_once ('../incl/server.php');
$today=date("Y-m-d");
//$sql="SELECT * FROM stats";
//$sql="SELECT * FROM stats WHERE time > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY score DESC";
//$sql="SELECT * FROM stats WHERE WEEKOFYEAR(time)=WEEKOFYEAR(NOW());";
$sql="SELECT * FROM stats WHERE time LIKE '$today%' ORDER BY id DESC";
$result=sqlconnect($sql);
?>


<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#"><?php echo str_replace('_',' ',$page);?></a></li>
	</ul>
	
		<table class="table table-striped table-bordered bootstrap-datatable datatable" style="font-size:11px;">
			<thead>
				<tr>
					<th>Id</th>
					<th>Date</th>
					<th>Ip</th>
					<th>Country</th>
					<th>User Id</th>
					<th>Path</th>
					<th>Referer ip</th>
				</tr>
			</thead>   
			<tbody>
			<?php
			while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$ip=$row['ip'];
				$country=$row['country'];
				$time=$row['time'];
				$user_id=$row['user_id'];
				$path=$row['path'];
				$referer=$row['referer'];
			?>
				<tr>
					<td><?php echo $id;?></td>
					<td><?php echo $time;?></td>
					<td><?php echo $ip;?></td>
					<td><?php echo $country;?></td>
					<td><?php echo $user_id;?></td>
					<td><?php echo $path;?></td>
					<td><?php echo $referer;?></td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		OK!

</div>
<!-- end: Content -->