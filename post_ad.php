<title>Post Free Ad</title>

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$segments = explode('?', $actual_link);
if(count($segments)>1){parse_str($segments[1]);}

if(isset($_SESSION['images1'])){unset($_SESSION['images1']);}
if(isset($_SESSION['images2'])){unset($_SESSION['images2']);}

if(!isset($_SESSION['user'])){
	//echo '<h2>nera user</h2>';
	$_SESSION['link']='/post';
	//header('Location: /login');
	//echo('<script>location.href = "/login";</script>');
	}
$string = file_get_contents("categories-list.txt");
$json = json_decode($string, true);
?>
		<!-- Create Post -->
		<section class="create-post">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="login-panel widget top-space">
							<div class="login-body">
								<form id="forma" action="/save_ad2.php" method="POST" class="row">
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Title <span class="required">*</span></label>
										<div class="col-sm-9">
											<input name="title" value= "<?php if(isset($title)){echo $title;}?>" id="title" type="text" placeholder="What are you selling e.g. Apple iPhone SE 2017" required="required" class="form-control1 border-form">
											<p style="Display:none;">Suggestions: <span id="txtHint"></span></p>	
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Category <span class="required">*</span></label>
										<div class="col-sm-9">
											<select name="cat1" id="cat1" class="form-control1 border-form">
												<option selected >Please Choose</option>
			<?php
				for($i=0;$i<count($json['cat1']);$i++){
					echo '<option ';
					//if($json['cat1'][$i]==$cat1){echo 'selected';}
				echo '>'.$json['cat1'][$i].'</option>';
				}
            ?>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="cat22" style="display:none">
										<label class="col-sm-3 control-label">Sub Category </label>
										<div class="col-sm-9">
											<select name="cat2" id="cat2" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="cat33" style="display:none">
										<label class="col-sm-3 control-label">Make </label>
										<div class="col-sm-9">
											<select name="make" id="cat3" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>	
											</select>
										</div>
									</div>
									
									<div class="form-group" id="cat44" style="display:none">
										<label class="col-sm-3 control-label">Model </label>
										<div class="col-sm-9">
											<select name="model" id="cat4" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>	
											</select>
										</div>
									</div>
								<div id="cars1" style="display:none">	
									<div class="form-group" id="year1">
										<label class="col-sm-3 control-label">Year of manufacture </label>
										<div class="col-sm-9">
											<select name="year" id="year" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												
