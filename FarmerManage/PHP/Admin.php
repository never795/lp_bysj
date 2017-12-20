<?php
include("Connect.php");//引入链接数据库
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$sql_SelectCont = "select * from lp_user where lp_username='$name'";
$countSelect= $db->query($sql_SelectCont);
$count= mysqli_num_rows($countSelect);
if($count==0) {
    die('0');
}
$sql="select * from lp_user where lp_username='$name'";

//写sql语句
$r = $db->query($sql);
//执行sql语句返回给r
if($r)//条件
{
    while ($attr = $r->fetch_row()) {
        if($attr[2]==$pwd)
            die('1');
        else
            die('2');
    }
}
else
    die('3');
