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

	public function register($userName,$pass,$phone,$email){
			$sql = "insert into ".t_login." (username,password,phone_number,ID_number)
			values('$userName','$pass','$phone','$email')
			" ;
			$res =  $this->D->query($sql);
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


}




	
	$type=get($GLOBALS[PARAMS]['TYPE']);

	$L = new UserLogin();
	if($type == 1){ //登陆
		$_user = is_login();
			if($_user){
				returnJson(5,$_user);
			}

		$L->login(get($GLOBALS[PARAMS]['userName']),get($GLOBALS[PARAMS]['passWord']));
	}else if($type == 2){//注册
		$L->getInfoByuserName(get($GLOBALS[PARAMS]['userName']));
		if($L->havaUser){
			returnJson(3);
		}else{
			if($L->register(get($GLOBALS[PARAMS]['userName']),get($GLOBALS[PARAMS]['passWord']),get($GLOBALS[PARAMS]['userPhone']),get($GLOBALS[PARAMS]['userEmail']))){
				returnJson(0);
			}else{
				returnJson(4);
			}
		}
	}else if($type == 3){
		$L->getInfoByuserName(get($GLOBALS[PARAMS]['userName']));
		if($L->havaUser){
			returnJson(3);
		}else{
			returnJson(6);
		}
	}else if($type == 4){
		$_user = is_login();
		if($_user){
			session_destroy(); 
		}
		returnJson(7);
	}





