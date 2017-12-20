<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case 'add'://便民添加
    {
        $title=$_POST['title'];
        $content=$_POST['content'];
        $editor=$_POST['editor'];
        $time=@date("Y-m-d H:i:s", time()+8*60*60);
        $sql = "insert into bianmin(title,detail,addtime,editer,browse,state) values('$title','$content','$time','$editor',0,'草稿')";

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
    case 'edit'://便民编辑
    {
        $id=$_POST['arrtid'];

        $title=$_POST['title'];
        $content=$_POST['content'];
        $editor=$_POST['editor'];
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        $sql = "update bianmin set title='$title',detail='$content',editer='$editor',addtime='$time' where id=$id ";

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
    case 'delete'://便民删除
    {
        $id=$_POST['id'];

        $sql = "delete from  bianmin  where id=$id ";

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
    case 'switch'://便民切换
    {
        $id=$_POST['id'];
        $sql="select * from bianmin where id =$id order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  = "$attr[6]";
            }
        }
        if($result  =="发布")
        $sql = "update  bianmin set state='草稿'  where id=$id ";
    else
        $sql = "update  bianmin set state='发布'  where id=$id ";

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
    case 'list': //便民列表
    {
        $time=@date("Y-m-d H:i:s", time()+8*60*60);
        $sqlinsert = "insert into operate(type,addtime) values('2','$time')";
        $rinsert = $db->query($sqlinsert);
        $result="";
        $count =1;
        $sql=" select * from bianmin order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {

                $result  .=  "	<tr class='text-c'><td>$count</td><td class='text-l'><u style='cursor:pointer' class='text-primary' onClick='alert($attr[2])' title='查看'>$attr[1]</u></td><td>新闻资讯</td>	<td>$attr[3]</td><td>$attr[5]</td> <td class='td-status'><span class='label label-success radiu'>$attr[6]</span></td> <td class=\"f-14 td-manage\"><a style=\"text-decoration:none\" onClick=\"bianmin_shenhe(this,$attr[0])\" href=\"javascript:;\" title=\"审核\"><i class=\"Hui-iconfont\">&#xe603;</i></a> <a style=\"text-decoration:none\" class=\"ml-5\" onClick=\"bianmin_edit('便民编辑','bianmin-edit.html?id=$attr[0]','10001')\" href=\"javascript:;\" title=\"编辑\"><i class=\"Hui-iconfont\">&#xe6df;</i></a> <a style='text-decoration:none' class='ml-5' onClick='bianmin_del(this,$attr[0])' href='javascript:;' title='删除'><i class='Hui-iconfont'>&#xe6e2;</i></a></td></tr>";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'search'://便民查找
    {
        $min=$_POST['min'];
        $max=$_POST['max'];

        $zixunname=$_POST['zixunname'];
        $result="";
        $count =1;
        $sql=" select * from bianmin where addtime between '$min' and  '$max' and title like '%$zixunname%' order by addtime desc";

        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  "	<tr class='text-c'><td>$count</td><td class='text-l'><u style='cursor:pointer' class='text-primary' onClick='alert($attr[2])' title='查看'>$attr[1]</u></td><td>新闻资讯</td>	<td>$attr[3]</td><td>$attr[5]</td>	<td class='td-status'><span class='label label-success radiu'>$attr[6]</span></td> <td class=\"f-14 td-manage\"><a style=\"text-decoration:none\" onClick=\"bianmin_shenhe(this,$attr[0])\" href=\"javascript:;\" title=\"审核\"><i class=\"Hui-iconfont\">&#xe603;</i></a> <a style=\"text-decoration:none\" class=\"ml-5\" onClick=\"bianmin_edit('资讯编辑','bianmin-edit.html?id=$attr[0]','10001')\" href=\"javascript:;\" title=\"编辑\"><i class=\"Hui-iconfont\">&#xe6df;</i></a> <a style='text-decoration:none' class='ml-5' onClick='bianmin_del(this,$attr[0])' href='javascript:;' title='删除'><i class='Hui-iconfont'>&#xe6e2;</i></a></td></tr>";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'detail'://便民详细
    {
        $id=$_POST['id'];
        $result="";
        $sql="select * from bianmin where id =$id order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  $attr[2];
            }
        }
        echo  $result;
        break;
    }
    case 'get'://获取便民信息
    {
        $id=$_POST['id'];

        $sql="select * from bianmin where id =$id order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  = "$attr[0]*$attr[1]*$attr[2]";
            }
        }
        echo  $result;
        break;
    }
}



