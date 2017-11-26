<?php
$swear=['fuck',' blet ',' nachui','pyzda',' arse ','asshole','bitch','bastard','bollock','bollocks',' crap ',' cunt ',
'shit','nigga','nigger','idiot','globalsulution',
' dick ',' gay ','Lesbian','masturbating',' cock '];
for($a=0;$a<count($swear);$a++){
	if(strripos($title,$swear[$a])>-1){$active='swear';}
	if(strripos($description,$swear[$a])>-1){$active='swear';}
	if(strripos($name,$swear[$a])>-1){$active='swear';}
	if(strripos($email,$swear[$a])>-1){$active='swear';}
	if(strripos($phone,$swear[$a])>-1){$active='swear';}
}
?>