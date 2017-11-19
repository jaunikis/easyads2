<?php
if(!isset($_SESSION['email'])){
	header("Location: login.php"); /* Redirect browser */
	exit();
}else{$username=$_SESSION['email'];}

require_once ('../incl/server.php');
require_once ('../incl/elapsed.php');
$sql="SELECT * FROM skelbimai";
$result=sqlconnect($sql);
?>			
			
			<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="/admin1">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Ads</a></li>
			</ul>

			<!--<div class="row-fluid sortable">-->	
				<!--<div class="box span12">-->
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Ads</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" style="font-size:11px;">
						  <thead>
							  <tr>
								  <!--<th>Img</th>-->
								  <th width="50px">*</th>
								  <th width="1px">Id</th>
								  <th width="1px">Ip</th>
								  <th width="1px">Country</th>
								  <th width="70px">Date</th>
								  <th>Title</th>
								  <th width="70px">category</th>
								  <th width="1px">Status</th>
								  <th width="128px">Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php 
	while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover1file'];if($cover==''){$cover='no-image.png';}
				$price=$row['price'];if($price=='0'){$price='No Price';}
				$location=$row['location'];
				$timestamp=$row['timestamp'];
				$condition2=$row['condition2'];
				$make=$row['make'];
				$model=$row['model'];
				$timestamp=$row['timestamp'];
				$timestamp2=$row['timestamp2'];
				$cat1=$row['cat1'];if($cat1=='Please Choose'){$cat1='';}
				$cat2=$row['cat2'];if($cat2=='Please Choose'){$cat2='';}
				$currency=$row['currency'];
				$ip=$row['ip'];
				$desc=$row['description'];
				$active=$row['active'];
				$country=$row['country'];
				
				$status='';
				if($active=='Active'){$status='success';}
				if($active=='Pending'){$status='warning';}
				if($active=='Banned'){$status='important';}
				
				$date = new DateTime();
				$current=$date->getTimestamp();
				$time=intval(($current-$timestamp2)/60);
				if($time<60){$badge='HOT';}else{$badge='';}
	?>
						    <tr>
								<td><img data-toggle="tooltip" title="<?php echo $price.' '.$currency;?>" src="../ads_images/<?php echo $cover;?>"></td>
								<td><?php echo $id;?></td>
								<td class="center" style="line-height:1.1"><?php echo $ip;?></td>
								<td class="center" style="line-height:1.1"><?php echo $country;?></td>
								<td class="center" style="line-height:1.1"><?php echo $timestamp.'<br>'.elapsed($timestamp2);?><br>user name</td>
								<td class="center" style="line-height:1.1" data-toggle="tooltip" title="<?php echo $desc;?>"><a href="/items?item=<?php echo $id;?>"><?php echo $title;?></a></td>
								<td class="center" style="line-height:1.1"><?php echo $cat1;?><br><?php echo $cat2;?><br><?php echo $make;?> <?php echo $model;?></td>
								<td class="center">
									<span style="cursor:pointer;" onclick="myFunction()" class="label label-<?php echo $status;?>"><?php echo $active;?></span>
								</td>
								<td class="center">
									<a class="btn btn-info" href="/edit?id=<?php echo $id;?>" data-toggle="tooltip" title="Edit Ad">
										<i class="halflings-icon white edit"></i>  
									</a>
									<!--<a class="btn btn-danger" href="#" onclick="ban_ad(<?php echo $id;?>,this)" data-toggle="tooltip" title="Ban Ad and Ip">
										<i class="halflings-icon white ban-circle"></i>  
									</a>-->
									<a class="btn btn-danger" href="" onclick="delete_ad(<?php echo $id;?>,this)" data-toggle="tooltip" title="Delete Ad">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
	<?php
	}
	?>
							
						  </tbody>
					  </table>            
					</div>
				<!--</div><!--/span-->
			
			<!--</div><!--/row-->
			
<script>
function ban_ad(id,th){
	//alert('ban '+id);
	var el=th.parentNode.parentNode;
	el.children[6].innerHTML='<span class="label label-important">Banned</span>';
}

function delete_ad(id,th){
	event.preventDefault();
	
	var wait=document.getElementById("wait");
	//alert(id);
	var r = confirm("Delete the ad? "+id);
	if(r==true){
	var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/incl/delete_ad.php";
		var vars = "ad_id="+id;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				//var return_data = hr.responseText;
				var p=th.parentNode.parentNode;
				p.parentNode.removeChild(p);
				//window.location = "/my_ads";
				wait.style.display="none";
				
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
	}
}
</script>
<br><hr>

<h2>Aligned Dropdown Content</h2>
<p>Use <strong>float: right</strong> on the dropdown class to float the dropdown menu to the right, and <strong>right:0</strong> on the dropdown-content if you want the dropdown content to go from right to left.</p>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><?php echo $active;?></button>
<span onclick="myFunction()" class="label label-<?php echo $status;?>"><?php echo $active;?></span>
  <div onmouseout="mouse_out(this);" id="myDropdown" class="dropdown-content">
    <?php
	$list=['Active','Not Active','Banned','Pending'];
	foreach ($list as $value){
		if($value==$active){continue;}
	?>
	<a href="#home"><?php echo $value;?></a>
	<?php
	}
	?>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction(e) {
	var tempX=event.clientX;
	var tempY=event.clientY;
	//alert (event.clientX);
	$("#myDropdown").css({ 'top': tempY+10, 'left': tempX-12 });
    document.getElementById("myDropdown").classList.toggle("show");
}

function mouse_out(th){
	//alert(th.innerHTML);
	//th.style.display='none';
	//var x = event.clientX, y = event.clientY,
    //ele = document.elementFromPoint(x, y);
	//alert(ele);
	th.classList.toggle("show");
}


</script>

<br><hr><br>
