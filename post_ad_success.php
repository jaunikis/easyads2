<!-- Create Post -->
		<section class="create-post">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="login-panel widget top-space">
							<div class="login-body">
							<center>
								<h2 class="post_ad_success">Your ad is posted!</h2>
								<img width="120" src="/images/logo.png">
								<p style="color:steelBlue;">Ad id: <?php echo $_SESSION['ad_id'];?></p>
								<?php
								if(!isset($_SESSION['user_id'])){
									?>
									<h3>Ad code:  <span class="label label-default"><?php echo $_SESSION['ad_code'];?></span></h3>
									<br>
									<p>Keep code for the future. Code will be needed to relist,<a href="/edit"> edit</a>, delete your advert.</p>
									<p>For more convenient way to manage your ads please <a href="/signup">sign up</a>.</p>
								<?php }?>	
									<hr>
									<a href="/items?item=<?php echo $_SESSION['ad_id'];?>" class="btn btn-md btn-info">View Your ad <i class="fa fa-caret-square-o-up"></i></a>
									<a href="/items" class="btn btn-md btn-primary">Show All Ads <i class="fa fa-arrow-right"></i></a>
									<br><br>
									<a href="/post_ad"><button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Post Another Free Ad</button></a>
								
								
							</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Create Post -->