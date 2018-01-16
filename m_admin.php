<?php
if(isset($_SESSION['user_id'])){
	if($_SESSION['user_id']!=17){echo('<script>location.href = "/";</script>');}
}else{echo('<script>location.href = "/";</script>');}
?>
<div class="col-sm-9">
	<div class="widget-header">
		<h2>Admin</h2>
	</div>
<?php
$page=1;
//parse vars
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$segments2 = explode('?', $actual_link);
if(isset($segments2[1])){parse_str($segments2[1]);}

if(isset($_GET['page'])){$page=$_GET['page'];}
//echo 'page:  '.$page.'<br>';

$limit=50;
$offset=($page-1)*$limit;
//echo 'offset: '.$offset.'<br>';

require_once ('incl/server.php');
require_once ('incl/elapsed.php');
$sql='SELECT id FROM skelbimai';
$result=sqlconnect($sql);
$ads=$result->num_rows;

$max_page=ceil($ads/$limit);
//echo 'max_page: '.$max_page.'<br>';

$sql="SELECT * FROM skelbimai ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result=sqlconnect($sql);
echo 'Total: '.$ads.' ads';

if($page>1){$previous='';}else{$previous='disabled';}
if($page<$max_page){$next='';}else{$next='disabled';}
?>

<nav aria-label="Page navigation example">
  <ul class="pagination pagination-sm justify-content-center">
    <li class="page-item <?php echo $previous;?>">
      <a class="page-link" <?php if($previous==''){echo 'href="?page='.($page-1).'"';}?> tabindex="-1">Previous</a>
    </li>
	<?php
	$from=$page-5;if($from<1){$from=1;}
	$to=$from+11;if($to>$max_page-1){$to=$max_page;$taskai=false;}else{$taskai=true;}
	for($p=$from;$p<$to;$p++){
	?>
    <li class="page-item <?php if($p==$page){echo 'active';}?>"><a class="page-link" <?php if($p!=$page){echo 'href="?page='.$p;}?>"><?php echo $p;?></a></li>
	<?php
	}
	if($taskai){
	?>
    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
	<?php
	}
	?>
    <li class="page-item <?php if($p==$page){echo 'active';}?>"><a class="page-link" href="?page=<?php echo $p;?>"><?php echo $max_page;?></a></li>
    <li class="page-item <?php echo $next;?>">
      <a class="page-link" <?php if($next==''){echo 'href="?page='.($page+1).'"';}?>>Next</a>
    </li>
  </ul>
</nav>

<?php
while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$ip=$row['ip'];
				$title=$row['title'];
				$cover=$row['cover1file'];
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
				$country=$row['country'];
?>
							
							<div class="remas-admin">  
                            <img class="list-image-admin" src="<?php if($cover==''){echo 'images/no-image-1.png';}else{echo 'ads_images/'.$cover;}?>" alt=""></td>
                                
                        <div class=""><a data-placement="top" data-toggle="tooltip" data-original-title="View Ad" href="/items?item=<?php echo $id; ?>">Id: <?php echo $id;?> (<?php echo $ip.' - '.$country;?>) <strong><?php echo substr($title,0,30);if(strlen($title)>30){echo '...';}?></strong></a>
						|<span class=""><?php echo substr($description, 0, 25);if(strlen($description)>25){echo '...';}?></span>
							<strong>|€<?php echo $price;?></strong>   
                            <span>|<i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></span>|
                            <span><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Views"><i class="fa fa-eye"></i> <?php echo $ad_views;?></span></span> | 
                            <span><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Saved"><i class="fa fa-heart"></i> <?php echo $saved;?></span></span> |    
						</div>
						   
                                
                             <div class="skelbimo-status_admin">
								Status: <?php if($active=='Active'){echo '<b><span style="color:green">'.$active.'</span></b>';}else{echo '<b><span style="color:orange">'.$active.'</span></b>';}?>
								<span> |  </span>
								 <?php if($active=='Active'){echo '<span style="cursor:pointer;" onclick="enable_disable('.$id.',this) "class="label label-warning" title="" data-placement="top" data-toggle="tooltip" data-original-title="Disable">Disable: <i class="fa fa-close"></i></span>';}
										else{echo '<span style="cursor:pointer;" onclick="enable_disable('.$id.',this)" class="label label-success" title="" data-placement="top" data-toggle="tooltip" data-original-title="Enable">Enable: <i class="fa fa-check"></i></span>';
										}
								?>
							<span> | </span>
							<a href="/edit?id=<?php echo $id;?>"><span style="cursor:pointer;" class="label label-primary" title="" data-placement="top" data-toggle="tooltip" data-original-title="Edit Ad">Edit: <i class="fa fa-pencil"></i></span></a>
							<span> | </span>
							<span style="cursor:pointer;" class="label label-danger" onclick="delete_ad(<?php echo $id; ?>,this)" title="" data-placement="top" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash"></i></span>
							
							<span> | </span>
							<span style="cursor:pointer;" class="label label-danger" onclick="ban_ad(<?php echo $id; ?>,this)" title="" data-placement="top" data-toggle="tooltip"  data-original-title="Ban Ad"><i class="fa fa-ban"></i> Ban Ad</span>
							<span style="color:white">.</span>
							
							</div>
							
                                      
                                    
                              
							  
                             </div>
							
<?php
}
?>
                           </tbody>
                        </table>
						
			<nav aria-label="Page navigation example">
  <ul class="pagination pagination-sm justify-content-center">
    <li class="page-item <?php echo $previous;?>">
      <a class="page-link" <?php if($previous==''){echo 'href="?page='.($page-1).'"';}?> tabindex="-1">Previous</a>
    </li>
	<?php
	$from=$page-5;if($from<1){$from=1;}
	$to=$from+11;if($to>$max_page-1){$to=$max_page;$taskai=false;}else{$taskai=true;}
	for($p=$from;$p<$to;$p++){
	?>
    <li class="page-item <?php if($p==$page){echo 'active';}?>"><a class="page-link" <?php if($p!=$page){echo 'href="?page='.$p;}?>"><?php echo $p;?></a></li>
	<?php
	}
	if($taskai){
	?>
    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
	<?php
	}
	?>
    <li class="page-item <?php if($p==$page){echo 'active';}?>"><a class="page-link" href="?page=<?php echo $p;?>"><?php echo $max_page;?></a></li>
    <li class="page-item <?php echo $next;?>">
      <a class="page-link" <?php if($next==''){echo 'href="?page='.($page+1).'"';}?>>Next</a>
    </li>
  </ul>
</nav>
						
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End My Ads -->
	  <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='/images/loading3.gif' width="64" height="64" /><br>Loading..</div>

<script src="/js/my_ads_1.js"></script>
<script>
function ban_ad(id,th){
	$.post("incl/ban_ad.php",
		{
			secret: '425611',
			id: id
		},
		function(data,status){
			var el=th.parentNode;
			if(data==1){
				el.childNodes[1].innerHTML='<b><span style="color:orange">banned</span></b>';
				el.childNodes[5].className="label label-success";
				el.childNodes[5].innerHTML='Enable: <i class="fa fa-check"></i>';
			}
			//alert("Data: " + data + "\nStatus: " + status);
			//if(data=='ok'){window.location.replace("/my_ads");}
		});
	//alert(id);
}
</script>