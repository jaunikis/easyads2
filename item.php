<?php
//include('incl/clean_string.php');
//$path=$_SERVER["QUERY_STRING"];
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$segments = explode('?', $actual_link);
//echo $segments[1];
parse_str($segments[1]);
//echo ' item - '.$item;
//$item=$_GET['item'];echo $item;
//session_start();
//$item=$_SESSION['last_id'];
$user_email='';
if(isset($_SESSION['email'])){$user_email=$_SESSION['email'];}
//echo 'user: '.$user_email.'<br>';

if($active!='Active' && $user_email!='admin'){exit('<p><center><h3>This advert is not active at the moment.</h3><center></p>');}
	
	$images1=[];
	$images2=[];
	//$images[]=$cover;
	$sql2="SELECT images1file,images2file FROM images WHERE ad_id=$id ORDER BY cover DESC";
	$result2=sqlconnect($sql2);
	while ($row2 = $result2->fetch_assoc()) {
		$images1[]=$row2['images1file'];
		$images2[]=$row2['images2file'];
	}
	//if(count($images)==0){$images[]='/ads_images/no-image.png';}
	//echo count($images);
?>


<!-- Category List -->
      <section class="category-grid">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="listing-filters">
<?php
// include('reklama.php');
?>
                     <div id="similar" class="widget listing-filter-block">
                        <div class="widget-header">
                           <h2>Similar ads</h2>
                        </div>
                        <div class="widget-body">
<?php
$cat2=addslashes($cat2);
			require_once ('incl/server.php');
			$sql="SELECT cat1,id,title,price,currency,cover1file FROM skelbimai WHERE active='Active' AND cat2='$cat2' ORDER BY timestamp2 DESC LIMIT 5";
			$result=sqlconnect($sql);
			while ($row = $result->fetch_assoc()) {
				$id2=$row['id'];
				$title2=$row['title'];
				$cover2=$row['cover1file'];if($cover2==''){$cover2='no-image.png';}
				$price2=$row['price'];
				$currency2=$row['currency'];
				$cat11=$row['cat1'];
?>
						   <div class="similar-ads">
                              <a href="/items<?php if($cat11!=''){echo '/'.clean_string_url($cat11);} if($cat2!=''){echo '/'.clean_string_url($cat2);}?>/<?php echo clean_string_url($title2);?>?item=<?php echo $id2;?>">
                                 <div class="similar-ad-left">
                                    <img class="img-responsive img-center" src="<?php echo '/ads_images/'.$cover2;?>" alt="<?php echo strip_tags($title2);?>">
                                 </div>
                                 <div class="similar-ad-right">
                                    <h4><?php echo strip_tags($title2);?></h4>
							<?php
								$curr2='';
								if($price2!='0'){
									if($currency2=='eur'){$curr2='€ ';}
									if($currency2=='gbp'){$curr2='£ ';}
								}else{$price2='No Price';}
							?>
                                    <p style="color:steelBlue;"><?php echo $curr2.$price2;?></p>
                                 </div>
                                 <div class="clearfix"></div>
                              </a>
                           </div>
<?php
	}
