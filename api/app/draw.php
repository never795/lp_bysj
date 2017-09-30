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
	
}