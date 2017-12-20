<?php
class exSql extends db{

	public function ex(){
		$sql  = @$_POST['sql'];
		if ($sql){
			$res = $this->D->Query($sql);
			if ($res){
				returnJson($res);
			}else{
				returnJson(-1);
			}
		}else{
			returnJson(-1);
		}
		
	}
}
