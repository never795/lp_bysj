<?php

class FJ extends db{
	public function info($id){
		return $this->D->where("gg_id = '$id'")->find(t_fujian);
	}

	public function add($arr){
		return $this->D->data($arr)->add(t_fujian);
	}
	
	public function del($id){
		return $this->D->where("fj_id = '$id'")->delete(t_fujian);
	}

	public function update($arr,$id){
		return $this->D->table(t_fujian)->where("fj_id = '$id'")->save($arr);
	}
}