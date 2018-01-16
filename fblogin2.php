<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		// initialize and setup facebook js sdk
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '113602379360573',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		    FB.getLoginStatus(function(response) {
		    	if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
		    });
		};
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// login with facebook with extra permissions
		function login() {
			FB.login(function(response) {
				if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
			}, {scope: 'email'});
		}
		
		// getting basic user info
		function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,email,id,picture.width(150).height(150)'}, function(response) {
				document.getElementById('status').innerHTML = "<img src='" + response.picture.data.url + "'>";
				document.getElementById('name').innerHTML = "name: "+response.first_name;
				document.getElementById('last name').innerHTML = "last name: "+response.last_name;
				document.getElementById('email').innerHTML = "email: "+response.email;
				document.getElementById('id').innerHTML = "id: "+response.id;
				
				$.post("fb-login2.php",
					{
						secret: '425611',
						id: response.id,
					  first_name: response.first_name,
					  last_name: response.last_name,
					  email: response.email
					},
					function(data,status){
						//alert("Data: " + data + "\nStatus: " + status);
						if(data=='ok'){window.location.replace("/");}
					});
				
			});
		}
	</script>

	<div id="status"></div>
	<div id="id"></div>
	<div id="name"></div>
	<div id="last name"></div>
	<div id="email"></div>
	<button onclick="getInfo()">Get info with picture</button>
	<button onclick="login()" id="login">Login</button>
</body>
</html>