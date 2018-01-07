      <!-- TrustBox widget - Micro Review Count -->
<div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5a521809b894c90c84c0c2c3" data-style-height="20px" data-style-width="100%" data-theme="light">
<a href="https://uk.trustpilot.com/review/easyads.ie" target="_blank">Trustpilot</a>
</div>
<!-- End TrustBox widget -->
	 
	 <!-- Footer -->
      <footer>
	  
         <section class="footer-Content">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">About</h3>
                        <div class="textwidget">
							<p style="margin-bottom:15px;"> <span style="color:steelBlue;font-size:16px;">Easyads.ie</span> is easy and <strong><a href="post_ad">free</a></strong> classified website.</p>
						   <p>Easyads.ie is all about you. Our aim is to empower every person in Ireland to independently connect with buyers and sellers online. We care about you — and the transactions that bring you closer to your dreams. Want to buy your first car? We’re here for you. Want to sell commercial property to buy your dream home? We’re here for you. Whatever job you’ve got, we promise to get it done.</p>
						 
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                           <li><a href="home">Home</a></li>
                           <li><a href="about">About</a></li>
                           <li><a href="faq">FAQ</a></li>
                           <li><a href="careers">Careers</a></li>
                           <li><a href="pricing">Pricing Plans</a></li>
                           <li><a href="items">Categories</a></li>
                           <li><a href="services">Services</a></li>
                           <li><a href="team">Team</a></li>
                           <li><a href="contact">Contact</a></li>
                           <li><a href="blog">Blog</a></li>
                           <li><a href="faq">Help</a></li>
                           <li><a href="post_ad">Advertise With Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">Categories</h3>
                        <ul class="menu">
						<?php
						if(isset($_SESSION["categ"])){
							$categ=$_SESSION["categ"];
							$cat_count2=$_SESSION["cat_count2"];
							echo '<li><a href="/items/Cars-and-Motor/'.str_replace('&','and',$categ[0]).'"><span>'.$cat_count2[0].'</span> '.$categ[0].'</a></li>';
							for($i=1;$i<count($categ);$i++){
								 echo '<li><a href="/items/'.str_replace(' ','-',str_replace('&','and',$categ[$i])).'"><span>'.$cat_count2[$i].'</span> '.$categ[$i].'</a></li>';
							}
						}
						?>
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		 
         <div class="copyright">
            <div class="container">
               <div class="row">
			   
			<?php 
	$sql="SELECT id FROM stats WHERE path='/' OR path='/items'";
	$result=sqlconnect($sql);
	$tootal = $result->num_rows;
	
	$date = new DateTime();$timestamp=$date->getTimestamp();
	$x=floor($timestamp/86400);
	$x1=$x*86400;
		
	$sql="SELECT id FROM stats WHERE timestamp>'$x1' AND path='/' OR timestamp>'$x1' AND path='/items'";
	$result=sqlconnect($sql);
	$today = $result->num_rows;
	
	
	?>
			   <center>
<p>	   
<!-- TrustBox widget - Review Collector -->
<div class="trustpilot-widget" data-locale="en-GB" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="5a521809b894c90c84c0c2c3" data-style-height="52px" data-style-width="100%">
<a href="https://uk.trustpilot.com/review/easyads.ie" target="_blank">Trustpilot</a>
</div>
<!-- End TrustBox widget -->
</p><br>
			   
			   <p>
			   <div class="badge">Visits today: <?php echo $today;?></div>
			   <div class="badge">Visits tootal: <?php echo $tootal+5653;?></div>
			   </p>
			   <br>
                  <div class="col-md-12">
                     <div class="site-info text-center">
                        <div class="fb-share-button" data-source="/images/logo.png" data-href="http://www.easyads.ie" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
						<br><br>
						<span style="font-size:10px;">All Copyrights Reserved @ 2017 - Made by <a href="#">mvmedia</a></span>
						<br>
						
						
                     </div>
                     
                         
						 
						 <!--	 
						 <div class="fb-share-button" data-href="http://www.easyads.ie" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
						<a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank" class="dribble"><i class="fa fa-dribbble"></i></a>
                        <a href="#" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
						-->
                     
                  </div>
               </div>
	
            </div>
			 
		</center>
         </div>
		 
		 <div class="fb-like" style="position:absolute;padding:16px;" data-share="true" data-width="60" data-show-faces="true"></div>
				
      </footer>
      <!-- End Footer -->
    