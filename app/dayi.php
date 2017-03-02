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
$dayi['login_id']=get($GLOBALS[PARAMS]['1']);
$dayi['cousult']=get($GLOBALS[PARAMS]['2']);
$dayi['answer']=get($GLOBALS[PARAMS]['3']);
$dayi['dy_time']=get($GLOBALS[PARAMS]['4']);
$dayi['huifuzt']=get($GLOBALS[PARAMS]['5']);
$dayi['dy_remaker']=get($GLOBALS[PARAMS]['6']);