?>
						  
                        </div>
                     </div>
                  </div>
               </div>
			   
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="item single-ads top-space">
                           <div class="item-ads-grid icon-blue">
				<?php
				if($user_email=='admin'){
					$btn='info';
					if($active=='Active'){$btn='success';}
					if($active=='Not Active' || $active=='Not active'){$btn='warning';}
				?>
						   <button id="admin_button" onclick="admin_ad(<?php echo $id;?>,this);" class="admin_button btn btn-<?php echo $btn;?> btn-xs"><?php echo $active;?></button>
				
				<?php
				}
				?>
						   <button id="report_ad_button" onclick="report_ad(<?php echo $id;?>);" class="report_ad_button btn btn-warning btn-xs">Report Ad</button>
						   <div id="report_success" style="display:none;" class="report_ad_button alert alert-success alert-dismissable fade in">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Thank you!</strong> This advert will be reviewed.
						  </div>
                              <div class="item-title">
                                 
                                    <h1><?php echo $title;?></h1>
                                 
                                 <div class="item-meta">
                                    <ul>
                                       <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2);?></li>
                                       <li class="item-cat"><i class="fa fa-book"></i> <a href="/items/<?php echo clean_string_url($cat1);?>" data-placement="top" data-toggle="tooltip" data-original-title="All <?php echo $cat1;?>"><?php echo $cat1;?></a><?php if(substr($cat2,0,3)!='All'){?> , <a href="/items/<?php echo clean_string_url($cat1).'/'.clean_string_url($cat2);?>" data-placement="top" data-toggle="tooltip" data-original-title="All <?php echo $cat2;?>"><?php echo $cat2; ?></a><?php } ?></li>
                                       <li class="item-location"><a href="/items?location=<?php echo $location3;?>" data-placement="top" data-toggle="tooltip" data-original-title="All items in <?php echo $location3;?>"><i class="fa fa-map-marker"></i> <?php echo $location3;?> </a></li>
                                       <li class="item-type"><i class="fa fa-bookmark"></i> <?php echo $condition2;?></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="item-img-grid">
                                 <div class="favourite-icon">
                                    <a style="cursor:pointer;" class="fav-btn" onclick="save_ad(event,this,<?php echo $id;?>)" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Save Ad"><?php echo $saved; ?> <i class="fa fa-heart"></i></a>
                                 </div>
								 
							
		
                                 <div id="sync1" class="carousel">
<?php
$images_length=count($images1);
if($images1[0]==''){$images1[0]='no-image.png';}
for($i=0;$i<$images_length;$i++){
echo '<div class="item"><a onclick="large_photos('.$i.');" style="cursor:zoom-in;"><img itemprop="image" id="a'.$i.'" alt="'.$title.'" src="/ads_images/'.$images1[$i].'" class="img-responsive img-center"></a></div>';
}
?>
                                 </div>
                                 <div id="sync2" class="carousel">
<?php           
								$images_length=count($images1);
								for($i=0;$i<$images_length;$i++){
								echo '<div class="item"><img itemprop="image" alt="'.$title.'" src="/ads_images/'.$images1[$i].'" class="img-responsive img-center"></div>';
                                }
