function enable_disable(id,th){
	//alert(id);
	if(th.className=="label label-success"){
		//enable
		//alert(th.className);
		th.className="label label-warning";
		th.firstChild.className="fa fa-close";
		th.innerHTML='Disable: <i class="fa fa-close"></i>';
		var el=th.parentNode;
		el.childNodes[1].innerHTML='<b><span style="color:green">Active</span></b>';
		
	}else{
		//disable
		th.className="label label-success";
		th.innerHTML='Enable: <i class="fa fa-check"></i>';
		var el=th.parentNode;
		el.childNodes[1].innerHTML='<b><span style="color:orange">Not active</span></b>';
	}
	var wait=document.getElementById("wait");
	//alert(id);
	//var r = confirm("Delete the ad?");
	//if(r==true){
	var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/incl/enable_disable.php";
		var vars = "ad_id="+id+"&ad_status="+th.className;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				wait.style.display="none";
				//alert(return_data);
				//window.location = "/my_ads";
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
	//}
}
function delete_ad(id,th){
	var wait=document.getElementById("wait");
	//alert(id);
	var r = confirm("Delete the ad?");
	if(r==true){
	var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/incl/delete_ad.php";
		var vars = "ad_id="+id;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				var p=th.parentNode.parentNode;
				p.parentNode.removeChild(p);
				//window.location = "/my_ads";
				wait.style.display="none";
				
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
	}
}