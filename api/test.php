<?php 
 include "common/ExcelToArrary.php";
$exl = new ExcelToArrary();
$exl->push(array('uid'=>'id',"email"=>'邮箱','password'=>'密码'),array(array('uid'=>'a2',"email"=>'1234124','password'=>'c2'),array('uid'=>'a3',"email"=>'b3','password'=>'c3'),array('uid'=>'231',"email"=>'1234124','password'=>'2222'),array('uid'=>'231',"email"=>'1234124','password'=>'2222'),array('uid'=>'231',"email"=>'1234124','password'=>'2222')));

// for ($i=0; $i < 128; $i++) { 
// 	echo chr($i)."==".$i."\t"; 
// }
