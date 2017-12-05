<?php
if(!isset($_SESSION['user'])){header('Location: login.php');}
require('../../incl/server.php');
//$sql="SELECT data FROM mktransport_uzsakymai WHERE date(data)=CURDATE()";
//$result=sqlconnect($sql);
//$orders_today = $result->num_rows;

$sql="SELECT * FROM mktransport_uzsakymai";
$result=sqlconnect($sql);
$orders_total = $result->num_rows;

echo $orders_total;

$uzsakymai='';
if(isset($_GET['uzsakymai'])){$uzsakymai=$_GET['uzsakymai'];}


?>      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $orders_total;?> Uzsakymai</h1>
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
                                        <th>Kontaktai</th>
                                        <th>Svoris</th>
                                        <th>Papildoma inf.</th>
                                        <th>Busena</th>
										<th>Komentarai</th>
                                    </tr>
                                </thead>
                                <tbody>
					<?php
					while ($row = $result->fetch_assoc()) {
						$id=$row['id'];
						$vardas=$row['vardas'];
						$tel=$row['tel'];
						$adresas=$row['adresas'];
						$svoris=$row['svoris'];
						$papildoma=$row['papildoma'];
						$komentarai=$row['komentarai'];
						$busena=$row['busena'];
							$btn='default';
							if($busena=='Patvirtinta'){$btn='success';}
							if($busena=='Atsaukta'){$btn='danger';}
							if($busena=='Laukiama'){$btn='primary';}
						$salis=$row['salis'];
						$miestas=$row['miestas'];
					?>
                                    <tr>
                                        <td data-toggle="tooltip" data-placement="top" title="<?php echo $salis;?>"><?php echo $id;?></td>
                                        <td><?php echo $vardas.'<br>'.$tel.'<br>'.$adresas;?></td>
                                        <td><?php echo $svoris;?> Kg.</td>
                                        <td class="center"><?php echo $papildoma;?></td>
                                        <td class="center">
										<div class="dropdown">
    <button class="btn btn-<?php echo $btn;?> dropdown-toggle btn-xs" type="button" data-toggle="dropdown"><?php echo $busena;?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
										</td>
										<td class="center"><?php echo $komentarai;?></td>
                                    </tr>
					<?php
					}
					?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
