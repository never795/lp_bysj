<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case 'list': //获取答疑列表
    {
        $result="";
        $sql="select * from dayi order by addtime desc"; //SQL语句
        $r = $db->query($sql);
        if($r)//条件
        {
            $count=1;
            while ($attr = $r->fetch_row()) { //HTML代码拼接
                $result  .=  "<div class='replies-cont'>	<div class='clearfix replies-resourceInfor-box'>	 <div class='replies-floor fl'>$count 楼</div>";
                $result  .=  "<div class='replies-person-infor f'><a href=''#' class='link-color'>$attr[9]</a><u class='class-tip-color'>$attr[6]</u><time class='fr replies-time'>$attr[8]</time></div></div>	";
                $result  .= "	<p>$attr[1]</p>";
                $result  .= "	<div class='admin-replies'>";
                $result  .= "	<h4>$attr[7]&nbsp;[管理员]&nbsp;回复：<span>$attr[4]</span></h4>";
                $result  .= "	<p>$attr[2]</p></div></div>";
                $count=$count+1;
            }
        }
        echo  $result;
        break;
    }
    case 'add': //答疑添加
    {
        $txt=$_POST['liuyan']; //获取留言内容
        $name=$_POST['name']; //获取留言人
        $type;
        if($name=="")
        {
            $name="匿名";
            $type="游客";
        }
        else
            $type="群众";
        $time=date("Y-m-d H:i:s");
        $sql = "insert into dayi(consult,login_name,login_type,addtime) values('$txt','$name','$type','$time')";  //插入留言SQL语句
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
}





