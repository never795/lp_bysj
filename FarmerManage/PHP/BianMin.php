<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case 'list': //获取列表
    {
        $result="<ul id='notice-list' class='list-ul'>";
        $sql="select * from bianmin where state='发布' order by addtime desc"; //根据时间查询
        $r = $db->query($sql); //执行语句
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {  //代码拼接，返回前端
                $result  .=  "<li><span class='bmxx-title'><a href=\"便民信息详情.html?id=$attr[0]\" onmouseover='this.title=this.innerText;'>$attr[1]</a></span><span class='bmxx-time'>$attr[3]</span><span class='bmxx-faburen'>$attr[4]</span></li>";

            }
        }
        echo  $result;  //返回拼接好的HTML代码到前端
        break;
    }
    case 'detail'://获取新闻详细
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
        $sqladd = "update bianmin set browse=browse+1 where id =$id";
        $raddt = $db->query($sqladd);
        echo  $result;
        break;
    }
}





