﻿<?php

//规则 10以上偶数成功，技术失败
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
	'10'=>'修改成功',
	'11'=>'修改失败',
	'12'=>'删除成功',
	'13'=>'删除失败',
	'14'=>'添加成功',
	'15'=>'添加失败',
	'16'=>'查询成功',
	'17'=>'查询失败',
	'10000'=>'验证码错误',
	'10001'=>'数据重复',
	'9998'=>'非法参数',
	'9999'=>'缺少参数',
	'-1'=>'错误'
);


 function tojs(){
 	$myfile = fopen("error.js", "w");
	fwrite($myfile, "var error =".json_encode($GLOBALS[ERROR]));

 }