$.ajax({url: "/categories-list.txt", success: function(result){
    //$("#test").html(result);
	myObj = JSON.parse(result);
	
	$("#title").keyup(function(){
		ieskom();
	});
	
	ieskom();
	
	function ieskom(){
		//alert('df');
		var str=$("#title").val();
		//alert(str);
		if(str==''){$("#txtHint").text('nera');}
		if($("#txtHint").text()!=='stop'){
			$.ajax({url: "/incl/gethint.php?q=" + str, success: function(result){
				$("#txtHint").text(result);
				if(result!=='nera'){
					var array = result.split('/');
					if (typeof array[0] !== 'undefined') {
						$("#cat1").val(array[0]);change_cat1();
					}
					if (typeof array[1] !== 'undefined') {
						$("#cat2").val(array[1]);change_cat2();
					}
					if (typeof array[2] !== 'undefined') {
						$("#cat3").val(array[2]);change_cat3();
					}
					if (typeof array[3] !== 'undefined') {
						$("#cat4").val(array[3]);
					}
					
					$("#fuel").val('Please Choose');
					$("#engine").val('');
					$("#year").val('Please Choose');
					$("#bodyType").val('Please Choose');
					
					for(i=1994;i<2018;i++){
						if(str.search(i)>=0){$("#year").val(i);}
					}
					
					if(str.search(/td/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/diesel/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/crdi/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/d4d/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/hdi/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/116d/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/320d/i)>=0){$("#fuel").val('Diesel');}
					if(str.search(/cdti/i)>=0){$("#fuel").val('Diesel');}
					
					if(str.search(/1\.0d/i)>=0){$("#engine").val('1.0');$("#fuel").val('Diesel');}
					if(str.search(/1\.1d/i)>=0){$("#engine").val('1.1');$("#fuel").val('Diesel');}
					if(str.search(/1\.2d/i)>=0){$("#engine").val('1.2');$("#fuel").val('Diesel');}
					if(str.search(/1\.3d/i)>=0){$("#engine").val('1.3');$("#fuel").val('Diesel');}
					if(str.search(/1\.4d/i)>=0){$("#engine").val('1.4');$("#fuel").val('Diesel');}
					if(str.search(/1\.5d/i)>=0){$("#engine").val('1.5');$("#fuel").val('Diesel');}
					if(str.search(/1\.6d/i)>=0){$("#engine").val('1.6');$("#fuel").val('Diesel');}
					if(str.search(/1\.7d/i)>=0){$("#engine").val('1.7');$("#fuel").val('Diesel');}
					if(str.search(/1\.8d/i)>=0){$("#engine").val('1.8');$("#fuel").val('Diesel');}
					if(str.search(/1\.9d/i)>=0){$("#engine").val('1.9');$("#fuel").val('Diesel');}
					if(str.search(/2\.0d/i)>=0){$("#engine").val('2.0');$("#fuel").val('Diesel');}
					if(str.search(/2\.1d/i)>=0){$("#engine").val('2.1');$("#fuel").val('Diesel');}
					if(str.search(/2\.2d/i)>=0){$("#engine").val('2.2');$("#fuel").val('Diesel');}
					if(str.search(/2\.3d/i)>=0){$("#engine").val('2.3');$("#fuel").val('Diesel');}
					if(str.search(/2\.4d/i)>=0){$("#engine").val('2.4');$("#fuel").val('Diesel');}
					if(str.search(/2\.5d/i)>=0){$("#engine").val('2.5');$("#fuel").val('Diesel');}
					if(str.search(/2\.8d/i)>=0){$("#engine").val('2.8');$("#fuel").val('Diesel');}
					if(str.search(/3\.0d/i)>=0){$("#engine").val('3.0');$("#fuel").val('Diesel');}
					
					if(str.match('1\\.0')){$("#engine").val('1.0');}
					if(str.match('1\\.1')){$("#engine").val('1.1');}
					if(str.match('1\\.2')){$("#engine").val('1.2');}
					if(str.match('1\\.3')){$("#engine").val('1.3');}
					if(str.match('1\\.4')){$("#engine").val('1.4');}
					if(str.match('1\\.5')){$("#engine").val('1.5');}
					if(str.match('1\\.6')){$("#engine").val('1.6');}
					if(str.match('1\\.7')){$("#engine").val('1.7');}
					if(str.match('1\\.8')){$("#engine").val('1.8');}
					if(str.match('1\\.9')){$("#engine").val('1.9');}
					if(str.match('2\\.0')){$("#engine").val('2.0');}
					if(str.match('2\\.1')){$("#engine").val('2.1');}
					if(str.match('2\\.2')){$("#engine").val('2.2');}
					if(str.match('2\\.3')){$("#engine").val('2.3');}
					if(str.match('2\\.4')){$("#engine").val('2.4');}
					if(str.match('2\\.5')){$("#engine").val('2.5');}
					if(str.match('2\\.8')){$("#engine").val('2.8');}
					if(str.match('3\\.0')){$("#engine").val('3.0');}
					
					if(str.search(/petrol/i)>=0){$("#fuel").val('Petrol');}
					if(str.search(/electric/i)>=0){$("#fuel").val('Electric');}
					if(str.search(/hybrid/i)>=0){$("#fuel").val('Hybrid');}
					
					if(str.search(/a3/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/a4/i)>=0){$("#bodyType").val('Saloon');}
					if(str.search(/a5/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/a6/i)>=0){$("#bodyType").val('Saloon');}
					if(str.search(/a7/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/a8/i)>=0){$("#bodyType").val('Saloon');}
					if(str.search(/passat/i)>=0){$("#bodyType").val('Saloon');}
					if(str.search(/astra/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/leon/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/fiesta/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/auris/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/focus/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/corsa/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/civic/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/3008/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/insignia/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/mondeo/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/polo/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/207/i)>=0){$("#bodyType").val('Hatchback');}
					if(str.search(/307/i)>=0){$("#bodyType").val('Hatchback');}
					
					
				}else{
					$("#cat1").val('Please Choose');
					$("#cat44").hide();
					$("#cat33").hide();
					$("#cat22").hide();
					$("#cars1").hide();
				}
				
			}});
		}
	} // title.keyup
	
	
	$("#cat1").change(function(){
		$("#txtHint").text('stop');
		change_cat1();
	}); //cat1.change
	function change_cat1(){
		$("#cat2").empty();
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat33").css("display","none");
		$("#cat44").css("display","none");
		$("#cars1").hide();
		var parinktas=$("#cat1").val();
		//alert(myObj[parinktas].length);
		if($("#cat1").val()!=='Please Choose'){
			$("#cat22").show();
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat2").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat2").append(item);
			}
			//var item=$("<option></option>").text('Other '+parinktas);
			//$("#cat2").append(item);
		}else{$("#cat22").hide();}
	} // change_cat1()
	
	$("#cat2").change(function(){
		$("#txtHint").text('stop');
		change_cat2();
	}); //cat2.change
	function change_cat2(){
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat33").css("display","none");
		$("#cat44").css("display","none");
		$("#cars1").hide();
		var parinktas=$("#cat2").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables' || $("#cat2").val()=='Mobile phones' || $("#cat2").val()=='Laptops' || $("#cat2").val()=='Furniture' ){ 
			$("#cat33").show();
			if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables'){
				$("#cars1").show();
			}
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat3").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat3").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat3").append(item);
		}
	} // change_cat2()
	
	$("#cat3").change(function(){
		$("#txtHint").text('stop');
		change_cat3();
	}); // cat3.change
	function change_cat3(){
		$("#cat4").empty();
		$("#cat44").css("display","none");
		var parinktas=$("#cat3").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables' && $("#cat3").val().substring(0,3)!=='All'){
			$("#cat44").show();
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat4").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat4").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat4").append(item);
		}
	}
	
	$("#cat4").change(function(){
		$("#txtHint").text('stop');
	});
	
}}); // ajax