<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case 'add': //用户添加
    {
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];
        $sex=$_POST['sex'];
        $idcard=$_POST['idcard'];
        $phone=$_POST['phone'];
        $place=$_POST['place'];
        $email=$_POST['email'];
        $sql_SelectCont = "select * from login where username='$username'";
        $countSelect= $db->query($sql_SelectCont);
        $count= mysqli_num_rows($countSelect);
        if($count>0) {
            die('2');
        }
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        $sql = "insert into login(username,password,phone_number,id_number,sex,email,place,addtime) values('$username','$pwd','$phone','$idcard','$sex','$email','$place','$time')";
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
    case 'edit'://用户编辑
    {
        $id=$_POST['id'];
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];
        $sex=$_POST['sex'];
        $idcard=$_POST['idcard'];
        $phone=$_POST['phone'];
        $place=$_POST['place'];
        $email=$_POST['email'];
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        
        $sql = "update login set username='$username',password='$pwd',phone_number='$phone',Id_number='$idcard',sex='$sex',email='$email',place='$place',addtime='$time' where login_id=$id ";
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
    case 'delete'://用户删除
    {
        $id=$_POST['id'];

        $sql = "delete from  login  where login_id=$id ";

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
    case 'list'://用户列表
    {
        $time=@date("Y-m-d H:i:s", time()+8*60*60);
        $sqlinsert = "insert into operate(type,addtime) values('6','$time')";
        $rinsert = $db->query($sqlinsert);
        $result="";
        $count =1;
        $sql=" select * from login order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {

                $result  .=  " <tr class='text-c'><td>$count</td><td>$attr[1]</td><td>$attr[5]</td> <td>$attr[3]</td> 	<td>$attr[6]</td><td>$attr[7]</td><td>$attr[10]</td> <td class=\"td-manage\"> <a title=\"编辑\" href=\"javascript:;\" onclick=\"member_edit('编辑','member-edit.html?id=$attr[0]','4','','510')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6df;</i></a>  <a title=\"删除\" href=\"javascript:;\" onclick=\"member_del(this,$attr[0])\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6e2;</i></a></td>  </tr>	";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'search'://用户查询
    {
        $min=$_POST['min'];
        $max=$_POST['max'];
        $username=$_POST['username'];
        $result="";
        $count =1;
        $sql=" select * from login where addtime between '$min' and  '$max' and username like '%$username%' order by addtime desc";

        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  " <tr class='text-c'><td>$count</td><td><u style='cursor:pointer' class='text-primary'>$attr[1]</u></td><td>$attr[5]</td> <td>$attr[3]</td> 	<td>$attr[6]</td><td>$attr[7]</td><td>$attr[10]</td> <td class=\"td-manage\"> <a title=\"编辑\" href=\"javascript:;\" onclick=\"member_edit('编辑','member-edit.html?id=$attr[0]','4','','510')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6df;</i></a>  <a title=\"删除\" href=\"javascript:;\" onclick=\"member_del(this,$attr[0])\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6e2;</i></a></td>  </tr>	";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'get'://获取用户
    {
        $id=$_POST['id'];
        $sql="select * from login where login_id =$id order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  = "$attr[0]*$attr[1]*$attr[2]*$attr[3]*$attr[4]*$attr[5]*$attr[6]*$attr[7]";
            }
        }
        echo  $result;
        break;
    }
}



