<?php
function clean_string_url($string){
	$string=str_replace(' ','-',$string);
	$string=str_replace('&','and',$string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function clean_string($string){
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>