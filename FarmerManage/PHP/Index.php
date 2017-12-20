<?php
	
include("Connect.php");//引入链接数据库
$type=$_POST['type'];

switch ($type)
{
    case 'xinwen': //获取新闻
    {
 
        $result="<ul class='news-bar'>";
        $sql="select * from xinwen where state='发布' order by addtime desc  limit 5 ";  //根据发布时间查找前五的新闻
     
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) { //HTML拼接
                $result  .=  "<li><a href='新闻资讯详情.html?id=$attr[0]' ><span class='fl news-title' onmouseover='this.title=this.innerText;'>$attr[1]</span><span class='fr'>$attr[3]</span></a></li>";

            }
        }
            echo  $result;
        break;
    }
    case 'bianmin'://获取便民
    {
        $result="<ul class='bm-infor'>";
        $sql="select *  from bianmin where state='发布'  order by addtime desc limit 6 ";//根据发布时间查找前五的便民信息
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {//HTML拼接
                $result  .=  "<li><a href='便民信息详情.html?id=$attr[0]'><span class='bm-infor-title' onmouseover='this.title=this.innerText;'>$attr[1]</span><span class='bm-infor-time'>$attr[3]</span><span class='publisher'>$attr[4]</span></a></li>";

            }
        }
        echo  $result;
        break;
    }

}




