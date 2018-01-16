<div class="col-sm-9">
                  
                     <div class="widget-header">
                        <h1>My Ads</h1>
                     </div>
<?php
while ($row = $result_my_ads->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover1file'];if($cover==''){$cover='ads_images/no-image.png';}
				$price=$row['price'];
				$saved=$row['saved'];
				$timestamp=$row['timestamp'];
				$ad_views=$row['ad_views'];
				$make=$row['make'];
				$model=$row['model'];
				$timestamp2=$row['timestamp2'];
				$cat1=$row['cat1'];
				$cat2=$row['cat2'];
				$active=$row['active'];
				$description=$row['description'];
?>
							
							<div class="remas">  
                            <img class="list-image" src="<?php echo 'ads_images/'.$cover; ?>" alt=""></td>
                                
                        <div class=""><a data-placement="top" data-toggle="tooltip" data-original-title="View Ad" href="/items?item=<?php echo $id; ?>"><strong><?php echo $title;?></strong></a>
						
						
						
						
						<div><span class=""><?php echo substr($description, 0, 44); ?>...</span></div>
						
							<div><strong>€<?php echo $price;?></strong></div>
							
                             
                                    
                            <span><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></span> | 
                            <span><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Views"><i class="fa fa-eye"></i> <?php echo $ad_views;?></span></span> | 
                            <span><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Saved"><i class="fa fa-heart"></i> <?php echo $saved;?></span></span> | 
                            
						   
						   </div>
						   
                                
                             <div class="skelbimo-status">
								Status: <?php if($active=='Active'){echo '<b><span style="color:green">'.$active.'</span></b>';}else{echo '<b><span style="color:orange">'.$active.'</span></b>';}?>
								<span> |  </span>
								 <?php 
								if($active=="Active" || $active=="Not active"){
								 if($active=='Active'){echo '<span style="cursor:pointer;" onclick="enable_disable('.$id.',this) "class="label label-warning" title="" data-placement="top" data-toggle="tooltip" data-original-title="Disable">Disable: <i class="fa fa-close"></i></span>';}
										else{echo '<span style="cursor:pointer;" onclick="enable_disable('.$id.',this)" class="label label-success" title="" data-placement="top" data-toggle="tooltip" data-original-title="Enable">Enable: <i class="fa fa-check"></i></span>';
										}
									echo '<span> | </span>';
								}
								?>
							
							<a href="/edit?id=<?php echo $id;?>"><span style="cursor:pointer;" class="label label-primary" title="" data-placement="top" data-toggle="tooltip" data-original-title="Edit Ad">Edit: <i class="fa fa-pencil"></i></span></a>
							<span> | </span>
							<span style="cursor:pointer;" class="label label-danger" onclick="delete_ad(<?php echo $id; ?>,this)" title="" data-placement="top" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash"></i></span>
							<span style="color:white">.</span>
							</div>
							
                                      
                                    
                              
							  
                             </div>
							
<?php
}
?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End My Ads -->
	  <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='/images/loading3.gif' width="64" height="64" /><br>Loading..</div>

<script src="/js/my_ads_1.js"></script>