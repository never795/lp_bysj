<?php
class job extends db{

	public function info($id){
		$this->D->table(t_job)->where("login_id = $id");
	}

	public function update($arr){
		return $this->D->table(t_job)->save($arr);
	}

	public function add($arr){
		return $this->D->table(t_job)->data($arr)->add();
	}

	public function del($where){
		return  $this->D->table(t_job)->where->($where)->delete();	
	}


}


$job = array();
$job[' job_hangye'] =get($GLOBALS[PARAMS]['1']);
$job[' baoxian'] = get($GLOBALS[PARAMS]['2']);
$job[' bx_type'] = get($GLOBALS[PARAMS]['3']);
$job[' ldht'] = get($GLOBALS[PARAMS]['4']);
$job[' yuexin'] = get($GLOBALS[PARAMS]['5']);
$job[' return_work'] = get($GLOBALS[PARAMS]['6']);
$job[' return_chuangye'] = get($GLOBALS[PARAMS]['7']);
$job[' job_train'] = get($GLOBALS[PARAMS]['8']);
$job[' train_type'] = get($GLOBALS[PARAMS]['9']);