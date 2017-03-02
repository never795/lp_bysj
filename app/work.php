<?php
class work extends db{

	public function info($id){
		$this->D->table(t_work)->where("login_id = $id");
	}

	public function update($arr){
		return $this->D->table(t_work)->save($arr);
	}

	public function add($arr){
		return $this->D->table(t_work)->data($arr)->add();
	}

	public function del($where){
		return  $this->D->table(t_work)->where->($where)->delete();	
	}

}
$work = array();
$work['common_ID']=get($GLOBALS[PARAMS]['1']);
$work['login_ID']=get($GLOBALS[PARAMS]['2']);
$work['age']=get($GLOBALS[PARAMS]['3']);
$work['huji_addr']=get($GLOBALS[PARAMS]['4']);
$work['huji_xingzhi']=get($GLOBALS[PARAMS]['5']);
$work['photo']=get($GLOBALS[PARAMS]['6']);
$work['date_birth']=get($GLOBALS[PARAMS]['7']);
$work['zzmm']=get($GLOBALS[PARAMS]['8']);
$work['edu']=get($GLOBALS[PARAMS]['9']);
$work['buy_house']=get($GLOBALS[PARAMS]['0']);
$work['build_house']=get($GLOBALS[PARAMS]['10']);