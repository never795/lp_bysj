<?php
include("Connect.php");//引入链接数据库
$name=$_POST['name'];  //获取用户名
$email=$_POST['email'];//获取电子邮箱
$phone=$_POST['phone'];//获取号码
$sql_SelectCont = "select * from login where username='$name'";
$countSelect= $db->query($sql_SelectCont);
$count= mysqli_num_rows($countSelect);
if($count==0) {
    die('0');
}
$sql = "select * from login where username='$name'";
//写sql语句
$r = $db->query($sql);

//执行sql语句返回给r
if($r)//条件
{
    while ($attr = $r->fetch_row()) {
        if($attr[6]!=$email) //电子邮箱判断不正确
            die('1');
        if($attr[3]!=$phone) //电话号码不争取
            die('2');
        else
        {
            $sql2 = "update login set password='000000' where username='$name'"; //电子邮箱、手机均正确的情况下密码重置为000000
//写sql语句
            $r2 = $db->query($sql2);

//执行sql语句返回给r
            if($r2)//条件
            {
                die('3'); //返回执行结果

            }
            else
                die('4');
        }

    }

}
else
    die('0');

