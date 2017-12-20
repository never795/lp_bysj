<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case'list' : //进入的时候操作记录添加
    {
        $time=date("Y-m-d H:i:s", time()+8*60*60);
        $sqlinsert = "insert into operate(type,addtime) values('3','$time')";
        $rinsert = $db->query($sqlinsert);
    }
    case 'outstatistic': //外出统计
    {
        $result="";
        $name=$_POST['name'];
        $VillageName="";
        $count =0;
        $incomecount =0;

        $sql=" select * from workerinfo where huji_addr like '%$name%' ";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $incomecount =$incomecount+$attr[13];
                $VillageName=$attr[5];
                $count=$count+1;
            }
        }

        $result = $VillageName.'*'.$count.'*'.( round($incomecount/$count,2));

        echo  $result;
        break;
    }
    case 'outstatisticdetail'://外出统计详细
    {
        $result="";
        $name=$_POST['name'];
        $count =0;
        $sql=" select * from workerinfo where huji_addr like '%$name%' ";
        $r = $db->query($sql);
        if($r)//条件
        {
            while ($attr = $r->fetch_row()) {
                $sql2=" select  * from common where common_id = $attr[1]";
                $r2 = $db->query($sql2);
                if($r2)//条件
                {
                    while ($attr2 = $r2->fetch_row()) {
                        $result  .=  " <tr class=\"text-c\"> <td><a href='worker-detail.html?id=$attr[0]'>$attr[3]</a></td> <td>$attr[14]</td> <td>$attr[7]</td>  <td>$attr[16]</td> <td>$attr[13]</td>";
                    }
                }
            }
        }
        echo  $result;
        break;
    }
    case 'get':
    {
        $result="";
        $id=$_POST['id'];
        $count =0;
        $sql=" select * from workerinfo where common_id =$id";
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
               $result  =  "$attr[3]*$attr[4]*$attr[5]*$attr[9]*$attr[10]*$attr[11]*$attr[12]*$help";
            }
        }
        echo  $result;
        break;
    }

}



