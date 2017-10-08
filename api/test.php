<?php 
 include "common/ExcelToArrary.php";
$exl = new ExcelToArrary();
$titl=array('X'=>'省',"Y0"=>'邮箱','password'=>'');
$data =array(array('X'=>'a2',"Y0"=>'1234124','1'=>'c2'),array('X'=>'a3',"Y0"=>'b3','0'=>'c3'));
print_r($data);exit();
$exl->push($titl,$data );

// for ($i=0; $i < 128; $i++) { 
// 	echo chr($i)."==".$i."\t"; 
// }
