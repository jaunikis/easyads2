<!-- Category List -->


<?php
require_once ('incl/server.php');
require_once ('incl/elapsed.php');

			$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			$segments = explode('/', $path);
			
			//parse vars from address bar
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$segments2 = explode('?', $actual_link);
			//echo $segments[1];
			if(isset($segments2[1])){parse_str($segments2[1]);}
			
			//echo  (str_replace("%20"," ",$segments[3]));
			$pMin=0;$pMax=9999999;
			if(isset($priceMin)){if($priceMin!=='No Min'){$pMin=$priceMin;}}
			if(isset($priceMax)){if($priceMax!=='No Max'){$pMax=$priceMax;}}
			
			$yMin=0;$yMax=date("Y");
			if(isset($yearMin)){if($yearMin!=='No Min'){$yMin=$yearMin;}}
			if(isset($yearMax)){if($yearMax!=='No Max'){$pMax=$yearMax;}}
			
			if(!isset($fuel)){$fuel='fuel';}else{if($fuel!=='Any'){$fuel='"'.$fuel.'"';}else{$fuel='fuel';}}
			if(!isset($transmission)){$transmission='transmission';}else{if($transmission!=='Any'){$transmission='"'.$transmission.'"';}else{$transmission='transmission';}}
			if(!isset($bodyType)){$bodyType='bodyType';}else{if($bodyType!=='Any'){$bodyType='"'.$bodyType.'"';}else{$bodyType='bodyType';}}
			if(!isset($color)){$color='color';}else{if($color!=='Any'){$color='"'.$color.'"';}else{$color='color';}}
			
			$cat1='cat1';
			$cat2='cat2'; 
			$make='make';
			$model='model';
			$location='location';
			$search='%';
			if(isset($_SESSION['search'])){$search='%'.$_SESSION['search'].'%';}
			if(isset($_SESSION['s_location'])){$location='"'.$_SESSION['s_location'].'"';}
			if(isset($_SESSION['cat1'])){
				$cat1=$_SESSION['cat1'];
				if($cat1=='Cars'){
					$cat1='"'.'Cars & Motor'.'"';
					$cat2='"'.'Cars'.'"';
				}else{
					$cat1='"'.$_SESSION['cat1'].'"';
				}
			}
			if(isset($segments[2])){if($segments[2]!==''){$cat1='"'.str_replace("-"," ",$segments[2]).'"';}}
			if($cat1=='"Cars"'){$cat1='"Cars & Motor"';$cat2='"Cars"';}
			if(isset($segments[3])){if($segments[3]!==''){$cat2='"'.str_replace("-"," ",$segments[3]).'"';}}
			if(isset($segments[4])){if($segments[4]!==''){$make='"'.str_replace("-"," ",$segments[4]).'"';}}
			if(isset($segments[5])){if($segments[5]!==''){$model='"'.str_replace("-"," ",$segments[5]).'"';}}
			//echo '<h1>'.$search.'</h1>';
			
			$sort='timestamp2 DESC';$sortTxt='Recently Published';
			if(isset($sortBy)){if($sortBy=='priceLow'){$sort='price ASC';$sortTxt='Low Price First';}}
			if(isset($sortBy)){if($sortBy=='priceHigh'){$sort='price DESC';$sortTxt='High Price First';}}
			if(isset($sortBy)){if($sortBy=='recently'){$sort='timestamp2 DESC';$sortTxt='Recently Published';}}
			if(isset($sortBy)){if($sortBy=='mostPopular'){$sort='ad_views DESC';$sortTxt='Most Popular';}}
			
			$sql="SELECT id FROM skelbimai WHERE active='Active' AND cat1=$cat1 AND cat2=$cat2 AND make=$make AND model=$model AND fuel=$fuel AND transmission=$transmission AND bodyType=$bodyType AND color=$color AND location=$location AND (price BETWEEN '$pMin' AND '$pMax') AND (year BETWEEN '$yMin' AND '$yMax') AND(description LIKE '$search' OR title LIKE '$search') ORDER BY $sort ";
			$result=sqlconnect($sql);
			$ad_count = $result->num_rows;
			
			//pagination
			$ads_per_page=15;
			if(!isset($page)){$page=1;}
			$page_max=intval($ad_count/$ads_per_page);
			if($ad_count/$ads_per_page>intval($ad_count/$ads_per_page)){$page_max+=1;}
			if($page_max<1){$page_max=1;}
			if($page>$page_max){echo ' <script> location.replace("?page='.$page_max.'"); </script>';}
			if($page<1){echo ' <script> location.replace("?page=1"); </script>';}
			$db_limit=$ads_per_page;
			$db_start=$page*$ads_per_page-$db_limit;
			
			$sql="SELECT * FROM skelbimai WHERE active='Active' AND cat1=$cat1 AND cat2=$cat2 AND make=$make AND model=$model AND fuel=$fuel AND transmission=$transmission AND bodyType=$bodyType AND color=$color AND location=$location AND (price BETWEEN '$pMin' AND '$pMax') AND (year BETWEEN '$yMin' AND '$yMax') AND(description LIKE '$search' OR title LIKE '$search') ORDER BY $sort LIMIT $db_start,$db_limit";
			$result=sqlconnect($sql);
			
			
