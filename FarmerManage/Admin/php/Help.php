<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case'list' ://操作记录添加
    {
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        $sqlinsert = "insert into operate(type,addtime) values('4','$time')";
        $rinsert = $db->query($sqlinsert);
    }
    case 'help': //困难帮扶
    {

        $result="";
        $name=$_POST['name'];

        $sql=" select * from workerinfo where name like '%$name%' ";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $help="";
                 if($attr[13]<=1200)
                     $help="特困";
                if($attr[13]>1200 && $attr[13]<=1800)
                    $help="困难";
                if($attr[13]>1800 && $attr[13]<=3000)
                    $help="一般";
                else
                    $help="正常";
                $result  .=  " <tr class=\"text-c\"> <td>$attr[3]</td> <td> $help</td>  <td>$attr[15]</td>";
            }
        }
        echo  $result;
        break;
    }


}



