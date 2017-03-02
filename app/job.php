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