<?php

class menu extends db{
	protected $table_user = "lp_user";
	protected $table_role = "lp_role";
	protected $table_menu = "lp_menu";
	protected $table_part = "part";
	protected $_user=null;

	public function getMAllenuBull(){
		returnJson(0,$this->BullMenu($this->D->table($this->table_menu)->select()));
	}

	public function getMAllenu(){
		$res=$this->D->table($this->table_menu)->order(" lp_menu_post")->page(get('b'),get('e'));
		if($res){
			returnJson(16,$res);
		}else{
			returnJson(17);
		}
		
	}

	public function delMenu($id){
		if($this->D->table($this->table_menu)->where(" menu_Id=".$id)->delete()){
			$this->D->table("lp_role_menu")->where("lp_menu_id=".$id)->delete();
		}else{
			returnJson(13);
		}
		returnJson(12);
	}

	public function addMenu(){
		$userInfo =is_login();
		//print_r($userInfo );exit();
		if(!$userInfo){returnJson(8);}
		$menu = array();
		$menu['lp_menu_name']=get('name');
		$menu['lp_menu_post']=get('post');
		$menu['lp_menu_url']=get('url');
		$menu['lp_menu_show']=get('show');

		if(count($this->D->table($this->table_menu)->where("lp_menu_post='".$menu['lp_menu_post']."'")->select())){
			returnJson(10001);
		}

		$menuId=$this->D->table($this->table_menu)->add($menu);
		if($menuId){
			$roleMenu=array();
			$roleMenu['lp_menu_id'] = $menuId;
			$roleMenu['lp_role_id'] = $userInfo['user']['lp_role'] ;
			$this->D->table("lp_role_menu")->add($roleMenu);
		}else{
			returnJson(15);
		}
		returnJson(14);
	}

public function editMenu(){
		$userInfo =is_login();
		//print_r($userInfo );exit();
		if(!$userInfo){returnJson(8);}
		$menu = array();
		$menu['lp_menu_name']=get('name');
		$menu['lp_menu_post']=get('post');
		$menu['lp_menu_url']=get('url');
		$menu['lp_menu_show']=get('show');
		$menuId=get('id');
		if($this->D->table($this->table_menu)->where("menu_Id=".$menuId)->update($menu)){
			returnJson(10);
		}else{
			returnJson(11);
		}
	}



public function BullMenu($res){
	if(!is_array($res)) return array();
	$menu = array();
	for ($i=0; $i < count($res); $i++) { 
		$chindle=&$menu;
		$menu_post=explode("_",$res[$i]['lp_menu_post']); 
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
		$tempc['post'] = $res[$i]['lp_menu_post'];
		$tempc['id'] = $res[$i]['menu_Id'];
		$tempc['name'] =$res[$i]['lp_menu_name']; 
		$tempc['url'] =$res[$i]['lp_menu_url'];
		$tempc['icon']="";
		$tempc['children'] =array();  
		array_push($chindle,$tempc);
	}	
	return $menu;
}


}
?>