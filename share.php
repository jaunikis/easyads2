<script src="/js/jquery-3.2.1.js"></script>
<?php
$page='';
if(isset($_GET['page'])){$page=$_GET['page'];}
$title='';
if(isset($_GET['title'])){$title=$_GET['title'];}
$location='';
if(isset($_GET['location'])){$location=$_GET['location'];}
$id='';
if(isset($_GET['id'])){$id=$_GET['id'];}
//echo $page.'<br>'.$title.'<br>'.$id;
?>
<head>
	<title><?php echo $title.' for sale on easyads'.$location;?></title>
	
	<meta property="og:description" content="Post free ad on easyads.ie">
</head>
<body>
	

  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '113602379360573',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
   
   
 var title=document.title;
$("#share").click(function(){
	FB.ui({
	  method: 'feed',
	  display: 'iframe',
	  link: 'http://easyads.ie/share.php?title='+title,
	}, function(response){});
});

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
  </script>
  <button id="share"> Share </button>
  <img style="display:block" src="/images/fblogo.jpg">
  </body>