<?php
echo '<option>other</option>';
//$ynow=date("Y");
for($i=date("Y")-20;$i<date("Y")+1;$i++){
	echo '<option ';
	if(isset($year)){if($i==$year){echo 'selected';}}
	echo '>'.$i.'</option>';
}
?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Mileage</label>
										<div class="col-sm-9">
											<div class="input-group">
												<input value="<?php if(isset($mileage)){echo $mileage;}?>" id="mileage" name="mileage" type="number" placeholder="e.g. 85000" class="form-control1 border-form">
												<select id="mileage_type" name="mileage_type"  class="form-control1 form-control1-cur border-form">
													<option selected>Mi</option>
													<option>Km</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="form-group" id="engine1">
										<label class="col-sm-3 control-label">Engine </label>
										<div class="col-sm-9">
											<input value="<?php if(isset($engine)){echo $engine;}?>" name="engine" id="engine" type="text" placeholder="e.g. 1.6" class="form-control1 border-form">
										</div>
									</div>
									
									<div class="form-group" id="fuel1">
										<label class="col-sm-3 control-label">Fuel </label>
										<div class="col-sm-9">
											<select name="fuel" id="fuel" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if(isset($fuel)){if($fuel=='Diesel'){echo 'selected';}}?>>Diesel</option>
												<option <?php if(isset($fuel)){if($fuel=='Petrol'){echo 'selected';}}?>>Petrol</option>
												<option <?php if(isset($fuel)){if($fuel=='Electric'){echo 'selected';}}?>>Electric</option>
												<option <?php if(isset($fuel)){if($fuel=='Hybrid'){echo 'selected';}}?>>Hybrid</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="transmission1">
										<label class="col-sm-3 control-label">Transmission </label>
										<div class="col-sm-9">
											<select name="transmission" id="transmission" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if(isset($trans)){if($trans=='Manual'){echo 'selected';}}?>>Manual</option>
												<option <?php if(isset($trans)){if($trans=='Automatic'){echo 'selected';}}?>>Automatic</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="bodyType1">
										<label class="col-sm-3 control-label">Body Type </label>
										<div class="col-sm-9">
											<select name="bodyType" id="bodyType" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if(isset($body)){if($body=='Cabriolet'){echo 'selected';}}?>>Cabriolet</option>
												<option <?php if(isset($body)){if($body=='Coupe'){echo 'selected';}}?>>Coupe</option>
												<option <?php if(isset($body)){if($body=='Saloon'){echo 'selected';}}?>>Saloon</option>
												<option <?php if(isset($body)){if($body=='Hatchback'){echo 'selected';}}?>>Hatchback</option>
												<option <?php if(isset($body)){if($body=='Estate'){echo 'selected';}}?>>Estate</option>
												<option <?php if(isset($body)){if($body=='MPV'){echo 'selected';}}?>>MPV</option>
												<option <?php if(isset($body)){if($body=='SUV'){echo 'selected';}}?>>SUV</option>
												<option <?php if(isset($body)){if($body=='Van'){echo 'selected';}}?>>Van</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="color1">
										<label class="col-sm-3 control-label">Color </label>
										<div class="col-sm-9">
											<select name="color" id="color" class="form-control1 border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if(isset($color)){if($color=='Black'){echo 'selected';}} ?>>Black</option>
													<option>White</option>
													<option>Silver</option>
													<option>Grey</option>
													<option>Red</option>
													<option>Blue</option>
													<option>Brown</option>
													<option>Maroon</option>
													<option>Tan</option>
													<option>Yellow</option>
													<option>Orange</option>
													<option>Beige</option>
													<option>Green</option>
													<option>Purple</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="tax1">
										<label class="col-sm-3 control-label">Tax </label>
										<div class="col-sm-9">
											<input value="<?php if(isset($tax)){echo $tax;}?>" name="tax" id="tax" type="number" class="form-control1 border-form">
										</div>
									</div>
									
								</div>	<!-- cars1 -->
									<div style="display:none" class="form-group" id="condition">
										<label class="col-sm-3 control-label">Condition <span class="required">*</span></label>
										<div class="col-sm-9">	
											<div class="radio radio-info radio-inline">
												<input type="radio" id="inlineRadio2" value="used" name="condition" checked="">
												<label for="inlineRadio2"> Used </label>
											</div>
											<div class="radio radio-info radio-inline">
												<input type="radio" id="inlineRadio1" value="new" name="condition">
												<label for="inlineRadio1"> Brand New </label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Price <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="input-group">
												<input value="<?php if(isset($price)){echo $price;}?>" id="price" name="price" type="number" placeholder="e.g. 999" class="form-control1 border-form">
												<select id="currency" name="currency"  class="form-control1 form-control1-cur border-form">
												<option value="eur" selected="">€</option>
												<option value="gbp">£</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Add Photos</label>
										<div class="col-sm-9">
											<input id="inputFile" type="file" onchange="resize(this)" class="filestyle" accept="image/jpeg, image/png" multiple />
											<span class="help-block"></span>
											
										</div>
									</div>
									
			<!-- adding images --> 							
			
	<div id="images-div" class="images-div">
		<div class="img-div">
			<div id="inputFile" onclick="$('#inputFile').click();" class="mygt mygt-center"><span class="symb">+</span></div>
		</div>
	</div>
			
			<div id="images2">
			</div>
		
		
			
									<div class="form-group">
										<label class="col-sm-3 control-label">Location</label>
										<div class="col-sm-9">
										
											<select id="location" name="location" class="form-control1 border-form">
			<?php
			$loc='All locations';
			if(isset($location)){$loc=$location;}
			?>
												<option selected=""><?php echo $loc;?></option>
			  <?php
				$location='';
				if(isset($_SESSION['location'])){$location=$_SESSION['location'];}
			  
				for($i=0;$i<count($json["locations"]);$i++){
					echo '<option ';
					if($json["locations"][$i]==$location){echo 'selected';}
					echo'>'.$json["locations"][$i].'</option>';
				}
				
            ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Description <span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea style="line-height: 110%" rows="10" id="description" name="description" value="description1" placeholder="Include the brand, model, age and any included accessories." class="form-control border-form"><?php if(isset($description)){echo $description;}?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Name</label>
										<div class="col-sm-9">
											<input id="name" name="name" type="text" value="<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?>" class="form-control1 border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Email (optional)</label>
										<div class="col-sm-9">
											<input id="email" name="email" type="text" placeholder="yourEmail@email.com" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" class="form-control1 border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Website (optional)</label>
										<div class="col-sm-9">
											<input id="www" name="www" type="text" placeholder="www.yourWebsite.com" value="<?php if(isset($_SESSION['website'])){echo $_SESSION['website'];} ?>" class="form-control1 border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Phone number <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="input-group">
												<input onkeyup="phone_change(this.value);" id="phone" name="phone" type="text" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}elseif(isset($phone)){echo $phone;} ?>" class="form-control1 border-form numbers-only">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<input id="cover" name="cover" style="display:none"></input>
											<button id="preview" type="button" class="btn btn-primary"><i class="fa fa-table"></i> Preview</button>
											<button tabindex="1" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Create ad</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Create Post -->
		
