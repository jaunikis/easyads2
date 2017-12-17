<?php
$string = file_get_contents("categories-list.txt");
$json = json_decode($string, true);
//$s_location="";
//echo 'loc: '.$location;

$sql="SELECT cat1,cat2 FROM skelbimai";
$result3=sqlconnect($sql);
$cars_count = $result3->num_rows;
while ($row = $result3->fetch_assoc()) {
	$count[]=$row['cat1'];
	$count[]=$row['cat2'];
}
	$occ = array_count_values($count);

	
	$location=str_replace('"', "", $location);
	$cat1=str_replace('"', "", $cat1);
	$cat2=str_replace('"', "", $cat2);
	$cat3=str_replace('"', "", $make);
	$cat4=str_replace('"', "", $model);
	
	//echo '<h1>'.$cat3.'</h1>';
	?>
		 
                    <div id="categories_left" class="widget listing-filter-block filter-categories">
                        <div class="widget-header">
                           <h2>Refine search:</h2>
                        </div>
                        <div class="widget-body">
						
						<div class="form-group">
						<form id="refine">
                        <strong>Category:</strong>
						<select style="margin-bottom:6px;" name="cat1" id="cat1" class="form-control border-form">
						<option selected>All Category</option>
						<option>Cars</option>
			<?php
				for($i=0;$i<count($json['cat1']);$i++){
					echo '<option ';
					if($json['cat1'][$i]==$cat1){echo 'selected';}
				echo '>'.$json['cat1'][$i].'</option>';
				}
            ?>
					<option>Other</option>
					</select>
					
				
					<select id="cat2" style="margin-bottom:6px;<?php if($cat1=='cat1'){echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				echo '<option>All '.$cat1.'</option>';
				for($i=0;$i<count($json[$cat1]);$i++){
					echo '<option ';
					if($json[$cat1][$i]==$cat2){echo 'selected';}
				echo '>'.$json[$cat1][$i].'</option>';
				}
				echo '<option>Other '.$cat1.'</option>';
            ?>
					</select>
					
					<select id="cat3" style="margin-bottom:6px;<?php if(
					$cat2=='Cars' ||
					$cat2=='Breaking & Repairables' ||
					$cat2=='Mobile phones' ||
					$cat2=='Cars' ||
					$cat2=='Laptops' ||
					$cat2=='Laptop Parts' ||
					$cat2=='Furniture'
					){echo 'display:block;';}else{echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				echo '<option>All '.$cat2.'</option>';
				for($i=0;$i<count($json[$cat2]);$i++){
					echo '<option ';
					if($json[$cat2][$i]==$cat3){echo 'selected';}
				echo '>'.$json[$cat2][$i].'</option>';
				}
				echo '<option>Other '.$cat2.'</option>';
            ?>		
					</select>
	<?php
	//echo $cat4.'<br>';
	If($cat3=='Bmw'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Ford'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Honda'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Jaguar'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Mazda'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Mercedes Benz'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Nissan'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Proton'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Saab'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Suzuki'){$cat4=str_replace(' ','-',$cat4);}
	If($cat3=='Toyota'){$cat4=str_replace(' ','-',$cat4);}
	?>
					<select id="cat4" style="margin-bottom:6px;<?php if($cat2=='Cars' && $cat3!=='make'){echo 'display:block;';}else{echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				echo '<option>All '.$cat3.'</option>';
				for($i=0;$i<count($json[$cat3]);$i++){
					echo '<option ';
					if($json[$cat3][$i]==$cat4){echo 'selected';}
				echo '>'.$json[$cat3][$i].'</option>';
				}
				echo '<option>Other '.$cat3.'</option>';
            ?>
					</select>
						
				
				
				<strong>Location:</strong>
						<select style="margin-bottom:6px;" name="location" id="location" class="form-control border-form">
						<option>All Locations</option>
			<?php
				for($i=0;$i<count($json["locations"]);$i++){
					echo '<option ';
					if($json["locations"][$i]==$location){echo 'selected';}
					echo'>'.$json["locations"][$i].'</option>';
				}
            ?>
					</select>
					
			
			<strong style="display:block;">Price range:</strong>
			<select style="margin-bottom:6px; width:48%;display:inline-block;" name="priceMin" id="priceMin" class="form-control border-form">
			<option selected>No Min</option>
			<?php
			if(!isset($priceMin)){$priceMin=0;} if($priceMin=='No Min'){$priceMin=0;}
			if(!isset($priceMax)){$priceMax=300000;} if($priceMax=='No Max'){$priceMax=300000;}
				
				
			for($i=0;$i<count($json["prices"]);$i++){
				echo '<option ';
				if($json["prices"][$i]==$priceMin && $i!==0){echo 'selected';}
				echo'>'.$json["prices"][$i].'</option>';
			}
			
			/*	for($i=1000;$i<=$priceMax;$i+=500){
					if($i>10000){$i+=500;}
					echo '<option ';
					if(isset($priceMin)){if($i==$priceMin && $i!==0){echo 'selected';}}
					echo '>'.$i.'</option>';
				} */
            ?>
			</select>
			
			<select style="margin-bottom:6px; width:48%;display:inline;margin-left:2px;" name="priceMax" id="priceMax" class="form-control border-form">
			<option selected>No Max</option>
			<?php
				
			for($i=0;$i<count($json["prices"]);$i++){
				echo '<option ';
				if($json["prices"][$i]==$priceMax && $json["prices"][$i]!==300000){echo 'selected';}
				echo'>'.$json["prices"][$i].'</option>';
			}	
				
			/*	for($i=$priceMin+500;$i<=20000;$i+=500){
					if($i>10000){$i+=500;}
					echo '<option ';
					if(isset($priceMax)){if($i==$priceMax && $priceMax!==20000){echo 'selected';}}
					echo '>'.$i.'</option>';
				}	*/
            ?>
			</select>
					
		<div id="cars" style="display:none;">	
			<strong style="display:block;">Year:</strong>
			<select style="margin-bottom:6px; width:48%;display:inline-block;" name="yearMin" id="yearMin" class="form-control border-form">
			<option selected>No Min</option>
			<?php
			if(!isset($yearMin)){$yearMin=date("Y")-20;} if($yearMin=='No Min'){$yearMin=date("Y")-20;}
			if(!isset($yearMax)){$yearMax=date("Y");} if($yearMax=='No Max'){$yearMax=date("Y");}
				//$year_min=2006;
				//if(isset($year)){$year_min=$_GET['yearMin'];echo $year_min;}
				for($i=date("Y")-20;$i<=$yearMax;$i++){
					echo '<option ';
					if(isset($yearMin)){if($i==$yearMin && $i!==date("Y")-20){echo 'selected';}}
					echo '>'.$i.'</option>';
				}
            ?>
			</select>
					
			<select style="margin-bottom:6px; width:48%;display:inline;margin-left:2px;" name="yearMax" id="yearMax" class="form-control border-form">
			<option selected>No Max</option>
			<?php
				for($i=$yearMin;$i<=date("Y");$i++){
					echo '<option ';
					if(isset($yearMax)){if($i==$yearMax && $yearMax!==date("Y")){echo 'selected';}}
					echo '>'.$i.'</option>';
				}
            ?>
			</select>
			<div id="fuel">
				<strong style="display:block;">Fuel:</strong>
				<select style="margin-bottom:6px;" name="fuel" id="fuel" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($fuel)){if($fuel=='"Diesel"'){echo 'selected';}} ?>>Diesel</option>
					<option <?php if(isset($fuel)){if($fuel=='"Petrol"'){echo 'selected';}} ?>>Petrol</option>
					<option <?php if(isset($fuel)){if($fuel=='"Electric"'){echo 'selected';}} ?>>Electric</option>
					<option <?php if(isset($fuel)){if($fuel=='"Hybrid"'){echo 'selected';}} ?>>Hybrid</option>
				</select>
			</div>
			
			<div id="transmission">
				<strong style="display:block;">Transmission:</strong>
				<select style="margin-bottom:6px;" name="transmission" id="transmission" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($transmission)){if($transmission=='"Manual"'){echo 'selected';}} ?>>Manual</option>
					<option <?php if(isset($transmission)){if($transmission=='"Automatic"'){echo 'selected';}} ?>>Automatic</option>
				</select>
			</div>
			
			<div id="bodytype">
				<strong style="display:block;">Body Type:</strong>
				<select style="margin-bottom:6px;" name="bodyType" id="bodyType" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Cabriolet"'){echo 'selected';}} ?>>Cabriolet</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Coupe"'){echo 'selected';}} ?>>Coupe</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Saloon"'){echo 'selected';}} ?>>Saloon</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Hatchback"'){echo 'selected';}} ?>>Hatchback</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Estate"'){echo 'selected';}} ?>>Estate</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"MPV"'){echo 'selected';}} ?>>MPV</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"SUV"'){echo 'selected';}} ?>>SUV</option>
				</select>
			</div>
			
			<div id="color">
				<strong style="display:block;">Color:</strong>
				<select style="margin-bottom:6px;" name="color" id="color" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($color)){if($color=='"Black"'){echo 'selected';}} ?>>Black</option>
					<option <?php if(isset($color)){if($color=='"White"'){echo 'selected';}} ?>>White</option>
					<option <?php if(isset($color)){if($color=='"Silver"'){echo 'selected';}} ?>>Silver</option>
					<option <?php if(isset($color)){if($color=='"Grey"'){echo 'selected';}} ?>>Grey</option>
					<option <?php if(isset($color)){if($color=='"Red"'){echo 'selected';}} ?>>Red</option>
					<option <?php if(isset($color)){if($color=='"Blue"'){echo 'selected';}} ?>>Blue</option>
					<option <?php if(isset($color)){if($color=='"Brown"'){echo 'selected';}} ?>>Brown</option>
					<option <?php if(isset($color)){if($color=='"Maroon"'){echo 'selected';}} ?>>Maroon</option>
					<option <?php if(isset($color)){if($color=='"Tan"'){echo 'selected';}} ?>>Tan</option>
					<option <?php if(isset($color)){if($color=='"Yellow"'){echo 'selected';}} ?>>Yellow</option>
					<option <?php if(isset($color)){if($color=='"Orange"'){echo 'selected';}} ?>>Orange</option>
					<option <?php if(isset($color)){if($color=='"Beige"'){echo 'selected';}} ?>>Beige</option>
					<option <?php if(isset($color)){if($color=='"Green"'){echo 'selected';}} ?>>Green</option>
					<option <?php if(isset($color)){if($color=='"Purple"'){echo 'selected';}} ?>>Purple</option>
				</select>
			</div>
			
			</div> <!-- cars -->
		
					<br>
				<input id="sortBy" name="sortBy" value="<?php echo $sortBy;?>" style="display:none;"></input>	
				<input id="page" name="page" style="display:none;"></input>
				</form>
				</div> <!-- form group -->	
						   
						  
                        </div>
                     </div>
					 
			
