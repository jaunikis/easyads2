<!-- Login -->
		<section class="login">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<div class="login-panel widget">
							<div class="login-body">
								<div>
								<center><img src="/images/logo.png"></center>
								</div>
								<div class="login-with-sites">
								<!--	<button class="btn-facebook login-icons btn-lg btn-block"> <i class="fa fa-facebook"></i> Login With Facebook</button>
										<button class="btn-google login-icons btn-lg btn-block"> <i class="fa fa-google"></i> Login With Google</button>  -->
								</div>
								<script>
function validateForm() {
    $("#wrong").hide();
	$("#success").hide();
	var x = document.forms["e_recovery"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        //alert("Not a valid e-mail address");
		$("#wrong").show();
        return false;
    }else{
		$.ajax({
			url: "forgot2.php",
			type: "POST",
			data: {email:x},
			success: function(result){
				//alert(result);
				switch(result){
					case 'too many':
						$("#wrong").text('Only one request in 5 mins. is allowed');
						$("#wrong").show();
						break;
					case 'nera user':
						$("#wrong").text('Email not registered.');
						$("#wrong").show();
						break;
					case '1':
						$("#success").text('Email with password changing link is sent.');
						$("#success").show();
						break;
				}
				
			
		}});
		return false;
	}
	
}
</script>
								<form name="e_recovery" onsubmit="return validateForm()" action="/forgot2.php" method="post">
									<div class="form-group">
										<input onkeyup="$('#wrong').hide();$("#success").hide();" name="email" type="email" placeholder="Email" class="form-control border-form">
									</div>
									
									<div class="form-group">
										<button type="button" onclick="validateForm();" class="btn btn-block btn-lg btn-primary">Recover Password</button>
									</div>
							
								<div id="wrong" style="display:none" class="alert alert-danger">Wrong email address.</div>
								<div id="success" style="display:none" class="alert alert-success"></div>
							
								
							</div>
							<div class="login-footer">
								
									
									</form>
								
								</div>
								<div class="clearfix"></div>
								
								
						</div>
						<p class="text-center">Don't have an account? <a href="/signup"><strong>Signup</strong></a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End Login -->