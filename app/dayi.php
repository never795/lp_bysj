<?php
class dayi extends db{

	public function info($id){
		$this->D->table(t_dayi)->where("login_id = $id");
	}

	public function update($arr){
		return $this->D->table(t_dayi)->save($arr);
	}

	public function add($arr){
		return $this->D->table(t_dayi)->data($arr)->add();
	}

	public function del($where){
		return  $this->D->table(t_dayi)->where->($where)->delete();	
	}

}

$dayi = array();
$dayi['login_id']
$dayi['cousult']
$dayi['answer']
$dayi['dy_time']
$dayi['huifuzt']
$dayi['dy_remaker']