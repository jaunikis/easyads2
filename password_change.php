<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);
$email=strip_tags($segments[2]);
$code=strip_tags($segments[3]);
?>

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
	var p1 = document.forms["passwords"]["password1"].value;
    var p2 = document.forms["passwords"]["password2"].value;
    if (p1.length<6 || p2.length<6) {
        $("#wrong").text('Password must be at least 6 characters in length.');
		$("#wrong").show();
        return false;
    }
	if (p1!==p2) {
        $("#wrong").text('Passwords not match.');
		$("#wrong").show();
        return false;
    }
}
</script>
								<form name="passwords" onsubmit="return validateForm()" action="/password_change2.php" method="post">
									<div>
										<span><?php echo $email;?><span>
									</div><br>
									<div id="p1" class="form-group">
										<input pattern=".{3,}" onkeyup="check_password1()" id="password1" type="password" name="password1" placeholder="Password" class="form-control border-form" required>
										<span id="p11" class=""></span>
									</div>
								   <div id="p2" class="form-group">
									  <input pattern=".{3,}" onkeyup="check_password2()" id="password2"type="password" name="password2" placeholder="Confirm Password" class="form-control border-form" required>
									  <span id="p22" class=""></span>
								   </div>
								<input style="display:none;" name="code" type="text" value="<?php echo $code;?>">
								<input style="display:none;" name="email" type="text" value="<?php echo $email;?>">
									<div class="form-group">
										<button class="btn btn-block btn-lg btn-primary">Save New Password</button>
									</div>
							
								<div id="wrong" style="display:none" class="alert alert-danger"></div>
								
							
								
							</div>
							<div class="login-footer">
								
									
									</form>
								
								</div>
								<div class="clearfix"></div>
								
								
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- End Login -->
		
<script>
function check_password1(){
	$("#wrong").hide();
		var p1=document.getElementById("password1").value;
		var p2=document.getElementById("password2").value;
		if(p1.length>=6){
			document.getElementById("p1").className = "form-group has-success has-feedback";
			document.getElementById("p11").className = "glyphicon glyphicon-ok form-control-feedback";
		}else{
		document.getElementById("p1").className = "form-group";
		document.getElementById("p11").className = "";
		if(p2.value!==''){check_password2();}
		}
	}
	function check_password2(){
		$("#wrong").hide();
		var p1=document.getElementById("password1").value;
		var p2=document.getElementById("password2").value;
		if(p1.length>=6 && p1==p2){
			document.getElementById("p2").className = "form-group has-success has-feedback";
			document.getElementById("p22").className = "glyphicon glyphicon-ok form-control-feedback";
		}else{
		document.getElementById("p2").className = "form-group";
		document.getElementById("p22").className = "";
		}
	}
	
</script>