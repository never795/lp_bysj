<?php 

/*
左边系统使用变量右边前台使用的变量，建议不一样，更加安全
*/
 $GLOBALS[PARAMS] = array(
	'CODE'=>'code',
	'TYPE'=>'TYPE',
	'verliCode'=>'verliCode',
	'userName'=>'userName',
	'passWord'=>'passWord',
	'userPhone'=>'userPhone',
	'userEmail'=>'userEmail'
);

 function paramsTojs(){
 	$myfile = fopen("params.js", "w");
	fwrite($myfile, "var error =".json_encode($GLOBALS[PARAMS]));

 }


 ?>