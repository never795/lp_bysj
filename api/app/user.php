<?php
/*
用户角色相关
 */
class user extends db {

	private $table_user = "lp_user";
	private $table_role = "lp_role";
	private $table_part = "part";
	private $table_menu = "lp_menu";
	private $table_menu_role = "lp_role_menu";

	public function page($s=0,$l=10){
		$res = $this->D->table($this->table_user)->page($s,$l);
		returnJson($res);
	}

	//添加用户
	public function userAdd(){
		$user=array();
		$user['lp_username']=get('lp_username');
		$user['lp_password']=get('lp_password');
		$user['lp_role']=get('lp_role');
		if($this->getUserByuserNamw($user['lp_username'])){
			returnJson(3);
		}
		$res = $this->D->table($this->table_user)->add($user);
		returnJson($res);
	} 

	//通过姓名查询用户
	public function getUserByuserNamw($u){
		$res = $this->D->table($this->table_user)->where(" lp_username='".$u."'")->select();
		return $res;
	}
	//删除用户
	public function delUser($d){
		$res = $this->D->table($this->table_user)->where(" user_Id='".$d."'")->delete();
		returnJson(0,$res);
	}

	//更新用户信息
	public function update($update){
		if(!isset($update['user_Id'])){
			returnJson(9999,"user_Id");
		}
		$id = $update['user_Id'];
		$res = $this->D->table($this->table_user)->where("user_Id='".$id."'")->update($update);
		returnJson($res);
	}

 	public function addRole(){
		$role=array();
		$role['lp_name']=get('n');
		$role['lp_ext']=get('r');
		//添加到角色表
		$res = $this->D->table($this->table_role)->add($role);
		//关联菜单
		$men = get('m');
		$arrayMenu=explode(",",$men); 
		for ($i=0; $i < count($arrayMenu); $i++) { 
			if($arrayMenu[$i]){
				$this->addRoleMenu($arrayMenu[$i],$res);
			}
		}
		returnJson($res);
	} 

	public function addRoleMenu($m,$r){
		$role=array();
		$role['lp_menu_id']=$m;
		$role['lp_role_id']=$r;
		//添加到角色表
		$res = $this->D->table($this->table_menu_role)->add($role);
	} 

	//userId=1&roleId=1
	public function roleUser($a){
		$res = $this->D->table($this->table_user)->where("user_Id='".get('userId')."'")->update("lp_role='".get('roleId')."'");
		returnJson($res);
	}
	public function part($p){
		returnJson($this->D->table($this->table_part)->where( "p_post like '$p%'")->select());
	}

	public function partUser($a){
		$res = $this->D->table($this->table_user)->where("user_Id='".get('userId')."'")->update("lp_ext='".get('partId')."'");
		returnJson($res);
	}

	public function roleList(){
		if(isset($_REQUEST['b'])){
			$res = $this->D->table($this->table_role)->page(get('b'),get('e'));
		returnJson($res);
		}else{
			$res = $this->D->table($this->table_role)->select();
		returnJson($res);
		}
		
	}

	public function delRole(){
		$res = $this->D->table($this->table_role)->where(" role_Id='".get('id')."'")->delete();
		if($res){
			returnJson(0);
		}else{
			returnJson(-1);
		}
		
	}


	

	//根据A_A_A方式构建菜单
	public function menu($res){
		if(!is_array($res)) return array();
		$menu = array();
		for ($i=0; $i < count($res); $i++) { 
			$chindle=&$menu;
			$menu_post=explode("_",$res[$i]['p_post']); 
			$lastPost = "";
			for ($j=0; $j < count($menu_post); $j++) { 
				if($j==0){
					$lastPost = $menu_post[$j];//
				}else{
					$lastPost .= "_".$menu_post[$j];
				}
				for ($k=0; $k <count($chindle) ; $k++) { 
					if(isset($chindle[$k]['post'])){
						if($chindle[$k]['post']== $lastPost){
							$chindle = &$chindle[$k]['children'];
							break;
						}
					}
				}
			}
			$tempc=array();
			$tempc['post'] = $res[$i]['p_post'];
			$tempc['id'] = $res[$i]['p_Id'];
			$tempc['name'] =$res[$i]['p_name']; 
			$tempc['href'] ="#";
			$tempc['children'] =array();  
			array_push($chindle,$tempc);
		}	
		return $menu;
	}
}
