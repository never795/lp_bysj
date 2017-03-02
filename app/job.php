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
$job[' job_hangye']
$job[' baoxian']
$job[' bx_type']
$job[' ldht']
$job[' yuexin']
$job[' return_work']
$job[' return_chuangye']
$job[' job_train']
$job[' train_type']