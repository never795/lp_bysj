<?php
class draw extends db{

	public function getLan(){
		$sumLan="SELECT  pr.s,SUM(com.`land`) land FROM common com 
				INNER JOIN v_user_pr pr ON pr.`Id`=com.`common_ID`
				GROUP BY pr.s";

		$avgLan ="SELECT  pr.s,AVG(com.`land`) land FROM common com 
				INNER JOIN v_user_pr pr ON pr.`Id`=com.`common_ID`
				GROUP BY pr.s";
		$type=@$_REQUEST['type'];
		if($type){
			$res = $this->D->query($avgLan);
		}else{
			$res = $this->D->query($sumLan);
		}
		
		returnJson(0,$res);
	}

	public function drawData(){
		$type=get('type');
		$sql="";
		$option=array();
		$option['X']="省";
		switch ($type) {
			case 'lan':
				$sql="SELECT  pr.s,SUM(com.`land`) land FROM common com 
				INNER JOIN v_user_pr pr ON pr.`Id`=com.`common_ID`
				GROUP BY pr.s";
				break;
			case 'salary':
			$sql="
				SELECT pro X,
				COUNT(*) Y0,
				SUM(t.`month_salary`) Y1,
				AVG(t.`month_salary`) Y2
				FROM v_ng_info t
				GROUP BY pro
			";
			$option['title']="工资走势";
			$option['Y0']="人数";
			$option['Y1']="总工资";
			$option['Y2']="平均工资";
			$option['yMnuber']=3;
			break;

			case 'ng_number':
			$sql="
			SELECT t.`pro` X,COUNT(t.`ng_id`) Y0 FROM v_ng_info t GROUP BY t.`pro`
			";
			$option['title']="各省农民工人数";
			$option['Y0']="总人数";
			$option['yMnuber']=3;

			break;
			
			case 'poor':
			$sql="SELECT pro X,
					SUM(is_poor_famlay)/COUNT(*) Y0,
					SUM(is_poor_famlay) Y1,
					COUNT(*) Y2
					FROM v_ng_info
					GROUP BY pro";
			$option['title']="各省农民工贫困认定人数比例";
			$option['Y0']="比例";
			$option['Y1']="认定人数";
			$option['Y2']="总人数";
			$option['yMnuber']=3;
			break;
			case 'broken':
			$sql="SELECT pro X,
					SUM(is_broken)/COUNT(*) Y0,
					SUM(is_broken) Y1,
					COUNT(*) Y2
					FROM v_ng_info
					GROUP BY pro";
			$option['title']="各省单亲家庭人数比例";
			$option['Y0']="比例";
			$option['Y1']="单亲家庭数";
			$option['Y2']="总人数";
			$option['yMnuber']=3;
			break;
			case 'goHome':

			$sql="SELECT pro X,
					SUM(ng_is_yyhxgz)/COUNT(*) Y0,
					SUM(ng_is_yyhxgz) Y1,
					COUNT(*) Y2
					FROM v_ng_info
					GROUP BY pro";
			$option['title']="各省单亲家庭人数比例";
			$option['Y0']="意愿回乡比例";
			$option['Y1']="意愿回乡人数";
			$option['Y2']="总人数";
			$option['yMnuber']=3;
			break;

			case 'education':
			$sql="
				SELECT pro X,
				COUNT(*) Y0,
				SUM(CASE WHEN education = '1' THEN 1 ELSE 0 END) Y1,
				SUM(CASE WHEN education = '1' THEN 1 ELSE 0 END)/COUNT(*) Y2,
				SUM(CASE WHEN education = '2' THEN 1 ELSE 0 END) Y3,
				SUM(CASE WHEN education = '2' THEN 1 ELSE 0 END)/COUNT(*) Y4,
				SUM(CASE WHEN education = '3' THEN 1 ELSE 0 END) Y5,
				SUM(CASE WHEN education = '3' THEN 1 ELSE 0 END)/COUNT(*) Y6,
				SUM(CASE WHEN education = '4' THEN 1 ELSE 0 END) Y7,
				SUM(CASE WHEN education = '4' THEN 1 ELSE 0 END)/COUNT(*) Y8,
				SUM(CASE WHEN education = '5' THEN 1 ELSE 0 END) Y9,
				SUM(CASE WHEN education = '5' THEN 1 ELSE 0 END)/COUNT(*) Y10,
				SUM(CASE WHEN education = '6' THEN 1 ELSE 0 END) Y11,
				SUM(CASE WHEN education = '6' THEN 1 ELSE 0 END)/COUNT(*) Y12,
				SUM(CASE WHEN education = '7' THEN 1 ELSE 0 END) Y13,
				SUM(CASE WHEN education = '7' THEN 1 ELSE 0 END)/COUNT(*) Y14
				FROM v_ng_info
				GROUP BY pro
			";
			$option['title']="教育";
			$option['Y0']="总人数";
			$option['Y1']="小学学历人数";
			$option['Y2']="小学学历人数比例";
			$option['Y3']="初中学历人数";
			$option['Y4']="初中学历人数比例";
			$option['Y5']="高中学历人数";
			$option['Y6']="高中学历人数比例";
			$option['Y7']="中专学历人数";
			$option['Y8']="中专学历人数比例";
			$option['Y9']="大专学历人数";
			$option['Y10']="大专学历人数比例";
			$option['Y11']="其他学历人数";
			$option['Y12']="其他学历人数比例";
			$option['Y13']="大学学历人数";
			$option['Y14']="大学学历人数比例";
			$option['yMnuber']=15;
			break;
			default:
				# code...
				break;
		}

		$res = $this->D->query($sql);

		if(isset($_GET['exp'])){
			include "common/ExcelToArrary.php";
			$option['title']="";
			$option['yMnuber']="";
			
			// print_r($option);
			// print_r($res);
			// exit();
			$exl = new ExcelToArrary();
			$exl->push($option,$res,$type);
		}else{
			if($res){
				returnJson(0,array("darwData"=>$res,'option'=>$option));
			}else{
				returnJson(-1);
			}
		}
	}
	
}