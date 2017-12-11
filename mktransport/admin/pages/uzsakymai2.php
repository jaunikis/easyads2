<?php
if(!isset($_SESSION['user'])){header('Location: login.php');}
require('../../incl/server.php');
//$sql="SELECT data FROM mktransport_uzsakymai WHERE date(data)=CURDATE()";
//$result=sqlconnect($sql);
//$orders_today = $result->num_rows;

$status="busena NOT LIKE 'Istrinta'";
if(isset($_GET['status'])){$status="busena='".$_GET['status']."'";}

$sql="SELECT * FROM mktransport_uzsakymai WHERE ".$status." ORDER BY id DESC";
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
										<th>Data</th>
                                        <th>Kontaktai</th>
                                        <th>Svoris</th>
                                        <th>Papildoma inf.</th>
                                        <th>Busena</th>
										<th>Mano Komentarai</th>
                                    </tr>
                                </thead>
                                <tbody>
					<?php
					while ($row = $result->fetch_assoc()) {
						$id=$row['id'];$data=$row['data'];
						$vardas=$row['vardas'];
						$tel=$row['tel'];
						$emailas=$row['emailas'];
						$adresas=$row['adresas'];
						$svoris=$row['svoris'];
						$papildoma=$row['papildoma'];
						$komentarai=$row['komentarai'];
						$busena=$row['busena'];
							$btn='default';
							if($busena=='Patvirtinta'){$btn='success';}
							if($busena=='Atsaukta'){$btn='warning';}
							if($busena=='Laukiama'){$btn='primary';}
							if($busena=='Istrinta'){$btn='danger';}
						$salis=$row['salis'];
						$miestas=$row['miestas'];
					?>
                                    <tr>
                                        <td data-toggle="tooltip" data-placement="top" title="<?php echo $salis;?>"><?php echo $id;?></td>
										<td><?php echo $data;?></br><?php echo $salis;?></td>
                                        <td>Vardas: <?php echo $vardas.'<br>Tel: '.$tel.'<br>Email: '.$emailas.'<br>Adresas: '.$adresas;?></td>
                                        <td><?php echo $svoris;?> Kg.</td>
                                        <td class="center"><?php echo $papildoma;?></td>
                                        <td class="center">
										<div class="dropdown">
    <button class="btn btn-<?php echo $btn;?> dropdown-toggle btn-xs" type="button" data-toggle="dropdown"><span><?php echo $busena;?></span>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a onclick="set_busena(<?php echo $id;?>,this)">Patvirtinti</a></li>
      <li><a onclick="set_busena(<?php echo $id;?>,this)">Atsaukti</a></li>
      <li><a onclick="set_busena(<?php echo $id;?>,this)">Laukiama</a></li>
	  <li><a onclick="set_busena(<?php echo $id;?>,this)">Istrinti</a></li>
    </ul>
  </div>
										</td>
										<td class="center" style="position:relative;">
										<?php echo $komentarai;?>
										<button onclick="komentarai(<?php echo $id;?>,this,'<?php echo $komentarai;?>');" class="btn btn-xs"style="position:absolute;bottom:0;right:0;font-size:8px;">Edit..</button>
										</td>
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
		
<script>
function set_busena(id,th){
	var txt=th.textContent;
	var claName='';
	//alert(txt);
	if(txt=='Patvirtinti'){txt='Patvirtinta';claName='success';}
	if(txt=='Laukiama'){txt='Laukiama';claName='primary';}
	if(txt=='Atsaukti'){txt='Atsaukta';claName='warning';}
	if(txt=='Istrinti'){txt='Istrinta';claName='danger';}
	var x=th.parentNode.parentNode.parentNode.children;
	
	$.ajax({
      type: "POST",
      url: "set_busena.php",
      data: { txt: txt, 
			id:id},
      success: function(result) {
        //alert(result);
		x[0].firstChild.textContent=txt;
		x[0].className='dropdown-toggle btn-xs btn btn-'+claName;
      }
    });
	
}

function komentarai(id,th,txt){
	kom_th=th;
	//alert(txt);
	
	$("#koment_id").val(id);
	$("#modal").toggle(500);
	$("#komentarai").val(txt);
	$("#komentarai").focus();
}

function issaugoti_komentarus(komentarai){
	var id=$("#koment_id").val();
	$.ajax({
      type: "POST",
      url: "issaugoti_komentarus.php",
      data: { komentarai: komentarai, 
			id:id},
      success: function(result) {
        //alert(result);
		kom_th.parentNode.firstChild.textContent=result;
      }
    });
	$("#modal").toggle(500);
}
	
function close_modal(){
		$("#modal").toggle(500);
	}

</script>
