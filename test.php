<?php

class login extends db{
	protected $table_user = "lp_user";
	protected $table_role = "lp_role";
	protected $table_menu = "lp_menu";
	protected $table_part = "part";
	protected $_user=null;

	
	public function logins($user,$pwd){
		$sql="select * from lp_user u left join lp_role r on r.role_id=u.lp_role left join part p on p.p_id=u.lp_ext where u.lp_username='".$user."'";
		$res =  $this->D->query($sql);
		if(count($res)==1){
			if($res[0]['lp_password'] == $pwd){
				$res[0]['lp_password'] = "******";
				$this->_user['user'] = $res[0];
		 		$this->_user['menu'] =$this->menu();
		 		set_session($this->_user,SESSION_USER);
			}else{
				returnJson(1);
			}
		 		
		}else{
			returnJson(2);
		}
	    returnJson(0,$this->_user);
	}
	

	protected function menu(){
		$sql ="
		select * from lp_menu m
		inner join lp_role_menu rm on m.menu_id=rm.lp_menu_id
		where m.lp_menu_show=1 and rm.lp_role_id='".$this->_user['user']['lp_role']."' order by m.lp_menu_post";
		$res = $this->D->query($sql);
		return menu($res);
	}
	
}

$l = new login();
$l->logins($get("u"),$get("p"));


?>