<div id="adverts" class="widget listing-filter-block filter-categories hidden-sm hidden-xs">
	<a href="https://www.cartell.ie/" target="_blank"><img src="data:image/png;base64,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" alt="cartell.ie"></img></a>
	<a href="https://www.myvehicle.ie/" target="_blank"><img src="data:image/png;base64,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" alt="myvehicle.ie"></img></a>
	<br><br>
	<a href="https://www.123.ie/car-insurance" target="_blank"><img src="https://www.carzone.ie/assets/img-content/partners-123-fp-logo.jpg" alt=""></img></a>
	<br><br>
	<a href="https://www.completecar.ie/" target="_blank"><img src="https://www.completecar.ie/images/logo.png" alt="completecar.ie logo"></img></a>
</div> <!-- adverts -->
		 
<script>
 $(function(){
	//alert('ok');
	
	//$.ajax({url: "/incl/get_ad_list.php", success: function(result){
        //$("#test").html(result);
	//	AdList = JSON.parse(result);
	//	alert(AdList.name);
	//}});
	
	// $.post("/incl/get_ad_list.php",
    //    {
    //      cat1: "Pets",
   //       cat2: "Cars"
   //     },
   //     function(result,status){
   //         //alert(result);
	//		AdList = JSON.parse(result);
	//		alert(AdList[0].title);
   //     });
	
	if($("#cat2").val()=='Cars'){$("#cars").css("display","block");}
	
	$.ajax({url: "/categories-list.txt", success: function(result){
        //$("#test").html(result);
		myObj = JSON.parse(result);
	
	//location.search = 'namas=121212';
	//alert(location.search);
	//alert(location.pathname);
	
	$("#fuel").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	});
	
	$("#transmission").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	});
	
	$("#bodyType").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	});
	
	$("#color").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	});
		
	$("#location").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	});
	
	$("#cat1").change(function(){ 
		//alert('cat1 change');
		$("#cat2").empty();
		$("#cat3").empty();
		$("#cat4").empty();
		
		$("#cat3").css("display","none");
		$("#cat4").css("display","none");
		var parinktas=$("#cat1").val();
		//alert(myObj[parinktas].length);
		if($("#cat1").val()!=='All Category'){
			$("#cat2").css("display","block");
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat2").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat2").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat2").append(item);
		}else{$("#cat2").css("display","none");}
		//$("#refine").submit();
		var link='';
		if($("#cat1").val()=='Cars'){
			link='Cars-&-Motor/Cars';
		}else{
			if($("#cat1").val()!=='All Category'){li=$("#cat1").val();link=li.replace(/ /g, "-");}
		}
		var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		if(sort==' Most Popular '){vars+='&sortBy=mostPopular';}
		if(vars=='?'){vars='';}
		window.location.href = "/items/"+link+vars;
	}); // cat1.change
	
	
	$("#cat2").change(function(){
		//alert($("#cat2").val().substring(0,3));
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat3").css("display","none");
		$("#cat4").css("display","none");
		var parinktas=$("#cat2").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		
			//alert($("#cat1").val());
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables' || $("#cat2").val()=='Mobile phones' || $("#cat2").val()=='Laptops' || $("#cat2").val()=='Furniture'){ 
			$("#cat3").css("display","block");
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat3").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat3").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat3").append(item);
		}
			//$("#refine").submit();
			var li=$("#cat1").val();link=li.replace(/ /g, "-");
			//alert(link);
			if($("#cat2").val().substring(0,3)!=='All'){li='/'+$("#cat2").val(); link+=li.replace(/ /g, "-");}
			//alert(link);
			var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		if(sort==' Most Popular '){vars+='&sortBy=mostPopular';}
		if(vars=='?'){vars='';}
			window.location.href = "/items/"+link+vars;
	}); //cat2.change
	
	$("#cat3").change(function(){
		//alert('cat3');
		$("#cat4").empty();
		$("#cat4").css("display","none");
		var parinktas=$("#cat3").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		//alert($("#cat3").val().substring(0,3));
		if($("#cat3").val().substring(0,3)!=='All' && $("#cat1").val()=='Cars & Motor'){
			$("#cat4").css("display","block");
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat4").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat4").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat4").append(item);
		}
			//$("#refine").submit();
			var li=$("#cat1").val(); link=li.replace(/ /g, "-");
			li='/'+$("#cat2").val(); link+=li.replace(/ /g, "-");
			if($("#cat3").val().substring(0,3)!=='All'){li='/'+$("#cat3").val(); link+=li.replace(/ /g, "-");}
			var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		if(sort==' Most Popular '){vars+='&sortBy=mostPopular';}
		if(vars=='?'){vars='';}
			window.location.href = "/items/"+link+vars;
	}); // cat3.change
	
	$("#cat4").change(function(){
			var li=$("#cat1").val();
			li+='/'+$("#cat2").val();
			li+='/'+$("#cat3").val();link=li.replace(/ /g, "-");
			if($(this).val().substring(0,3)!=='All'){link+='/'+$("#cat4").val();}
			var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		if(sort==' Most Popular '){vars+='&sortBy=mostPopular';}
		if(vars=='?'){vars='';}
			window.location.href = "/items/"+link+vars;
	}); // cat4 change
	
	$("#yearMin").change(function(){
		var yearMax=$("#yearMax").val();
		var minimum=$(this).val();
		if(minimum=='No Min'){minimum=1997;}
		$("#yearMax").empty();
		var item=$("<option></option>").text('No Max');
		$("#yearMax").append(item);
		for(x=minimum;x<=2017;x++){
			var item=$("<option></option>").text(x);
			$("#yearMax").append(item);
		}
		$("#yearMax").val(yearMax);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	}); // yearMin
	
	$("#yearMax").change(function(){
		var yearMin=$("#yearMin").val();
		var maximum=$(this).val();
		var d = new Date();
		var n = d.getFullYear();
		if(maximum=='No Max'){maximum=n;}
		$("#yearMin").empty();
		var item=$("<option></option>").text('No Min');
		$("#yearMin").append(item);
		for(x=1997;x<=maximum;x++){
			var item=$("<option></option>").text(x);
			$("#yearMin").append(item);
		}
		$("#yearMin").val(yearMin);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	}); // yearMax
	
	$("#priceMin").change(function(){
		var priceMax=$("#priceMax").val();
		var minimum=$(this).val();
		if(minimum=='No Min'){minimum=0;}
		minimum=parseInt(minimum);
		$("#priceMax").empty();
		var item=$("<option></option>").text('No Max');
		$("#priceMax").append(item);
		for(x=minimum;x<=20000;x+=500){
			var item=$("<option></option>").text(x);
			$("#priceMax").append(item);
		}
		$("#priceMax").val(priceMax);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	}); // priceMin
	
	$("#priceMax").change(function(){
		var priceMin=$("#priceMin").val();
		var maximum=$(this).val();
		if(maximum=='No Max'){maximum=20000;}
		maximum=parseInt(maximum);
		$("#priceMin").empty();
		var item=$("<option></option>").text('No Min');
		$("#priceMin").append(item);
		for(x=0;x<=maximum;x+=500){
			var item=$("<option></option>").text(x);
			$("#priceMin").append(item);
		}
		$("#priceMin").val(priceMin);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		if(sort==' Most Popular '){$("#sortBy").val('mostPopular');}
		$("#refine").submit();
	}); // priceMax
	
	}}); // ajax
 });
</script>