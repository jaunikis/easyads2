<?php
if(!isset($_SESSION['user'])){header('Location: login.php');}
require('../../incl/server.php');
//$sql="SELECT data FROM mktransport_uzsakymai WHERE date(data)=CURDATE()";
$sql="SELECT data FROM mktransport_uzsakymai WHERE busena='Laukiama'";
$result=sqlconnect($sql);
$orders_new = $result->num_rows;

$sql="SELECT id FROM mktransport_uzsakymai";
$result=sqlconnect($sql);
$orders_total = $result->num_rows;

$sql="SELECT date FROM mktransport_visitors WHERE date(date)=CURDATE()";
$result=sqlconnect($sql);
$visitors_today = $result->num_rows;

$sql="SELECT id FROM mktransport_visitors";
$result=sqlconnect($sql);
$visitors_total = $result->num_rows;
?>      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pagrindinis</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $orders_new;?></div>
                                    <div>Nauji Užsakymai!</div>
                                </div>
                            </div>
                        </div>
                        <a href="uzsakymai.php?status=Laukiama">
                            <div class="panel-footer">
                                <span class="pull-left">Daugiau...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $orders_total;?></div>
                                    <div>Visi Užsakymai!</div>
                                </div>
                            </div>
                        </div>
                        <a href="uzsakymai.php">
                            <div class="panel-footer">
                                <span class="pull-left">Daugiau...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $visitors_today;?></div>
                                    <div>Lankytojai Šiandien!</div>
                                </div>
                            </div>
                        </div>
                        <a href="lankytojai.php?q=today">
                            <div class="panel-footer">
                                <span class="pull-left">Daugiau...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $visitors_total;?></div>
                                    <div>Visi Lankytojai!</div>
                                </div>
                            </div>
                        </div>
                        <a href="lankytojai.php">
                            <div class="panel-footer">
                                <span class="pull-left">Daugiau...</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			<div class="row">
			<div id="wpac-comment"></div>
<script type="text/javascript">
wpac_init = window.wpac_init || [];
wpac_init.push({widget: 'Comment', id: 8510});
(function() {
    if ('WIDGETPACK_LOADED' in window) return;
    WIDGETPACK_LOADED = true;
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = 'https://embed.widgetpack.com/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>
<a href="https://widgetpack.com" class="wpac-cr">Comments System WIDGET PACK</a>
			</div>
			<hr>
			<div class="row">
			<div id="wpac-google-review"></div>
<script type="text/javascript">
wpac_init = window.wpac_init || [];
wpac_init.push({widget: 'GoogleReview', id: 8510, place_id: 'ChIJN1luUg4i50YR8QlDpDmqwbs', view_mode: 'list'});
(function() {
    if ('WIDGETPACK_LOADED' in window) return;
    WIDGETPACK_LOADED = true;
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = 'https://embed.widgetpack.com/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>
			</div>
            
            
        </div>
        <!-- /#page-wrapper -->