?>
                                 </div>
								 
                              </div>
                              <div class="single-item-meta">
			<?php
				if($cat2=="Cars"||$make!=''){
					if($tax>0){$tax='Tax:'.$tax;}else{$tax='';}
					if($mileage>0){$mileage=$mileage.$mileage_type;}else{$mileage='';}
                    echo '<h4><strong>Specification</strong></h4>';
                        echo '<table class="table table-condensed table-hover">';
                            echo '<tbody>';
                            if($year>0){echo '<tr><td>'.$year.' ';}
							echo $make.' '.$model.' '.$engine.' '.$fuel.' '.$transmission.'<br>'.$mileage.' '.$color.' '.$bodyType.' '.$tax.'</td></tr>';
                            
                            
                                
                            
                            echo '</tbody></table>';
				}
				?>
                                 <h4><strong>Description</strong></h4>
                                 <p>
                                   <?php echo $description;?> 
								</p>
                              </div>
                              <div class="item-footer">
                                 <div class="row">
                                    <div class="col-xs-12 col-md-5">
                                       <span class="item-views"> <i class="fa fa-eye"></i> Ad Views : <b><?php echo $ad_views;?></b></span>
                                    </div>
                                    <div class="col-xs-12 col-md-7 text-right-md">
                                       <div class="share-widget">
                                          <span>Share Ad :</span>
                                          <div class="social-links social-bg pull-right">
                                             <ul>
                                               <!-- <li><a class="fa fa-twitter" target="_blank" href="#"></a></li> -->
                                            
												<li><a class="fa fa-facebook" target="_blank" onclick="share_fb(<?php echo $id;?>)" href="#"></a></li>
                                             <li><a class="fa fa-twitter" target="_blank" href="#"></a></li>
											 <!--   <li><a class="fa fa-google-plus" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-instagram" target="_blank" href="#"></a></li> -->
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
									
                                 </div>
								 <div class="bottom-id">Classified ID: <?php echo $id;?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="price-widget short-widget">
				  <?php
								$curr='';
								if($price!='0'){
									if($currency=='eur'){echo '<i class="fa fa-eur"></i>';}
									if($currency=='gbp'){echo '<i class="fa fa-gbp"></i>';}
								}else{$price='No Price';}
					?>
                     
                     <?php echo $price; ?>
                  </div>
                  <div class="widget user-widget">
                     <div class="widget-body text-center">
                        <img class="user-dp" alt="User Image" src="/images/user3.png">
                        <h2 class="seller-name" style="font-size:14px;">
						<?php
						$name=strip_tags($name);
						$len=strlen($name);
						echo $name;
						//echo substr($name,0,12);
						?>
						</h2>
                        <p class="seller-detail">Location: <strong><?php echo $location;?></strong><br>
                          
                        </p>
                     </div>
                     <div class="widget-footer">
                        <div class="row">
                           <div class="col-sm-12">  
					<?php
					$phone=preg_replace('~[\\\\/:*?"<>| -]~','',$phone);
					$phone=str_replace('+','00',$phone);
					if($phone!=''){
					?>
                              <p><button class="btn btn-primary btn-block"><a style="color:white" href="tel:<?php echo $phone;?>"><i class="fa fa-whatsapp"></i> <?php echo $phone;?></button></a></p>
					<?php
					}
					require_once 'Mobile_Detect.php';
					$detect = new Mobile_Detect;
					// Any mobile device (phones or tablets).
					if ( $detect->isMobile() && $phone!='' && substr($phone,0,2)=='08') {
					?>
					<p><button class="btn btn-primary btn-block"><a style="color:white" href="sms://<?php echo $phone;?>"><i class="fa fa-commenting-o"></i> Send SMS</button></a></p>
					<?php
					}
					?>
						
					<?php
					if($email!=''){
					?>
						<p><button class="btn btn-primary btn-block"><a style="color:white" href="mailto:<?php echo $email;?>"><i class="fa fa-envelope"></i> Send Email</a></button></p>
					<?php
					}
					?>
					
					<?php
					if($www!=''){
						//if(substr($www,0,3)=='www'){$www='http://'.$www;}
						if(substr($www,0,4)!='http'){$www='http://'.$www;}
					?>
						<p><button class="btn btn-primary btn-block"><a style="color:white" href="<?php echo $www;?>"><i class="fa fa-globe"></i> Web Page</a></button></p>
					<?php
					}
					?>
							<!--<button onclick="send_msg('<?php echo $email;?>');" class="btn btn-warning btn-block"><i class="fa fa-envelope"></i> Send Message</button>-->
						
						   
						   </div>
                        </div>
                     </div>
                  </div>
                  <div class="widget listing-filter-block filter-categories">
                     <div class="widget-header">
                        <h2>Safety Tips</h2>
                     </div>
                     <div class="widget-body">
					 <div>
						<a href="/blog/Online-Safety-Tips"><img src="/images/avoid fraud ads.jpg" alt="Avoid fraud ads"></a>
					</div>
					<hr>
					
                        <ul class="trends">
						<?php
						if($cat2=='Cars'){
						?>
							<li><i class="fa fa-check" aria-hidden="true"></i> Don't view a car in the rain, in poor light or at night</li>
							<li><i class="fa fa-check" aria-hidden="true"></i> Ask about service history</li>
							<li><i class="fa fa-check" aria-hidden="true"></i> Test drive</li>
							<li><i class="fa fa-check" aria-hidden="true"></i> Look carefully</li>
							<li><i class="fa fa-check" aria-hidden="true"></i> Don't be pressured into buying</li>
							<li><i class="fa fa-check" aria-hidden="true"></i> Have the Car Inspected</li>
							<hr>
                           <li><a href="http://www.citizensinformation.ie/en/consumer_affairs/motoring/advice_on_buying_a_used_car_in_ireland.html"><i class="fa fa-fw fa-key"></i> Buying a used car</a></li>
							<li><a href="http://www.mywheels.ie/buying-privately-top-5-tips/"><i class="fa fa-fw fa-key"></i> 5 Tips Buying used car</a></li>
						<?php
						echo '<hr>';
						}
						?>
						<li><a href="https://info.wombatsecurity.com/blog/ransomware-and-phishing-attacks-why-anti-virus-software-cant-save-you">Why antivirus software can't save you</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Category List -->
	  
	  <div id="myModal" class="modal">
		<div id="m_content" class="modal-content">
			<span class="close2" style="z-index:101">&times;</span>
			<h2 id="m_title" class="m_title"><?php echo $title;?></h2>
			<h2 id="m_number" class="m_number">1/6</h2>
			<a style="z-index: 14;" id="left" class="left carousel-control">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a style="z-index: 14;" id="right" class="right carousel-control">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
	  </div>
	  
	<div id="send_msg_modal" class="modal">
		<div id="send_msg_content" class="report_ad_content">
			<span onclick="uzdaryti();" class="close_report">&times;</span>
			<p>send message</p>
			<form>
				<p><input></p>
				<p><button type="button" id="send_msg2" class="btn btn-warning">Send</button></p>
			</form>
		</div>
	</div>
	
	
	<div id="report_ad_modal" class="modal">
		<div id="report_ad_content" class="report_ad_content">
			<span onclick="uzdaryti();" class="close_report">&times;</span>
			<p>Please select report reason.</p>
			<form>
				<input id="report_id" name="report_id" style="display:none"></input>
				<p><select name="reason" id="reason" class="form-control border-form">
					<option value="0" disabled selected style="display: none;">Please choose</option>
					<option>Wrong phone number</option>
					<option>Inappropriate content</option>
					<option>Item sold</option>
					<option onselect="alert('namas');">Other</option>
				</select></p>
				<p id="reason2" style="display:none">Please fill the reason: <input id="reason22" class="reason_input" type="text" name="reason2"></input></p>
				<p><button type="button" id="report_ad_button2" class="btn btn-warning">Report</button></p>
			</form>
		</div>
	</div>
	 
	  <img id="wait" style="display:none;" class="waitas" src='/images/loading3.gif'/>

