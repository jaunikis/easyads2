<?php
if(isset($_GET['img'])){$img=$_GET['img'];echo $img;}
if(isset($_GET['key'])){$key=$_GET['key'];}

?>
<hr>
<img src="/ads_images/<?php echo $img;?>"></img>

<?php
unlink('../ads_images/'.$img);
?>