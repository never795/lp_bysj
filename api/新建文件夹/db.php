<?php 
define('mysql_server_name', "w.rdc.sae.sina.com.cn");//w.rdc.sae.sina.com.cn
define('mysql_username', "mx2ml52kl1");//mx2ml52kl1
define('mysql_password', "ymw302y3mlh40klm1k5ml2y3z53ix0y1hzzmm22y");//ymw302y3mlh40klm1k5ml2y3z53ix0y1hzzmm22y
define('mysql_database', "app_zf123");//app_zf123


function getConn(){
$conn=mysql_connect(mysql_server_name,mysql_username,mysql_password) or die("error connecting") ; //连接数据库
mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
mysql_select_db(mysql_database); //打开数据库
return $conn;
 }
function query($sql,$conn=null){
if(!$conn)
	$conn = getConn();

$res =  array();
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)) 
{
	array_push($res,array($row[0],$row[1],$row[2]));
}
 close($conn);
 return $res;
}

function insert($sql,$conn=null){
if(!$conn)
	$conn = getConn();
  $result = mysql_query($sql,$conn); //查询
  close($conn);
  return $result;
}

function close($conn){
	mysql_close($conn); //关闭MySQL连接
}
?>