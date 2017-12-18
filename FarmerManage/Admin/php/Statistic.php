<?php
$type=$_POST['type'];
include("Connect.php");//引入链接数据库
switch ($type)
{
    case'total' : //总数
    {
        $sql1 = "select * from operate where type=1";
        $countSelect1= $db->query($sql1);
        $count1= mysqli_num_rows($countSelect1);

        $sql2 = "select * from operate where type=2";
        $countSelect2= $db->query($sql2);
        $count2= mysqli_num_rows($countSelect2);

        $sql3 = "select * from operate where type=3 ";
        $countSelect3= $db->query($sql3);
        $count3= mysqli_num_rows($countSelect3);

        $sql4 = "select * from operate where type=4 ";
        $countSelect4= $db->query($sql4);
        $count4= mysqli_num_rows($countSelect4);

        $sql5 = "select * from operate where type=5 ";
        $countSelect5= $db->query($sql5);
        $count5= mysqli_num_rows($countSelect5);

        $sql6 = "select * from operate where type=6 ";
        $countSelect6= $db->query($sql6);
        $count6= mysqli_num_rows($countSelect6);


        $sql7 = "select * from operate where type=7 ";
        $countSelect7= $db->query($sql7);
        $count7= mysqli_num_rows($countSelect7);
        echo $count1.'*'.$count2.'*'.$count3.'*'.$count4.'*'.$count5.'*'.$count6.'*'.$count7;
        break;
    }
    case'lastday' ://昨天统计
    {
        $sql1 = "select * from operate where type=1 and  date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect1= $db->query($sql1);
        $count1= mysqli_num_rows($countSelect1);

        $sql2 = "select * from operate where type=2 and date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect2= $db->query($sql2);
        $count2= mysqli_num_rows($countSelect2);

        $sql3 = "select * from operate where type=3 and date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect3= $db->query($sql3);
        $count3= mysqli_num_rows($countSelect3);

        $sql4 = "select * from operate where type=4 and date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect4= $db->query($sql4);
        $count4= mysqli_num_rows($countSelect4);

        $sql5 = "select * from operate where type=5 and date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect5= $db->query($sql5);
        $count5= mysqli_num_rows($countSelect5);

        $sql6 = "select * from operate where type=6 and date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect6= $db->query($sql6);
        $count6= mysqli_num_rows($countSelect6);


        $sql7 = "select * from operate where type=7 and date(addtime)=curdate()-INTERVAL 1 day";
        $countSelect7= $db->query($sql7);
        $count7= mysqli_num_rows($countSelect7);
        echo $count1.'*'.$count2.'*'.$count3.'*'.$count4.'*'.$count5.'*'.$count6.'*'.$count7;
        break;
    }
    case'today' ://今天统计
    {
        $sql1 = "select * from operate where type=1 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect1= $db->query($sql1);
        $count1= mysqli_num_rows($countSelect1);

        $sql2 = "select * from operate where type=2 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect2= $db->query($sql2);
        $count2= mysqli_num_rows($countSelect2);

        $sql3 = "select * from operate where type=3 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect3= $db->query($sql3);
        $count3= mysqli_num_rows($countSelect3);

        $sql4 = "select * from operate where type=4 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect4= $db->query($sql4);
        $count4= mysqli_num_rows($countSelect4);

        $sql5 = "select * from operate where type=5 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect5= $db->query($sql5);
        $count5= mysqli_num_rows($countSelect5);

        $sql6 = "select * from operate where type=6 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect6= $db->query($sql6);
        $count6= mysqli_num_rows($countSelect6);


        $sql7 = "select * from operate where type=7 and TO_DAYS(AddTime) = TO_DAYS(NOW())";
        $countSelect7= $db->query($sql7);
        $count7= mysqli_num_rows($countSelect7);
        echo $count1.'*'.$count2.'*'.$count3.'*'.$count4.'*'.$count5.'*'.$count6.'*'.$count7;
        break;
    }
    case'week' ://本周统计
    {
        $sql1 = "select * from operate where type=1 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now()) ";
        $countSelect1= $db->query($sql1);
        $count1= mysqli_num_rows($countSelect1);

        $sql2 = "select * from operate where type=2 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now())";
        $countSelect2= $db->query($sql2);
        $count2= mysqli_num_rows($countSelect2);

        $sql3 = "select * from operate where type=3 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now())";
        $countSelect3= $db->query($sql3);
        $count3= mysqli_num_rows($countSelect3);

        $sql4 = "select * from operate where type=4 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now())";
        $countSelect4= $db->query($sql4);
        $count4= mysqli_num_rows($countSelect4);

        $sql5 = "select * from operate where type=5 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now())";
        $countSelect5= $db->query($sql5);
        $count5= mysqli_num_rows($countSelect5);

        $sql6 = "select * from operate where type=6 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now())";
        $countSelect6= $db->query($sql6);
        $count6= mysqli_num_rows($countSelect6);


        $sql7 = "select * from operate where type=7 and YEARWEEK(date_format(addtime,'%Y-%m-%d')) = YEARWEEK(now())";
        $countSelect7= $db->query($sql7);
        $count7= mysqli_num_rows($countSelect7);
        echo $count1.'*'.$count2.'*'.$count3.'*'.$count4.'*'.$count5.'*'.$count6.'*'.$count7;
        break;
    }
    case'month' ://本月统计
    {
        $sql1 = "select * from operate where type=1 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m') ";
        $countSelect1= $db->query($sql1);
        $count1= mysqli_num_rows($countSelect1);

        $sql2 = "select * from operate where type=2 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m')";
        $countSelect2= $db->query($sql2);
        $count2= mysqli_num_rows($countSelect2);

        $sql3 = "select * from operate where type=3 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m')";
        $countSelect3= $db->query($sql3);
        $count3= mysqli_num_rows($countSelect3);

        $sql4 = "select * from operate where type=4 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m')";
        $countSelect4= $db->query($sql4);
        $count4= mysqli_num_rows($countSelect4);

        $sql5 = "select * from operate where type=5 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m')";
        $countSelect5= $db->query($sql5);
        $count5= mysqli_num_rows($countSelect5);

        $sql6 = "select * from operate where type=6 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m')";
        $countSelect6= $db->query($sql6);
        $count6= mysqli_num_rows($countSelect6);


        $sql7 = "select * from operate where type=7 and date_format(addtime,'%Y-%m')=date_format(now(),'%Y-%m')";
        $countSelect7= $db->query($sql7);
        $count7= mysqli_num_rows($countSelect7);
        echo $count1.'*'.$count2.'*'.$count3.'*'.$count4.'*'.$count5.'*'.$count6.'*'.$count7;
        break;
    }

}



