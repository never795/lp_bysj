<?php
class user extends db {

	private $table_user = "lp_user";
	private $table_role = "lp_role";
	private $table_part = "part";
	

	public function page($s=0,$l=10){
		$res = $this->D->table($this->table_user)->page($s,$l);
		returnJson($res);
	}

	public function userAdd($add){
		$res = $this->D->table($this->table_user)->add($add);
		returnJson($res);
	} 

	public function update($update){
		if(!isset($update['user_Id'])){
			returnJson(9999,"user_Id");
		}
		$id = $update['user_Id'];
		$res = $this->D->table($this->table_user)->where("user_Id='".$id."'")->update($update);
		returnJson($res);
	}

	public function add($add){
			$res =  $this->D->table($this->table_user)->add($add);
			returnJson($res);
	} 

	//userId=1&roleId=1
	public function roleUser($a){
		$res = $this->D->table($this->table_user)->where("user_Id='".get('userId')."'")->update("lp_role='".get('roleId')."'");
		returnJson($res);
	}
	public function part(){
		returnJson($this->menu($this->D->table($this->table_part)->select()));
	}

	public function partUser($a){
		$res = $this->D->table($this->table_user)->where("user_Id='".get('userId')."'")->update("lp_ext='".get('partId')."'");
		returnJson($res);
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
