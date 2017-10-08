<?php
class ExcelToArrary{

       public function __construct() {

              /*导入phpExcel核心类    注意 ：你的路径跟我不一样就不能直接复制*/
               include_once('PHPExcel-1.8/Classes/PHPExcel.php');
       }

     /* 导出excel函数*/
    public function push($title,$data,$name='Excel'){

          error_reporting(E_ALL);
          date_default_timezone_set('Europe/London');
         $objPHPExcel = new PHPExcel();

        /*以下是一些设置 ，什么作者  标题啊之类的*/
         $objPHPExcel->getProperties()->setCreator("ng")
                               ->setLastModifiedBy("lp")
                               ->setTitle("exl")
                               ->setSubject("exlExp")
                               ->setDescription("share")
                               ->setKeywords("excel")
                              ->setCategory("result file");
         /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
         for ($i=0; $i < count($data); $i++) { 
            //设置表头
            if($i==0){
              $num=65; //65  =>A
              foreach($title as $k => $v){
                if($v){
                     if(!isset($data[$i][$k])){header("Content-Type: text/html; charset=UTF-8");exit("不存在下标".$k);}
                      $objPHPExcel->setActiveSheetIndex(0)
                                   ->setCellValue(chr($num)."1",$v)   // 设置表头A1，B1，C1 一次类推 对应的名字
                                   ->setCellValue(chr($num)."2",$data[$i][$k]); //肯定有第一航数据 
                                  // echo $v.$data[$i][$k];
                                   $num++;
                }
              }
            }else{
              $num=65; //65 =>A   A3
              foreach($title as $k => $v){
                if($v){;
                   $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($num).($i+2),$data[$i][$k]);
                   $num++;
                 }
              }

            }
         }
            ob_end_clean() ;
            $objPHPExcel->getActiveSheet()->setTitle('User');
            $objPHPExcel->setActiveSheetIndex(0);
           
             header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'.$name.'.xls"');
             header('Cache-Control: max-age=0');
             $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                 //  var_dump($objWriter);exit();
             $objWriter->save('php://output');
             exit;
      }

}

