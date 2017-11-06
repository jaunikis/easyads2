<!-- Login -->
<?php
$_SESSION['slt']=1;
?>
      <section class="login">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-4">
                  <div class="login-panel widget">
                     <div class="login-body">
								<div>
								<center><img src="/images/logo.png"></center>
								</div>
								<br>
                        <form action="/contact2.php" method="post" onsubmit="return validateForm()">
                           <div id="name" class="form-group">
                              <input required type="text" name="name" placeholder="Name" class="form-control border-form">
						   </div>
						   <div id="email" class="form-group">
                              <input required type="text" name="email" placeholder="Email" class="form-control border-form">
						   </div>
						   <div id="msg" class="form-group">
								<textarea required style="line-height: 110%" rows="6" name="msg" placeholder="Enter your message here." class="form-control border-form"></textarea>
							</div>
							
                           <div class="form-group">
                              <button class="btn btn-block btn-lg btn-primary">Send</button>
                           </div>
                        
                     </div>
                     <div class="login-footer">
                        <div class="checkbox checkbox-primary pull-left">
                           <input id="checkbox2" name="terms" type="checkbox" required>
                           <label for="checkbox2">
                           I Agree with Terms and Conditions
                           </label>
                        </div>
						</form>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </section>
      <!-- End Login -->