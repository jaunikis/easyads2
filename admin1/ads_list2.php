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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <!--<th>Img</th>-->
								  <th width="10px">Id</th>
								  <th width="1px">ip</th>
								  <th width="100px">Title</th>
								  <th>Price</th>
								  <th>Phone</th>
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
				
				$date = new DateTime();
				$current=$date->getTimestamp();
				$time=intval(($current-$timestamp2)/60);
				if($time<60){$badge='HOT';}else{$badge='';}
	?>
						    <tr>
								<td><?php echo $id;?></td>
								<td class="center"><?php echo $ip;?></td>
								<td class="center"><?php echo $title;?></td>
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
	<?php
	}
	?>
							<tr>
								<td>1</td>
								<td class="center">212.23.3.1</td>
								<td class="center">For sale</td>
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
							
								<td>2</td>
								<td class="center">32.33.32.5</td>
								<td class="center">Staff on</td>
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
								<td>3</td>
								<td class="center">127.0.0.1</td>
								<td class="center">Audi for sale</td>
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
								<td>4</td>
								<td class="center">26.33.133.240</td>
								<td class="center">sale sale</td>
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
