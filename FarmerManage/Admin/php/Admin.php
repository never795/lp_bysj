<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case 'add': //管理员添加
    {
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];
        $remark=$_POST['remark'];
        $sql_SelectCont = "select * from lp_user where lp_username='$username'";
        $countSelect= $db->query($sql_SelectCont);
        $count= mysqli_num_rows($countSelect);
        if($count>0) {
            die('2');
        }
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        $sql = "insert into lp_user(lp_username,lp_password,lp_remark,lp_regirst_time) values('$username','$pwd','$remark','$time')";
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
    case 'edit': //管理员编辑
    {
        $id=$_POST['id'];
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];

        $remark=$_POST['remark'];
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        
        $sql = "update lp_user set lp_username='$username',lp_password='$pwd',lp_remark='$remark' where user_Id=$id ";
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
    case 'delete'://管理员删除
    {
        $id=$_POST['id'];

        $sql = "delete from  lp_user  where user_id=$id ";

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
    case 'list'://管理员列表
    {

        $time=@date("Y-m-d H:i:s", time()+8*60*60);
        $sqlinsert = "insert into operate(type,addtime) values('7','$time')";
        $rinsert = $db->query($sqlinsert);
        $result="";
        $count =1;
        $sql=" select * from lp_user order by lp_regirst_time desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {

                $result  .=  " <tr class='text-c'><td>$count</td><td><u style='cursor:pointer' class='text-primary'>$attr[1]</u></td><td>$attr[2]</td> <td>$attr[3]</td> 	<td>$attr[4]</td><td class=\"td-manage\"> <a title=\"编辑\" href=\"javascript:;\" onclick=\"admin_edit('编辑','admin-edit.html?id=$attr[0]','4','','510')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6df;</i></a>  <a title=\"删除\" href=\"javascript:;\" onclick=\"admin_del(this,$attr[0])\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6e2;</i></a></td>  </tr>	";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'search'://管理员查找
    {
        $min=$_POST['min'];
        $max=$_POST['max'];
        $username=$_POST['username'];
        $result="";
        $count =1;
        $sql=" select * from lp_user where lp_regirst_time between '$min' and  '$max' and lp_username like '%$username%' order by lp_regirst_time desc";

        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  " <tr class='text-c'><td>$count</td><td><u style='cursor:pointer' class='text-primary'>$attr[1]</u></td><td>$attr[2]</td> <td>$attr[3]</td> 	<td>$attr[4]</td><td class=\"td-manage\"> <a title=\"编辑\" href=\"javascript:;\" onclick=\"admin_edit('编辑','admin-edit.html?id=$attr[0]','4','','510')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6df;</i></a>  <a title=\"删除\" href=\"javascript:;\" onclick=\"admin_del(this,$attr[0])\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6e2;</i></a></td>  </tr>	";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'get': //获取管理员
    {
        $id=$_POST['id'];
        $sql="select * from lp_user where  user_id=$id order by lp_regirst_time desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  = "$attr[0]*$attr[1]*$attr[2]*$attr[3]";
            }
        }
        echo  $result;
        break;
    }
}



