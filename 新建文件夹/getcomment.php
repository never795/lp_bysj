<?php 

/*

CREATE TABLE `menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `commint` varchar(2550) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


*/
include "db.php";
//$res = query("select * from menu");

 $title =  @$_POST['title'];
// $zone = @$_POST['zone'];
 $comment  = @$_POST['comment'];
 $callback = @$_GET['callback']?$_GET['callback']:"callback";
// $scoue  = @$_POST['scoue'];
if($title && $comment){

	$sql = "insert into menu (title,commint)values('{$title}','{$comment}')";
	$res = insert($sql);
	
}else{
$sql = "select * from menu";
$res = query($sql);

}

header("Content-type:text/html;charset=utf-8");
if($res){
	echo $callback."(".json_encode(array("falge"=>1,"res"=>$res)).")";
}else{
	echo $callback."(".json_encode(array("falge"=>1,"res"=>"发生错误")).")";
}


 ?>