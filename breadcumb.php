<!-- Breadcumb -->
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$segments2 = explode('?', $actual_link);
$links=explode('/',$segments2[0]);

?>

		<section class="breadcumb_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div class="breadcumb_section">
							<div class="page_title">
								<h3><?php echo $_SESSION['heading']; ?></h3>
							</div>
							<div class="page_pagination">
								<ul>
									<li><a href="/">Home</a></li>
									<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
									<li>
								<?php
								if(isset($links[4])){echo '<a href="/'.strtolower($_SESSION['heading']).'">'.$_SESSION['heading'].'</a>';}
								else{echo $_SESSION['heading'];}
								?>	
									</li>
							<?php
							
								if(isset($links[4])&&$_SESSION['heading']!='Post your ad'){
									echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
									<li>'.str_replace("-"," ",$links[4]).'</li>';
								}
							?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		