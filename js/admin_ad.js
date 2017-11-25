 function admin_ad(id,th){
	 //alert(th.className);
	if(th.classList.contains("btn-success")){
		//alert('success');
		$(th).removeClass("btn-success");
		action='disable';
	}
	if(th.classList.contains("btn-warning")){
		//alert('warning');
		$(th).removeClass("btn-warning");
		action='enable'
	}
	var hr = new XMLHttpRequest();
	var url = "/incl/enable_disable2.php";
	var vars = "ad_id="+id+"&action="+action+"&key=4461";
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		//alert(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			//wait.style.display="none";
			//alert(return_data);
			if(return_data=='enable'){
				$(th).addClass("btn-success");
				$(th).text('Active');
			}
			if(return_data=='disable'){
				$(th).addClass("btn-warning");
				$(th).text('Not active');
			}
			//window.location = "/my_ads";
		}
	}
		// Send the data to PHP now... and wait for response to update the status div
		$(th).text('Wait');
		hr.send(vars); // Actually execute the request
		//wait.style.display="block";
 }