<?php
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
								  <th width="1px">ip</th>
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
				$timestamp2=$row['timestamp2'];
				$cat1=$row['cat1'];if($cat1=='Please Choose'){$cat1='';}
				$cat2=$row['cat2'];if($cat2=='Please Choose'){$cat2='';}
				$currency=$row['currency'];
				$ip=$row['ip'];
				$desc=$row['description'];
				$active=$row['active'];
				
				$status='';
				if($active=='Active'){$status='success';}
				if($active=='Pending'){$status='warning';}
				if($active=='Banned'){$status='danger';}
				
				$date = new DateTime();
				$current=$date->getTimestamp();
				$time=intval(($current-$timestamp2)/60);
				if($time<60){$badge='HOT';}else{$badge='';}
	?>
						    <tr>
								<td><img data-toggle="tooltip" title="<?php echo $price.' '.$currency;?>" src="../ads_images/<?php echo $cover;?>"></td>
								<td><?php echo $id;?></td>
								<td class="center" style="line-height:1.1"><?php echo $ip;?><br>Refferer<br>IRL</td>
								<td class="center" style="line-height:1.1" data-toggle="tooltip" title="<?php echo $desc;?>"><?php echo $title;?></td>
								<td class="center" style="line-height:1.1"><?php echo $cat1;?><br><?php echo $cat2;?><br><?php echo $make;?> <?php echo $model;?></td>
								<td class="center">
									<span class="label label-danger"><?php echo $active;?></span>
								</td>
								<td class="center">
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white ban-circle"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
	<?php
	}
	?>
							<tr>
								<td></td>
								<td>1</td>
								<td class="center">212.23.3.1</td>
								<td class="center">For sale</td>
								<td class="center">category</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
								<td></td>
								<td>2</td>
								<td class="center">32.33.32.5</td>
								<td class="center">Staff on</td>
								<td class="center">category</td>
								<td class="center">
									<span class="label">Inactive</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
								<td></td>
								<td>3</td>
								<td class="center">127.0.0.1</td>
								<td class="center"> 2008 Audi for sale, nice nct vrt tax price €500</td>
								<td class="center">category</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
								<td></td>
								<td>4</td>
								<td class="center">26.33.133.240</td>
								<td class="center">sale sale</td>
								<td class="center">category</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  </tbody>
					  </table>            
					</div>
				<!--</div><!--/span-->
			
			<!--</div><!--/row-->
			
			<div style="line-height:1;color:red;">nanamnmsms sdsd<br>asnajajsd<br>sddsdsdsdsd<br>33234</div>
