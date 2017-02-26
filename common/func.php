<?php


/*获取参数*/
function get($c){
	if(!in_array($c,$GLOBALS[PARAMS])){
		exit($GLOBALS['error'][9998].$c);
	}
	if(isset($_REQUEST[$c])){
		return $_REQUEST[$c];
	}else{
		exit($GLOBALS['error'][9999].$c);
	}
	
}

function returnJson($code=-1,$data=null){
	$res = array('data'=>0,'code'=>-1);
	if(IS_RETURN_MSG){
			$res['data'] = $data;
			$res['code'] = $code;
			$res['msg'] = $GLOBALS['error'][$code];	
	}else{
			$res['data'] = $data;
			$res['code'] = $code;
	}

		

	$callBack = @$_REQUEST['callBack'];
	if($callBack){
		echo $callBack.'('.json_encode($res).')';
	}else{
		echo json_encode($res);
	}
	
	exit();
}

function loog($e){
	 print_r($e); 
}

function is_login(){
	if(get_session(SESSION_USER)){
		return get_session(SESSION_USER);
	}else{
		return false;
	}
}


function get_session($d){
	if(isset($_SESSION[$d])){
		return $_SESSION[$d];
	}else{
		return false;
	}
}

function set_session($d,$c){
	 $_SESSION[$c] = $d;
}