<?php
if(!isset($_SESSION['user'])){header('Location: login.php');}
require('../../incl/server.php');
//$sql="SELECT data FROM mktransport_uzsakymai WHERE date(data)=CURDATE()";
//$result=sqlconnect($sql);
//$orders_today = $result->num_rows;

$q='';
if(isset($_GET['q'])){$q=$_GET['q'];}
if($q=='today'){$sql="SELECT * FROM mktransport_visitors WHERE date(date)=CURDATE() ORDER BY id DESC";}else{
	$sql="SELECT * FROM mktransport_visitors ORDER BY id DESC";}
$result=sqlconnect($sql);
$visitors_total = $result->num_rows;

//echo $orders_total;

$q='';
if(isset($_GET['q'])){$q=$_GET['q'];}

?>      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $visitors_total;?> Lankytojai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
										<th>Data</th>
                                        <th>Ip</th>
                                        <th>Šalis</th>
                                        <th>Miestas</th>
                                        <th>Irenginys</th>
                                    </tr>
                                </thead>
                                <tbody>
					<?php
					while ($row = $result->fetch_assoc()) {
						$id=$row['id'];
						$date=$row['date'];
						$ip=$row['ip'];
						$country=$row['country'];
						$device=$row['device'];
						$city=$row['city'];
						
					?>
                                    <tr>
                                        <td><?php echo $id;?></td>
										<td><?php echo $date;?></td>
                                        <td><?php echo $ip;?></td>
                                        <td><?php echo $country;?></td>
                                        <td><?php echo $city;?></td>
                                        <td><?php echo $device;?></td>
                                    </tr>
					<?php
					}
					?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                
                                <p>2017 mvmedia admin control panel</p>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
		
	<div id="modal" class="modal">
	<div class="close-button"><a onclick="close_modal();"><span class="fa fa-times"></span></a></div>
		<h5>Įrašyti komentarus:</h5>
		<input id="koment_id" style="display:none" type="number"></input>
		<p>Komentarai:<br><textarea id="komentarai" name="coment" rows="5" autofocus></textarea></p>
		<button onclick="issaugoti_komentarus($('#komentarai').val())" class="btn btn-primary">Išsaugoti</button>
</div>
		