<div id="myModal" class="modal">

  <!-- Modal content -->
  
	
	             <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="item single-ads top-space">
                           <div class="item-ads-grid icon-blue">
                              <div class="item-title">
                                 <span class="close">&times;</span>
                                    <h2 id="m_title"></h2>
                                 
                                 <div class="item-meta">
                                    <ul>
                                       <li class="item-date"><i class="fa fa-clock-o"></i> 0 min.</li>
                                       <li class="item-cat"><i class="fa fa-book"></i> <a id="m_cat1" href=""></a> , <a id="m_cat2" href=""></a></li>
                                       <li class="item-location"><a href=""><i class="fa fa-map-marker"></i><span id="m_location"> location </span></a></li>
                                       
                                    </ul>
                                 </div>
                              </div>
                              <div class="item-img-grid">
                                 <div class="favourite-icon">
                                    <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Save Ad">0<i class="fa fa-heart"></i></a>
                                 </div>
								 
							
		
                                 <div id="sync1" class="carousel">

								<div class="item"><img id="m_img" class="img-responsive img-center"></div>

                                 </div>
                                 <div id="sync2" class="carousel">

								<div class="item"><img class="img-responsive img-center"></div>
                                 </div>
								 
                              </div>
                              <div class="single-item-meta">
                                 <h4><strong>Specification</strong></h4>
                                 <table class="table table-condensed table-hover">
                                    <tbody>
                                       <tr>
                                          <td>Classified ID</td>
                                          <td></td>
                                       </tr>
                                       
                                       
                                    </tbody>
                                 </table>
                                 <h4><strong>Description</strong></h4>
                                 <p id="m_description"></p>
                              </div>
                              <div class="item-footer">
                                 <div class="row">
                                    <div class="col-xs-12 col-md-5">
                                       <span class="item-views"> <i class="fa fa-eye"></i> Ad Views : <b>0</b></span>
                                    </div>
                                    <div class="col-xs-12 col-md-7 text-right-md">
                                       <div class="share-widget">
                                          <span>Share This Ad :</span>
                                          <div class="social-links social-bg pull-right">
                                             <ul>
                                                <li><a class="fa fa-twitter" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-facebook" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-google-plus" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-instagram" target="_blank" href="#"></a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
							<p style="padding-top:15px;text-align: center;">
							
							<button type="button" class="btn btn-default" id="m_close"><i class="fa fa-close"></i> Close</button>
							</p>
						   </div>
                        </div>
                     </div>
                  </div>
               </div>
			

</div>
		
		<div id="darken" class="darken"></div>
		<img id="wait" class="waitas" src='/images/loading3.gif'/>
		
<script src="/js/ads_categories.js"></script>
<script src="/js/js.js"></script>

<script>
$("input.numbers-only9999").bind({
    keydown: function(e) {
        if (e.shiftKey === true ) {
            if (e.which == 9) {
                return true;
            }
			if (e.which == 107) {
                return true;
            }
            return false;
        }
		if (e.which == 107) {
                return true;
            }
        if (e.which > 57) {
            return false;
        }
        if (e.which==32) {
            return false;
        }
        return true;
    }
});

function phone_change(value){
	//alert(value);
	var n=value.search('tel:');
	//alert(n);
	if(n==0){value2=value.slice(4);$("#phone").val(value2);}
}

cover=0;
nr=0;
nr2=0;

