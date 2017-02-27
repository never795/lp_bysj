<?php
class CommonInfo extends db{
	public $info = null;
	private $T;
	public $id;
	public function init(){
		$id = is_login();
		if($id){
			$this->id = $id['login_id'];
		}else{
			returnJson(8);
		}

		$this->T = $this->D->table(t_info)->where("common_ID='$this->id'");
		$this->info = $this->T->find();
	}
	public function getInfoByLoginId(){
		if($this->info){
			return $this->info;
		}else{
			return false;
		}
	}

	public function updateInfo($arr){
		if($this->T->save($arr)){
			return true;
		}else{
			return false;
		}
	}
}



 ;
if(!is_login()){
	returnJson(8);
}
$info = new  CommonInfo();
$info->init();
$type=get($GLOBALS[PARAMS]['TYPE']);
if($type == 1){
	$login_ID = is_login();
	if($info->getInfoByLoginId()){
		returnJson(0,$info->info);
	}else{
		returnJson(9);
	}
}else if($type == 2)
{
	$arr = array();
	$arr['now_addr'] = get($GLOBALS[PARAMS]['now_addr']);
	$arr['worktime'] = get($GLOBALS[PARAMS]['worktime']);
	$arr['land'] = get($GLOBALS[PARAMS]['land']);
	$arr['jtkn'] = get($GLOBALS[PARAMS]['jtkn']);
	$arr['knqk'] = get($GLOBALS[PARAMS]['knqk']);
	$arr['lset'] = get($GLOBALS[PARAMS]['lset']);
	$arr['lslr'] = get($GLOBALS[PARAMS]['lslr']);
	if($info->updateInfo($arr)){
		returnJson(0);
	}else{
		returnJson(1);
	}
}
