<?php


/*获取参数*/
function get($c){
	if(isset($_REQUEST[$c])){
		return $_REQUEST[$c];
	}else{
		exit($GLOBALS['error'][9999].$c);
	}
}

function returnJson($code=-1,$data="",$other=""){
	if(is_array($code)){
		$data = $code;
		$code = 0;
	}else if($code === true){
		$code = 0;
	}else if($code === false){
		$code = -1;
	}
	$res = array();
	$res['code'] = $code;
	$res['msg'] = $GLOBALS['error'][$code];	
	if($other){
		$res['other'] = $other;
	}
	$res['data'] = $data;

	$res['sql'] = $GLOBALS["sql"]; 
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