//var tekstas=Math.floor((Math.random() * 999999) + 111111);$("#phone").val(tekstas);
//var tekstas=Math.floor((Math.random() * 260000) + 1);$("#price").val(tekstas);
//var tekstas=Math.random().toString(36).substr(2, 8);$("#title").val(tekstas);
//var tekstas=Math.random().toString(36).substr(2, 15)+' '+Math.random().toString(36).substr(2, 15)+' ';$("#description").val(tekstas);
//var len2=$("#cat1 option").length;var x=Math.floor((Math.random() * (len2-1)) + 2);$("#cat1 option:eq("+x+")").prop('selected', true);

//change_cat1();

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
}

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

$("#preview").click(function(){
	//alert('preview');
	modal.style.display = "block";
	$("#m_title").text($("#title").val());
	$("#m_cat1").text($("#cat1").val());
	$("#m_cat2").text($("#cat2").val());
	$("#m_location").text($("#location").val());
	$("#m_description").text($("#description").val());
	$("#m_img").attr('src',images1[cover]);
	
	$("#sync2").empty();
	for(i=0;i<images1.length;i++){
		var div=document.createElement('div');
		div.className='item';
		div.style.display="inline-block";
		div.innerHTML='<img id="m_img'+i+'" src="'+images1[i]+'" width="75px" class="img-responsive img-center">';
		//$("#m_img").attr('src','test.jpg');
		document.getElementById("sync2").appendChild(div);
	}
});

span.onclick = function() {
    modal.style.display = "none";
}
$("#m_close").click(function(){
	modal.style.display = "none";
});
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function save(){
	$("#darken").show();
	$("#wait").center();
	$("#wait").show();
	//alert(images1[0]);
	var title=$('#title').val();
	var cat1=$('#cat1').val();
	var cat2=$('#cat2').val();
	var cat3=$('#cat3').val();
	var cat4=$('#cat4').val();
	var year=$('#year').val();
	var fuel=$('#fuel').val();
	var transmission=$('#transmission').val();
	var bodyType=$('#bodyType').val();
	var color=$('#color').val();
	var price=$('#price').val();
	var location=$('#location').val();
	var description=$('#description').val();
	var name=$('#name').val();
	var email=$('#email').val();
	var phone=$('#phone').val();
	
	if (typeof cover == 'undefined'){cover=0;} 
	//alert(cover);
	//cover=0;
	$.ajax({
		type: "POST",
		data: {title:title,cover:cover,cat1:cat1,cat2:cat2,cat3:cat3,cat4:cat4,
				year:year,fuel:fuel,transmission:transmission,bodyType:bodyType,
				color:color,price:price,location:location,description:description,
				name:name,email:email,phone:phone,
				images1:images1,images2:images2},
		url: "/save_ad.php",
		success: function(msg){
			$("#wait").hide();
			$("#darken").hide();
			alert(msg);
			//window.location = "/items?item="+msg;
			//document.getElementById("forma").submit();
		}
	});
}



function showHint(str) {
	alert(str);
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
		document.getElementById('cat22').style.display = "none";
		document.getElementById('make3').style.display = "none";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				var response=this.responseText;
				var array = response.split('/');
                //document.getElementById("txtHint").innerHTML = array[0]+'/'+array[1];
				
				if(array[0]=="Cars"){
					document.getElementById("cat1").value="Cars & Motor";
					cat1_parinkimas();
					if(array[1]){
						document.getElementById("make").value=array[1];
						model_parinkimas();
						if(array[2]){
							document.getElementById("model").value=array[2];
						}
					}
				}else{
						document.getElementById('cat22').style.display = "none";
						document.getElementById('make3').style.display = "none";
						document.getElementById('model1').style.display = "none";
						document.getElementById('year1').style.display = "none";
						document.getElementById('cat1').value="0";
						}			
            }
        };
        xmlhttp.open("GET", "/gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}

	
  function delete_img(o,x) {
    
	if(confirm("Do you want to remove image?")){
	//no clue what to put here?
    var p=o.parentNode.parentNode.parentNode.parentNode;
    p.parentNode.removeChild(p);
	//siunciam i php image istrinimui is session
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //		alert(this.responseText);
            }
        };
		
        xmlhttp.open("GET", "/deletefromsession.php?x=" + x, true);
        xmlhttp.send();
	}
    }
	
	
	
</script>	


	<script src="/js/image_resize.js"></script>
<!--	<script src="/js/canvas-to-blob.min.js"></script>
	<script src="/js/resize.js"></script>
	<script src="/js/app.js"></script>		-->

	
		
		
		
		<!-- Filestyle -->
		<script src="/plugins/bootstrap-filestyle/bootstrap-filestyle.js"></script>