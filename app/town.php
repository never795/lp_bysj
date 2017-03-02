<?php
class town extends db{

	public function info($id){
		$this->D->table(t_town)->where("login_id = $id");
	}

	public function update($arr){
		return $this->D->table(t_town)->save($arr);
	}

	public function add($arr){
		return $this->D->table(t_town)->data($arr)->add();
	}

	public function del($where){
		return  $this->D->table(t_town)->where->($where)->delete();	
	}

}

$town = array();
$town['news']
$town['news_title']
$town['news_zy']
$town['publish_time']
$town['town_remark']