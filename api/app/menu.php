<?php

class menu extends db{
	protected $table_user = "lp_user";
	protected $table_role = "lp_role";
	protected $table_menu = "lp_menu";
	protected $table_part = "part";
	protected $_user=null;

	public function getMAllenu(){
		returnJson(0,$this->BullMenu($this->D->table($this->table_menu)->select()));
	}

	public function addMenu(){
		$menu = array();
		$menu['lp_menu_name']=get('name');
		$menu['lp_menu_post']=get('post');
		$menu['lp_menu_url']=get('url');
		$menu['lp_menu_show']=get('show');
		returnJson(0,$this->D->table($this->table_menu)->add($menu));
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