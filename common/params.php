<?php 

/*
���ϵͳʹ�ñ����ұ�ǰ̨ʹ�õı��������鲻һ�������Ӱ�ȫ
*/
 $GLOBALS[PARAMS] = array(
	'CODE'=>'code',
	'TYPE'=>'type',
	'id'=>'id',
	'1'=>'1',
	'2'=>'2',
	'3'=>'3',
	'4'=>'4',
	'5'=>'5',
	'6'=>'6',
	'7'=>'7',
	'8'=>'8',
	'verliCode'=>'verliCode',
	'userName'=>'userName',
	'passWord'=>'passWord',
	'userPhone'=>'userPhone',
	'userEmail'=>'userEmail',
	'now_addr'=>'now_addr',
	'worktime'=>'worktime',
	'land'=>'land',
	'jtkn'=>'jtkn',
	'knqk'=>'knqk',
	'lset'=>'lset',
	'lslr'=>'lslr'


);

 function paramsTojs(){
 	$myfile = fopen("params.js", "w");
	fwrite($myfile, "var error =".json_encode($GLOBALS[PARAMS]));

 }


 ?>