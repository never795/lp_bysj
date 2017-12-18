<?php
include("Connect.php");//引入链接数据库
$name=$_POST['name']; //获取用户名称
$pwd=$_POST['pwd'];   //获取用户密码
$sql_SelectCont = "select * from login where username='$name'"; //判断用户是否存在
$countSelect= $db->query($sql_SelectCont);
$count= mysqli_num_rows($countSelect);
if($count==0) {
    die('0');
}
$sql="select * from login where username='$name'";  //用户邓丽

//写sql语句
$r = $db->query($sql);
//执行sql语句返回给r
if($r)//条件
{
    while ($attr = $r->fetch_row()) {
        if($attr[2]==$pwd)   //密码匹配
            die('1');
        else
            die('2');
    }
}
else
    die('2');