?>
      <section class="category-grid">
         <div class="container">
            <div class="row">
          
                  <div class="listing-actions clearfix row">
                     <div class="tags col-xs-6 text-left">
                        <span><?php echo $ad_count; ?> Ads</span>
                        <span onclick="toggle_show()" class="mobile_refine"><i class="fa fa-search" aria-hidden="true"></i></span>
                        
                     </div>
                     <ul class="listing-actions-nav col-xs-6 text-right">
                        
						
                        <li class="dropdown">
                           <a id="sort" aria-expanded="false" href="www.google.ie" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $sortTxt; ?> <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                              <li><a id="sortPriceL" href="#">Low Price First</a></li>
                              <li><a id="sortPriceH" href="#">High Price First</a></li>
                              <li><a id="sortRecently" href="#">Recently Published</a></li>
							  <li><a id="sortMostPopular" href="#">Most Popular</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               
			   </div> <!-- row -->
			   <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="listing-filters">
<?php
include('left_search.php');
?>
 
               </div>
			   </div>
               <div class="col-lg-9 col-md-9 col-sm-9">
                  <div class="row">
                     <div class="col-lg-12a">
                       
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
				
				$date = new DateTime();
				$current=$date->getTimestamp();
				$time=intval(($current-$timestamp2)/60);
				if($time<60){$badge='HOT';}else{$badge='';}
				
				?>
					   <div class="item">
                           <div class="item-ads-grid icon-blue list-view">
                            <?php
							if($badge!=''){
								?>
							  <div class="item-badge-grid label-danger">
                                 <a href=""><?php echo $badge;?></a>
                              </div>
							<?php
							}
							?>
							  
							  <a href="/items?item=<?php echo $id; ?>">
                              <div class="item-img-grid">
                                 <img alt="" src="<?php echo '/ads_images/'.$cover; ?>" class="ad_image img-responsive img-center">
                              </div>
                              <div class="item-title">
                                 
                                    <h2><?php echo strip_tags($title); ?></h2>
                            <?php
								$curr='';
								if($price!='No Price'){
									if($currency=='eur'){$curr='€ ';}
									if($currency=='gbp'){$curr='£ ';}
								}
							?>
                                 <h3><?php echo $curr.$price; ?></h3>
                              </div>
                              <div class="item-meta">
                                 <ul>
                                    <li class="item-date"><i class="fa fa-clock-o"></i><?php echo elapsed($timestamp2); ?>
									 <a href="/items?location=<?php echo $location;?>"><i class="fa fa-map-marker"></i><?php echo $location; ?> </a>
									 <a href="/items/<?php echo str_replace(" ","-",$cat1);?>"><i class="fa fa-book"></i><?php echo $cat1; ?></a> , <a href="/items/<?php echo str_replace(" ","-",$cat1).'/'.str_replace(" ","-",$cat2);?>"><?php echo $cat2; ?></a>
									 </li>
                                    
                                   
                                    
                                 </ul>
                              </div>
							  </a>
                           </div>
                        </div>
			<?php
			}
			?>
					 </div>
                  </div>
		<center>		  


<?php
$minus='';
$minus_link=' href="?page='.($page-1).'"';
if($page<=1){$minus=' disabled';$minus_link='';}

$plus='';
$plus_link=' href="?page='.($page+1).'"';
if($page>=$page_max){$plus=' disabled';$plus_link='';}

?>
		
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
	<li class="page-item<?php echo $minus;?>">
      <a class="page-link"<?php echo $minus_link ?> aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
	$page_start=$page-2;
	
	if($page_start>$page_max-4){$page_start=$page_max-4;}
	if($page_start<1){$page_start=1;}
	for($i=$page_start;$i<=$page_start+4;$i++){
		$x='';$link=' href="?page='.$i.'"';
		if($i==$page){$x=' active';$link='';}
		if($i>$page_max){$x=' disabled';$link='';}
		echo '<li class="page-item'.$x.'"><a class="page-link" '.$link.'">'.$i.'</a></li>';
	}
	?>
    <li class="page-item<?php echo $plus;?>">
      <a class="page-link"<?php echo $plus_link;?> aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</center>
				  
				  
                  
               </div>
            </div>
         </div>
      </section>
      <!-- End Category List -->
	  
<script>
function toggle_show(){
	$("#categories_left").toggle();
}

	$("#sortPriceL").click(function(){
		event.preventDefault();
		$("#sort").html($(this).text()+' <b class="caret"></b>');
		$("#sortBy").val('priceLow');
		$("#refine").submit();
	});
    
	$("#sortPriceH").click(function(){
		event.preventDefault();
		$("#sort").html($(this).text()+' <b class="caret"></b>');
		$("#sortBy").val('priceHigh');
		$("#refine").submit();
	});
	
	$("#sortRecently").click(function(){
		event.preventDefault();
		$("#sort").html($(this).text()+' <b class="caret"></b>');
		$("#refine").submit();
	});
	
	$("#sortMostPopular").click(function(){
		event.preventDefault();
		$("#sortBy").val('mostPopular');
		$("#sort").html($(this).text()+' <b class="caret"></b>');
		$("#refine").submit();
	});
	
	//$("#clear_all").click(function(){
	//	this.parentNode.remove();
	//});

</script>