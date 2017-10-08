<?php

class login extends db{
	protected $table_user = "lp_user";
	protected $table_role = "lp_role";
	protected $table_menu = "lp_menu";
	protected $table_part = "part";
	protected $_user=null;

	public function menu($role=0){
		$sql ="
		select * from lp_menu m
		inner join lp_role_menu rm on m.menu_id=rm.lp_menu_id
		where m.lp_menu_show=1 and rm.lp_role_id='".$role."' order by m.lp_menu_post";
		$res = $this->D->query($sql);
		return $this->bmenu($res);
	}
	
	public function logins($user,$pwd){
		$sql="select * from lp_user u left join lp_role r on r.role_id=u.lp_role left join part p on p.p_id=u.lp_ext where u.lp_username='".$user."'";
		$res =  $this->D->query($sql);
		if(count($res)==1){
			if($res[0]['lp_password'] == $pwd){
				$this->_user['user'] = $res[0];
		 		$this->_user['menu'] =$this->menu($res[0]['lp_role']);
		 		set_session($this->_user,SESSION_USER);
		 		$res[0]['lp_password'] = "******";
			}else{
				returnJson(1);
			}
		 		
		}else{
			returnJson(2);
		}
	    returnJson(0,$this->_user);
	}

	//根据A_A_A方式构建菜单
public function bmenu($res){
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
						$chindle = &$chindle[$k]['childMenus'];
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
		$tempc['childMenus'] =array();  
		array_push($chindle,$tempc);
	}	
	return $menu;
}
}

?>