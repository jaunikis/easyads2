<section class="login">
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="login-panel widget">
				<div class="login-body">
					<h1>Frequently Asked Questions</h1>
					<hr>
					
<button class="accordion">How to place an new Ad</button>
<div class="panel">
<br>
	<img src="images/how_to_post_ad.png" alt="How to post Ad"></img>
  <p>Click the green "<a href="post">POST FREE AD</a>" button on top of the page. Fill up the form and press "CREATE AD".</p>
</div>

<button class="accordion">How to Register or Login</button>
<div class="panel">
<br>
  <p>To register as a new user, click on "SIGN UP" which is placed at the top of page on the website and fill in the details in the New User box. You will need to enter a Email and create a password.</p>
  <p>To log in to your account, click "LOG IN" which is placed at the top of page on the website and enter your Email address you used to sign up with and your password. If you have forgotten your password please click "<a href="forgot">Forgot password</a>" and follow the instructions.</p>
</div>

<button class="accordion">How to write a good ad</button>
<div class="panel">
	<br>
  <p><u>Here a few guidelines on how to write a selling ad:</u></p>
  <p><strong>Title:</strong> This is the text that will appear on the search results page as the headline of your ad. This will be the first thing people will see when looking at the list of ads so it needs to be a short description of the your goods or services. </p>
  <p><strong>Category:</strong> Choose the right category, most relevant to the goods you are advertising. Do not choose the most popular category thinking it will be seen more. When it does not having anything to do with that section people will ignore it.</p>
  <img src="images/pick_right_category.png" alt="contacts on advert"></img>
  <p><strong>Price:</strong> Always include the price to avoid getting unnecessary calls asking about the cost of your items or services. If the price is negotiable state this in the description.</p>
  <p><strong>Photos:<strong> It's always a good idea to include photos when posting an advert as buyers are more drawn to adverts with photos. Ensure it is an up-to-date photo so buyers can see the current condition of the item.</p>
  <p><strong>Description:</strong> Describe the goods you are advertising as clearly as possible. As this will increase your chances of a sale. Avoid using ALL CAPITALS as this will annoy people. Use proper sentences with full stops as they are clearer to read but it is a good idea to use lists where appropriate as it is easier for a user to scan through the information.</p>
  <p><strong>Your Contacts:</strong> Ensure to include your telephone number otherwise people will not be able to contact you. Also you can include an email address and or your web page or web page with your product.</p>
  <img src="images/contacts.png" alt="contacts on advert"></img>
  <p>Here is how your contacts appear on your advert.</p>
  <br>
</div>
<p>If you still have question's or want report a bug, feel free to <a href="contact">contact us</a>. We will be more than happy to help You. Thanks.</p>

				</div>
			</div>
		</div>
	</div>
</div>
</section>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>