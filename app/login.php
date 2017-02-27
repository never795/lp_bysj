<?php
class UserLogin extends db {
	public $havaUser = false;
	public $pass = "";
	public $id = "";

	public function getInfoByuserName($userName){
		
		$sql = "
			select * from ".t_login." where username='$userName'
		";
		$res =  $this->D->querys($sql);
		if(count($res)==1){
		 	$this->havaUser = true;
		 	$this->pass = $res[0]['password'];
		 	$this->id = $res[0]['login_id'];
		 	return $res[0];	
		}else{
			return false;
		} 	
	}

	public function comparePass($pass){
		if($pass == $this->pass){
			return true;
		}else{
			return false;
		}
	} 

	public function register($arr){
			$res =  $this->D->data($arr)->add(t_login);
			if($res){
				return $res;
			}else{
				false;
			}
	} 

	public function login($userName,$pass){
		$res = $this->getInfoByuserName($userName);
		if($res ){
			if($this->comparePass($pass)){
				set_session($res,SESSION_USER);
				$res['password'] = null;
				returnJson(0,$res);
			}else{
				returnJson(2);
			}
		}else{
			returnJson(2);
		}
	}

	public function update($arr,$where){
		if($this->D->table(t_login)->where($where)->save($arr)){
			return true;
		}else{
			return false;
		}
	}
}




	
	$type=get($GLOBALS[PARAMS]['TYPE']);
	$_user = is_login();
	$L = new UserLogin();
	if($type == 1){ //登陆
		if($_user){
			returnJson(5,$_user);
		}
		$L->login(get($GLOBALS[PARAMS]['userName']),get($GLOBALS[PARAMS]['passWord']));
	}else if($type == 2){//注册
		$L->getInfoByuserName(get($GLOBALS[PARAMS]['userName']));
		if($L->havaUser){
			returnJson(3);
		}else{
			$arr =  array();
			$arr['username'] = get($GLOBALS[PARAMS]['userName']);
			$arr['password'] = get($GLOBALS[PARAMS]['passWord']);
			$arr['phone_number'] = get($GLOBALS[PARAMS]['userPhone']);
			$arr['ID_number'] = get($GLOBALS[PARAMS]['userEmail']);
				
			if($L->register($arr)){
				returnJson(0);
			}else{
				returnJson(4);
			}
		}
	}else if($type == 3){//判断是否存在用户
		$L->getInfoByuserName(get($GLOBALS[PARAMS]['userName']));
		if($L->havaUser){
			returnJson(3);
		}else{
			returnJson(6);
		}
	}else if($type == 4){//注销
		if($_user){
			session_destroy(); 
		}
		returnJson(7);
	}else if($type == 5){//更新
		if(!$_user) returnJson(8);
		    $arr =  array();
			$arr['username'] = get($GLOBALS[PARAMS]['userName']);
			$arr['password'] = get($GLOBALS[PARAMS]['passWord']);
			$arr['phone_number'] = get($GLOBALS[PARAMS]['userPhone']);
			$arr['ID_number'] = get($GLOBALS[PARAMS]['userEmail']);
		if($L->update($arr,"login_id=".$_user['login_id'])){
			returnJson(10);
		}else{
			returnJson(11);
		}
	}else{ //其他登陆
		$L->login(get($GLOBALS[PARAMS]['userName']),get($GLOBALS[PARAMS]['passWord']));
	}





