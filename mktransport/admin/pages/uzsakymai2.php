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
										<th>Data</th>
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
						$id=$row['id'];$data=$row['data'];
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
										<td><?php echo $data;?></br><?php echo $salis;?></td>
                                        <td><?php echo $vardas.'<br>'.$tel.'<br>'.$adresas;?></td>
                                        <td><?php echo $svoris;?> Kg.</td>
                                        <td class="center"><?php echo $papildoma;?></td>
                                        <td class="center">
										<div class="dropdown">
    <button class="btn btn-<?php echo $btn;?> dropdown-toggle btn-xs" type="button" data-toggle="dropdown"><?php echo $busena;?>
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
	//alert(txt);
	if(txt=='Patvirtinti'){txt='Patvirtinta';}
	if(txt=='Laukiama'){txt='Laukiama';}
	if(txt=='Atsaukti'){txt='Atsaukta';}
	if(txt=='Istrinti'){txt='Istrinta';}
	
	var x=th.parentNode.parentNode.parentNode;
	var cla=x.className;
	cla=x.innerHTML;
	x.textContent="tekstas";
	alert(cla);
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
