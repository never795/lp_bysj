<?php
include "fujian.php";

class Gonggao extends db{
  public $id = 1;
  public $gg = array(); 
  public $all = null;
  public function info($id = null){
  		if(!$id){
  			if(!$this->id){
  				return false;
  			}else{
  				$id = $this->id;
  			}
  		}
  		$nr = $this->D->table(t_gonggao)->where("gg_id = $id")->find();
  		$attr = $this->D->table(t_fujian)->where("gg_id = $id")->find();
  		
  		if(count($nr) == 1){
  			$nr[0]['attr'] = $attr;
  		}else{
  			$nr = false;
  		}
  		return $nr;
  }
 
 public function update($arr,$where){
  if($where){
   return $this->D->table(t_gonggao)->where($where)->save($arr);
  }
 }
 

 public function add($arr){
   $res = $this->D->data($arr)->add(t_gonggao);
   return $res;
 }

 public function del($id){
 	if(!$id){
  			if(!$this->id){
  				return false;
  			}else{
  				$id = $this->id;
  			}
  		}
   return 	$this->D->table(t_gonggao)->where("gg_id = $id")->delete();
 }

public function page($b=0,$l=10,$where=" 1=1 "){
	$li = $b.",".$l;
	if($where){
      $this->all = $this->D->where($where)->count(t_gonggao);
		$res = $this->D->limit($li)->find();
	}else{
    $this->all =$this->D->where($where)->count(t_gonggao);
		$res = $this->D->table(t_gonggao)->limit($l)->find();
	}
	 return $res;
}

}
$G = new Gonggao();

$type=get($GLOBALS[PARAMS]['TYPE']);

if($type==1){//获取单条
  $id=get($GLOBALS[PARAMS]['id']);
  $res = $G->info($id);
  if($res){
    returnJson(0,$res);
  }else{
     returnJson(-1);
  }
}else if($type==2){//获取分页
  $b = @$_GET['b'];
  $l = @$_GET['l'];
  $res = $G->page($b,$l);
  if($res){
     returnJson(0,$res,$G->all);
  }else{
     returnJson(-1);
  }
}else if($type==20){ //添加数据
   $_user = is_login();
  if($_user){
    if($_user['login_id'] == 1){ //第一个用户为管理员

    }else{
      returnJson(-1);
    }
  }else{
     returnJson(-1);
  }

  $gg = array(); 
  $gg['gg_name']= get($GLOBALS[PARAMS]['1']);
  $gg['gg_source']=  get($GLOBALS[PARAMS]['2']);
  $gg['gg_content']=  get($GLOBALS[PARAMS]['3']);
  $gg['gg_fwrs']=  get($GLOBALS[PARAMS]['4']);
  $gg['gg_remark']=  get($GLOBALS[PARAMS]['5']);
  
  $res = $G->add($gg);//添加公告

  if($res){ //更新附件
      $F = new FJ();
      $ids = get($GLOBALS[PARAMS]['id']);
      $arr = array();
      $gg_id = array();
      $gg_id['gg_id'] = $res;
      $arr = explode(",",$ids);
      foreach($arr as $u){
        $F->update($gg_id,$u);
      }   
  }

returnJson(0);
}else{
  $id=get($GLOBALS[PARAMS]['id']);
  $res = $G->info($id);
  if($res){
    returnJson(0,$res);
  }else{
     returnJson(-1);
  }
}



  
 

 // $G->update($gg,"gg_id = 1");
 // $G->adds($gg);
  //$G->del(2);


