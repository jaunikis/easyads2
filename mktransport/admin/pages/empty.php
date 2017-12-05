<?php
if(!isset($_SESSION['user'])){header('Location: login.php');}
require('../../incl/server.php');
$sql="SELECT data FROM mktransport_uzsakymai WHERE date(data)=CURDATE()";
$result=sqlconnect($sql);
$orders_today = $result->num_rows;

$sql="SELECT id FROM mktransport_uzsakymai";
$result=sqlconnect($sql);
$orders_total = $result->num_rows;

$uzsakymai='';
if(isset($_GET['uzsakymai'])){$uzsakymai=$_GET['uzsakymai'];}


?>      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Uzsakymai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               uzsakymai <?php echo $uzsakymai;?>
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
