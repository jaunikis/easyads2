<!-- Google Code for idetas skelbimas Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 860012260;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "zKX1CKGJ63MQ5P2KmgM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/860012260/?label=zKX1CKGJ63MQ5P2KmgM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>



<!-- Create Post success -->
		<section class="create-post">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="login-panel widget top-space">
							<div class="login-body">
							<center>
							<?php
							if($_SESSION['ad_id']==0){
								$msg='<h2 class="post_ad_success">Something went wrong!</h2>';
								$msg.='<p style="color:steelBlue;">Ad is not posted.</p>';
							}else{
								$msg='<h2 class="post_ad_success">Thank you!</h2>';
								if($_SESSION['active']=='Active'){
									$msg.='<h2 class="post_ad_success">Your ad is posted!</h2>';
									}else{
									$msg.='<h2 class="post_ad_success">Your ad is queued for review</h2>';
									$msg.='<p>(It takes few minutes. Thank you for your appreciation.)</p>';
										if($_SESSION['active']=='to_many'){$msg.='<p>To many ads posted in short period of time.<br>(Only 1 ad is allowed in 2 mins.)</p>';}
										if($_SESSION['active']=='swear'){$msg.='<p>Might be inappropriate content detected</p>';}
									}
								
								$msg.='<img width="120" src="/images/logo.png"><p style="color:steelBlue;">Ad id: '.$_SESSION["ad_id"].'</p>';
								
								
								if(!isset($_SESSION['user_id'])){
									$msg.='<h1>Ad code:  <span class="label label-default">'.$_SESSION['ad_code'].'</span></h1>
									<br>
									<p>Keep code for the future. Code will be needed to relist,<a href="http://www.easyads.ie/edit"> edit</a>, delete your advert.</p>
									<p>For more convenient way to manage your ads please <a href="http://www.easyads.ie/signup">sign up</a>.</p>';
								 }	
									$msg.='<hr>
									<a href="http://www.easyads.ie/items?item='.$_SESSION['ad_id'].'" class="btn btn-info">View Your ad <i class="fa fa-caret-square-o-up"></i></a>
									<a href="http://www.easyads.ie/items" class="btn btn-primary">Show All Ads <i class="fa fa-arrow-right"></i></a>
									<br><br>
									<a href="http://www.easyads.ie/post_ad"><button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Post Another Free Ad</button></a>';
							}
							echo $msg;
							//tikriname emaila ir siunciam emaila
							$email=$_SESSION['email'];
							$arr=explode('@',$email);
							if(count($arr)==2){
								$arr2=explode('.',$arr[1]);
								if(count($arr2)==2){
									if(strlen($arr2[1])>1 || strlen($arr2[1])<6){
										//echo $email;
										$to = $email;
										$subject='easyads.ie your ad details';
										$headers = "MIME-Version: 1.0" . "\r\n";
										$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
										$headers .= 'From: <webmaster@easyads.ie>' . "\r\n";
										$msg2='
										<html>
										<head>
										<title>easyads.ie</title>
										</head>
										<body>
										<h1>easyads.ie</h1>
										';
										$msg2.=$msg;
										$msg2.='
										</body>
										</html>
										';
										mail($to,$subject,$msg2,$headers);
									}
								}
							}
								?>
							</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Create Post -->