<script src="/js/admin_ad.js"></script>
 <script> 
//$("#send_msg_modal").click(function(){send_msg_modal.style.display="none";});
 function send_msg(email){
	//alert(email);
	send_msg_modal.style.display = "block";
}
 
 
 function share_fb(ad_id){
	event.preventDefault();
	//alert(ad_id);

  window.fbAsyncInit = function() {
    FB.init({
      appId            : '113602379360573',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
   
   
 var title=document.title;

	
document.location.href = 'https://www.facebook.com/dialog/share?app_id=113602379360573&display=popup&&href=http%3A%2F%2Feasyads.ie%2Fitems?item='+ad_id+'&redirect_uri=http%3A%2F%2Feasyads.ie%2Fitems?item='+ad_id;	
//	FB.ui({
//	  method: 'share',
//	  display: 'popup',
//	  mobile_iframe: true,
//	  href: 'http://easyads.ie/items?item='+ad_id,
//	}, function(response){});


//FB.ui({
//  method: 'share',
//  mobile_iframe: true,
//  quote: 'quote namas..',
//  href: 'http://easyads.ie/share.php?page=facebook&title=2008%20Audi%20a4%202.0TDi&location=Cavan&id=597',
//}, function(response){});


   FB.AppEvents.logPageView();
  };


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
} //function share_fb

  
  
  
//var report_ad_modal=document.getElementById('report_ad_modal');

function uzdaryti(){
	$("#report_ad_modal").hide();
	$("#send_msg_modal").hide();
	//report_ad_modal.style.display="none";
	//send_msg_modal.style.display="none";
}
$('#reason').change(function(){
        if(this.value=='Other'){
			$("#reason2").show();
		}
});
$("#report_ad_button2").click(function(){
	var reason=$("#reason").val();
	var reason2=$("#reason22").val();
	var id='<?php echo $id;?>';
	if(reason==null){return}
	//alert(reason);
	$.ajax({
		type: "POST",
		data: {id:id,reason:reason,reason2:reason2},
		url: "/incl/report_ad.php",
		success: function(msg){
			//$("#wait").hide();
			//$("#darken").hide();
			//alert(msg);
			$("#report_ad_button2").hide();
			$("#report_ad_button").hide();
			$("#report_success").show();
			//setTimeout('', 2000);
			report_ad_modal.style.display = "none";
			//window.location = "/items?item="+msg;
			//document.getElementById("forma").submit();
		}
	});
});
	
function report_ad(id){
	//alert(id);
	$("#report_id").val(id);
	//var report_ad_button=document.getElementById('report_ad_button');
	//var report_ad_success=document.getElementById('report_ad_success');
	report_ad_modal.style.display = "block";
}

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close2")[0];
var m_content=document.getElementById("m_content");
var m_title=document.getElementById("m_title");

var x=0;
m_images=[];
//alert($("#a3").length);
while($("#a"+x).length>0){
	//alert(x);
	var tt=$("#a"+x).attr('src');
	var ttt=tt.substring(0,36)+'-large.jpg';
	//alert(ttt);
	m_images.push(ttt);
	x++;
}




function large_photos(th){
	//alert(th);
	x=th;
	x_len=m_images.length;
	modal.style.display = "block";
	$("#m_number").text(x+1+'/'+x_len);
	add_image(x);
}

$("#open_modal").click(function(){
	//alert('preview');
	x=0;
	x_len=m_images.length;
	modal.style.display = "block";
	$("#m_number").text(x+1+'/'+x_len);
	add_image(x);
});

function add_image(x){
	var tt=m_images[x];
	var mo_img=document.createElement('img');
	mo_img.id='mo_img_'+x;
	mo_img.className="m_image";
	mo_img.src=tt;
	mo_img.onload=function(){
		var width=mo_img.width;
		var height=mo_img.height;
		var ratio=width/height;
		if(width>screen.width-100){mo_img.width=screen.width-100;}
		if(height>screen.height-150){mo_img.width=(screen.height-180)*ratio;}
		m_content.appendChild(mo_img);
		$("#mo_img_"+x).animate({opacity: 1});
    
	}//m_img.onload
}

function go_left(){
	if(x_len>1){
		$("#mo_img_"+x).animate({
		  //left: "-=980",
		  opacity: 0
		},function(){
			$("#mo_img_"+x).remove();
			x--;if(x<0){x=x_len-1;}
		});
		var x2=x-1;if(x2<0){x2=x_len-1;}
		$("#m_number").text(x2+1+'/'+x_len);
		add_image(x2);
	}
}

function go_right(){
	if(x_len>1){
		$("#mo_img_"+x).animate({
		  //left: "+=980",
		  opacity: 0
		},function(){
			$("#mo_img_"+x).remove();
			x++;if(x>(x_len-1)){x=0;}
		});
		var x2=x+1;if(x2>(x_len-1)){x2=0;}
		$("#m_number").text(x2+1+'/'+x_len);
		add_image(x2);
	}
}

$("#left").click(function(){
	//alert('l');
	go_left();
});

$("#right").click(function(){
	//alert('r');
	go_right();
});

$("body").keydown(function(e) {
  if(e.keyCode == 37) { // left
    go_left();
  }
  else if(e.keyCode == 39) { // right
    go_right();
  }
});

span.onclick = function() {
    modal.style.display = "none";
	$("#mo_img_"+x).remove();
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
		$("#mo_img_"+x).remove();
    }
	if (event.target == report_ad_modal) {
        report_ad_modal.style.display = "none";
    }
	if (event.target == send_msg_modal) {
        send_msg_modal.style.display = "none";
    }
}

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
}

function save_ad(event,a,id){
		$("#wait").center();
		$("#wait").show();
	var wait=document.getElementById("wait");
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
				var saved=this.responseText;
				//if(saved="already saved"){alert("Already saved in your saved ads list.";}
				a.innerHTML=saved+' <i class="fa fa-heart"></i>';
				wait.style.display="none";
				//$("#wait").hide();
		   }
        };
		
		var yy = event.clientY;
		var top = $(window).scrollTop();
		//alert(top);
		var y=top+yy-6;
		wait.style.top=y+"px";
		wait.style.display="block";
        xmlhttp.open("GET", "/incl/save_ad.php?id=" + id, true);
        xmlhttp.send();
		
		
	
	//alert(id);
	
}
</script>