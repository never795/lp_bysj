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
$work['common_ID']
$work['login_ID']
$work['age']
$work['huji_addr']
$work['huji_xingzhi']
$work['photo']
$work['date_birth']
$work['zzmm']
$work['edu']
$work['buy_house']
$work['build_house']