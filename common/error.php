﻿<?php

 $GLOBALS[ERROR] = array(
	'0'=>'成功',
	'1'=>'密码错误',
	'2'=>'用户名错误',
	'3'=>'用户名已存在',
	'4'=>'注册失败',
	'5'=>'已经登陆',
	'6'=>'可以使用该用户名',
	'7'=>'注销成功',
	'8'=>'还没有登陆请先登录',
	'9'=>'用户还没录入信息',
	'9998'=>'非法参数',
	'9999'=>'缺少参数',
	'-1'=>'error'
);


 function tojs(){
 	$myfile = fopen("error.js", "w");
	fwrite($myfile, "var error =".json_encode($GLOBALS[ERROR]));

 }