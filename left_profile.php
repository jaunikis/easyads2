<?php
//if(!isset($_SESSION['user_id'])){$_SESSION['link']='/my_ads';echo('<script>window.location = "/login";</script>');exit;}
if(isset($_SESSION['user_id'])){

$user_id=$_SESSION['user_id'];
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
//my_ads
$sql="SELECT * FROM skelbimai WHERE user_id='$user_id' ORDER BY id DESC";
$result_my_ads=sqlconnect($sql);
$my_ads = $result_my_ads->num_rows;

//saved
$sql="SELECT saved,password FROM users WHERE id='$user_id'";
$result=sqlconnect($sql);
$row = $result->fetch_assoc();
$saved=$row['saved'];
$password=$row['password'];
$_SESSION['password']=$password;

$sql="SELECT * FROM skelbimai WHERE id IN ($saved) ORDER BY id DESC";
//$sql="SELECT * FROM skelbimai WHERE id IN (SELECT saved FROM users WHERE email='as') ORDER BY id DESC";
if($result_favourite=sqlconnect($sql)){
$favourite = $result_favourite->num_rows;
}else{$favourite=0;}
?>

<!-- Settings -->
      <section class="settings">
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <div class="widget profile-widget">
                     <div class="widget-body">
                        <div class="avatar">
                           <a onclick="document.getElementById('iFile').click();" class="btn-icon" title="" data-placement="left" data-toggle="tooltip" data-original-title="Edit">
						   <input id="iFile" type="file" onchange="avatar(this)" class="filestyle55" accept="image/jpeg, image/png" style="display:none;" />
                           <i class="fa fa-camera"></i>
                           </a>
				<?php
					if($_SESSION['photo_blob']==''){echo'<img id="avatar_image" class="profile-dp" alt="User Image" src="/images/user3.png">';
						}else{
						echo'<img id="avatar_image" class="profile-dp" alt="User Image" src="'.$_SESSION['photo_blob'].'">';
					}
                ?>
                           <div class="profile-info">
                              <h2 class="seller-name"><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?></h2>
                              <p class="seller-detail"> Joined : <strong><?php if(isset($_SESSION['registered'])){echo $_SESSION['registered'];}?></strong></p>
                           </div>
                        </div>
                        <div class="list-group">
                           <a class="list-group-item" href="/my_ads">
                           <span class="label label-info"><?php echo $my_ads; ?></span>
                           <i class="fa fa-fw fa-pencil"></i> My Ads
                           </a>
                           <a class="list-group-item" href="/favourite">
                           <span class="label label-success"><?php echo $favourite; ?></span>
                           <i class="fa fa-fw fa-heart"></i> Favourite Ads
                           </a>
                           <a class="list-group-item" href="ad-alerts">
                           <i class="fa fa-fw fa-clock-o"></i> Ad Alerts
                           </a>
                           <a class="list-group-item" href="/my_details">
                           <i class="fa fa-fw fa-gear"></i> My Details
                           </a>
						<?php
						if($_SESSION['email']=='admin'){
						?>
						<a class="list-group-item" href="/admin">
                           <i class="fa fa-fw fa-gear"></i> Admin
                           </a>
						   
						   <a class="list-group-item" href="/admin_ips">
                           <i class="fa fa-fw fa-gear"></i> Admin_ips
                           </a>
						<?php
						}
						?>
                           <a class="list-group-item" href="/logout.php">
                           <i class="fa fa-fw fa-power-off"></i> Log Out</a>
                           </a>
                        </div>
                     <!--   <a href="close-account.html" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Delete Account</a> -->
                     </div>
                  </div>
               </div>
			   <?php
}else{
	?>
	
	<section class="settings">
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <div class="widget profile-widget">
                     <div class="widget-body">
                        <div class="avatar">
                           <a onclick="document.getElementById('iFile').click();" class="btn-icon" title="" data-placement="left" data-toggle="tooltip" data-original-title="Edit">
						   <input id="iFile" type="file" onchange="avatar(this)" class="filestyle55" accept="image/jpeg, image/png" style="display:none;" />
                           <i class="fa fa-camera"></i>
                           </a>
				<img id="avatar_image" class="profile-dp" alt="User Image" src="/images/user3.png">
						
                           <div class="profile-info">
                              
                           </div>
                        </div>
                        <div class="list-group">
                           <a class="list-group-item" href="/login">
                           <i class="fa fa-fw fa-sign-in"></i> Log in</a>
                           <a class="list-group-item" href="/signup">
                           <i class="fa fa-fw fa-user-plus"></i> Sign Up</a>
                           </a>
                        </div>
                       
                     </div>
                  </div>
               </div>
	
<?php
}
?>