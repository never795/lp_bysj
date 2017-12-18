<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{

    case 'edit'://答疑回复
    {
        $id=$_POST['arrtid'];


        $content=$_POST['content'];
        $editor=$_POST['editor'];
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        $sql = "update dayi set answer='$content',responsename=' $editor',dy_time='$time' where dy_id=$id ";

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
    case 'delete': //答疑删除
    {
        $id=$_POST['id'];

        $sql = "delete from  dayi  where dy_id=$id ";

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

    case 'list'://答疑列表
    {
        $time=@date("Y-m-d H:i:s", time()+8*60*60);
        $sqlinsert = "insert into operate(type,addtime) values('5','$time')";
        $rinsert = $db->query($sqlinsert);
        $result="";
        $count =1;
        $sql=" select * from dayi order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {

                $result  .=  " 	<tr class='text-c'><td>$count</td>  <td>$attr[6]</td><td class='text-l'><div class='c-999 f-12'>	<div>留言内容（$attr[8]）：<span>$attr[1]</span></div><br /><div>管理员回复（$attr[3]）：<span>$attr[2]</span></div></td>	<td class='td-manage'><a title='回复' href='javascript:' onclick=\"feeback_edit('回复','feedback-response.html?id=$attr[0]','4','','510')\" style='text-decoration:none'><i class='Hui-iconfont'>&#xe6df;</i></a> <a title='删除' href='javascript:;' onclick='feeback_del(this,$attr[0])' class='ml-5' style='text-decoration:none'><i class='Hui-iconfont'>&#xe6e2;</i></a></td>   	   ";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'search'://答疑查询
    {
        $min=$_POST['min'];
        $max=$_POST['max'];

        $liuyanname=$_POST['liuyanname'];
        $result="";
        $count =1;
        $sql=" select * from dayi where addtime between '$min' and  '$max' and consult like '%$liuyanname%' order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  " 	<tr class='text-c'><td>$count</td>  <td>$attr[6]</td><td class='text-l'><div class='c-999 f-12'>	<div>留言内容（$attr[8]）：<span>$attr[1]</span></div><br /><div>管理员回复（$attr[3]）：<span>$attr[2]</span></div></td>	<td class='td-manage'><a title='回复' href='javascript:' onclick=\"feeback_edit('回复','feedback-response.html?id=$attr[0]','4','','510')\" style='text-decoration:none'><i class='Hui-iconfont'>&#xe6df;</i></a> <a title='删除' href='javascript:;' onclick='feeback_del(this,$attr[0])' class='ml-5' style='text-decoration:none'><i class='Hui-iconfont'>&#xe6e2;</i></a></td>   	   ";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }

    case 'get': //获取答疑
    {
        $id=$_POST['id'];

        $sql="select * from dayi where dy_id =$id order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  = "$attr[0]*$attr[1]";
            }
        }
        echo  $result;
        break;
    }
}



