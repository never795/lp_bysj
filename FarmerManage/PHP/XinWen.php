<?php

$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case 'list':  //获取新闻列表
    {
    	
        $result="<ul id='notice-list' class='list-ul'>";
        $sql="select * from xinwen where state='发布' order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  "<li><span class='notice-link-cont'><a href='新闻资讯详情.html?id=$attr[0]' onmouseover='this.title=this.innerText;'>$attr[1]<i class='notice-admin'>【编辑员$attr[4]】</i></a></span><time class='notice-time'>$attr[3]</time></li>";
            }
        }
        echo  $result;
        break;
    }
    case 'detail':  //获取新闻详细
    {
        $id=$_POST['id'];
        $result="";
        $sql="select * from xinwen where id =$id order by addtime desc";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $result  .=  $attr[2];
            }
        }
        $sqladd = "update xinwen set browse=browse+1 where id =$id";
        $raddt = $db->query($sqladd);
        echo  $result;
        break;
    }
}



