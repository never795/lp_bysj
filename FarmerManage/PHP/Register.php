<?php
include("Connect.php");//引入链接数据库
$name=$_POST['name'];  //获取用户名
$pwd=$_POST['pwd'];   //获取用户密码
$email=$_POST['email'];  //获取邮箱
$phone=$_POST['phone'];  //获取电话号码
$sql_SelectCont = "select * from login where username='$name'"; //判断是否存在
$countSelect= $db->query($sql_SelectCont);
$count= mysqli_num_rows($countSelect); //返回结果条数
if($count>0) {
    die('0');  //查询的结果为0，证明该用户还没有注册
}
$sql = "insert into login(username,password,phone_number,email) values('$name','$pwd','$email','$phone')";  //定义SQL语句
//写sql语句
$r = $db->query($sql);

//执行sql语句返回给r
if($r)//条件
{
    die('1'); //判断执行结果，正确的话返回1到前端，前端进行显示用户

}
else
    die('2');//执行失败返回0

