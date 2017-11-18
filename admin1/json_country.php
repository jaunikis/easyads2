<?php
if(!isset($_SESSION['email'])){
	header("Location: login.php"); /* Redirect browser */
	exit();
}else{$username=$_SESSION['email'];}
?>


<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="/admin1">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#"><?php echo $page;?></a></li>
	</ul>
	<button onclick="get_country()" class="btn-info">get country</button>
	<table id="GeoResults"></table>
	<hr>
	<h3>php:</h3>

	<?php
//$ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  echo 'Hello visitor from '.$query['country'].', '.$query['city'].'! '.$query['countryCode'];
} else {
  echo 'Unable to get location';
}

	?>
</div>



<script>
	function get_country(){
        $.getJSON("http://ip-api.com/json/213.233.132.170?callback=?", function(data) {
            var table_body = "";
			var country=(data['country']);
			var countryCode=(data['countryCode']);
			var city=(data['city']);
			alert(countryCode+' '+country+' '+city);
            $.each(data, function(k, v) {
                table_body += "<tr><td>" + k + "</td><td><b>" + v + "</b></td></tr>";
            });
            $("#GeoResults").html(table_body);
        });
	}
        </script>