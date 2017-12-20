<?php

$name=$_POST['name']; //获取用户名称
$type=$_POST['type']; //获取操作类型
include("Connect.php");//引入链接数据库
switch ($type) {
    case "get": {  //获取用户信息
        $result = " ";
        $sql = "select * from login  where username=$name";
        $r = $db->query($sql);
        if ($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result .= "$attr[0]*$attr[1]*$attr[2]*$attr[3]*$attr[4]*$attr[5]*$attr[6]*$attr[7]*$attr[8]*$attr[9]";//*$attr[1]* $attr[2]* $attr[3]* $attr[4]*$attr[5]*$attr[6]* $attr[7]* $attr[8]* $attr[9];
            }
        }
        echo $result;
        break;
    }
    case "update":  //更新用户信息
    {
        $name=$_POST['name'];
        $realname=$_POST['realname'];
        $sex=$_POST['sex'];
        $birthday=$_POST['birthday'];
        $idcard=$_POST['idcard'];
        $add=$_POST['add'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];

        $sql = "update login set phone_number='$phone',ID_number='$idcard',sex='$sex',email='$email',place='$add',realname='$realname',birthday='$birthday' where username='$name'";
//写sql语句
        $r = $db->query($sql);

//执行sql语句返回给r
        if($r)//条件
        {
            die('1');

        }
        else
            die('0');
        break;
    }
    case "updatepwd":  //更新用户密码
    {
        $pwd=$_POST['oldpwd'];
        $newpwd=$_POST['newpwd'];
        $sql="select * from login where username='$name'";
        //写sql语句
        $r = $db->query($sql);
//执行sql语句返回给r
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                if($attr[2]==$pwd)
                {
                    $sql2 = "update login set password=$newpwd where username='$name'";
//写sql语句
                    $r2 = $db->query($sql2);

//执行sql语句返回给r
                    if($r2)//条件
                    {
                        die('3');

                    }
                    else
                        die('4');
                }
                else
                    die('0');
            }
        }
        else
            die('2');

    }
}







