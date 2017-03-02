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
$town['news']=get($GLOBALS[PARAMS]['1']);
$town['news_title']=get($GLOBALS[PARAMS]['2']);
$town['news_zy']=get($GLOBALS[PARAMS]['3']);
$town['publish_time']=get($GLOBALS[PARAMS]['4']);
$town['town_remark']=get($GLOBALS[PARAMS]['5']);