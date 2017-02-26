<?php
class CommonInfo extends db{
	public $id = null;
	public $info = null;
	public function getInfoByLoginId($LoginId){
		$sql = "select * from ".t_info." where common_ID='$LoginId'";
		$this->info = $this->D->querys($sql);
		if($this->info){
			return $this->info;
		}else{
			return false;
		}
	}

	public updateInfo(){
		
	}
}



 ;
if(!is_login()){
	returnJson(8);
}

$type=get($GLOBALS[PARAMS]['TYPE']);
if($type == 1){
	$login_ID = is_login();
	$info = new  CommonInfo();
	if($info->getInfoByLoginId($login_ID['login_id'])){
		returnJson(0,$info->info);
	}else{
		returnJson(9);
	}
}else if($type == 2){

}
