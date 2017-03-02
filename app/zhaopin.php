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
$zhaopin['zpfbh']
$zhaopin['zpf_name']
$zhaopin['zp_post']
$zhaopin['zp_require']
$zhaopin['zp_renshu']
$zhaopin['pay_rule']
$zhaopin['zp_start']
$zhaopin['zp_end']
$zhaopin['work_time']
$zhaopin['zp_remark']