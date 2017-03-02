<?php
class zhaopin extends db{

	public function info($id){
		$this->D->table(t_zhaopin)->where("login_id = $id");
	}

	public function update($arr){
		return $this->D->table(t_zhaopin)->save($arr);
	}

	public function add($arr){
		return $this->D->table(t_zhaopin)->data($arr)->add();
	}

	public function del($where){
		return  $this->D->table(t_zhaopin)->where->($where)->delete();	
	}

}

$zhaopin =array();
$zhaopin['zpfbh'] = get($GLOBALS[PARAMS]['1']);
$zhaopin['zpf_name']=get($GLOBALS[PARAMS]['2']);
$zhaopin['zp_post']=get($GLOBALS[PARAMS]['3']);
$zhaopin['zp_require']=get($GLOBALS[PARAMS]['4']);
$zhaopin['zp_renshu']=get($GLOBALS[PARAMS]['5']);
$zhaopin['pay_rule']=get($GLOBALS[PARAMS]['6']);
$zhaopin['zp_start']=get($GLOBALS[PARAMS]['7']);
$zhaopin['zp_end']=get($GLOBALS[PARAMS]['8']);
$zhaopin['work_time']=get($GLOBALS[PARAMS]['9']);
$zhaopin['zp_remark']=get($GLOBALS[PARAMS]['0']);