<?php
/**
 * Author: lp
 * CreateTime: 2016/4/12 20:14
 * description: 数据库操作类(仅对接MySQL数据库,主要利用MySQLi函数)
 */
class Database{

    //MySQL主机地址
    private $_host;
    //MySQL用户名
    private $_user;
    //MySQL用户密码
    private $_password;
    //指定数据库名称
    private $_database;
    //当前数据库对象
    private $_dbObj;
    //数据库表
    private $_table;
    //数据库表对象
    private $_tableObj;
    // 最近错误信息
    protected $error            =   '';
    // 数据信息
    protected $data             =   array();
	
	protected $where =' where 1=1 ';
	protected $order ='';
	protected $files="*";
	protected $sql="";
    // 查询表达式参数
    protected $options          =   array();
    protected $_validate        =   array();  // 自动验证定义
    protected $_auto            =   array();  // 自动完成定义
    protected $_map             =   array();  // 字段映射定义
    protected $_scope           =   array();  // 命名范围定义
    // 链操作方法列表
    protected $methods          =   array('strict','order','alias','having','group','lock','distinct','auto','filter','validate','result','token','index','force');

    /**
     * Database类初始化函数
     * 取得DB类的实例对象 字段检查
     * @access public
     * @param string $host MySQL数据库主机名
     * @param string $user MySQL数据库用户名
     * @param string $password MySQL数据库密码
     * @param string $database 指定操作的数据库
     * @return mixed  数据库连接信息、错误信息
     */
    public function __construct($host,$user,$passowrd,$database,$chart='utf8'){
        if(!isset($host)||!isset($user)||!isset($passowrd)||!isset($database)){
            return false;
        }else{
            $this->_host     = $host;
            $this->_user     = $user;
            $this->_password = $passowrd;
            $this->_database = $database;
			$_dbObj = mysql_connect($host, $user, $passowrd);//连接到数据库
			mysql_query("set names '".$chart."'");//编码转化
			if (!$_dbObj) {
			  die("could not connect to the database.\n" . mysql_error());//诊断连接错误
			}
			$selectedDb = mysql_select_db($database);//选择数据库
			if (!$selectedDb) {
			  die("could not to the database\n" . mysql_error());
			}
        }
    }
	
	protected function run($clear=false){
		$GLOBALS["sql"]  ="<p style='color:red'>".$this->sql."</p>";
		$result = mysql_query($this->sql);
		//echo gettype($result);
		
		if(!$result) return false;
		  if(!$clear){
		   $this->clear();
	   }
	   
		if(gettype($result)!="boolean"){
			$res = array();
			while($row = mysql_fetch_array($result)){
				array_push($res,$row);
			}
			return $res;
		}else{
			return $result;
		}
	}
	
	/*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	*
	* 
	*/
	public function where($where){
		if(is_string($where)){
			$this->where .= " and ".$where;
		}else if(is_array($where)){
			$temp="";
			foreach($where as $key=>$value){
                if(is_array($value)){       //二维数组 下表0是值，1运算符
					if(count($value)==2){
						if($value[1]=='in'){  //array("id"=>array("val"=>"in"))
							$temp.=" and `".$key."` in(".$value[0].")";
						}else if($value[1]=='like'){
							$temp.=" and `".$key."` like '%".$value[0]."%'";
						}else{ //array("id"=>array("val","!="))
							$temp.=" and `".$key."`".$value[1]."'".$value[0]."'";
						}	
					}else if(count($value)==3){ //array("id"=>array("'1'","in","or"))
						if($value[1]=='in'){  //array("id"=>array("val"=>"in"))
							$temp.=" ".$value[2]." `".$key."` in(".$value[0].")";
						}else if($value[1]=='like'){
							$temp.=" ".$value[2]." `".$key."` like '%".$value[0]."%'";
						}else{ //array("id"=>array("val","!="))
							$temp.=" ".$value[2]." `".$key."`".$value[1]."'".$value[0]."'";
						}
					}					
                }else{      //一维数组 默认是 and
                   $temp .=" and `".$key."`='".$value."' ";
                }
            }
			$this->where .=$temp;
		}
		return $this;
	}
	
	public function order($order){
		if(is_string($order)){
			$this->order = " order by ".$order;
		}else if(is_array($order)){
			$temp="";
			foreach($order as $key=>$value){
                   //一维数组 默认是 and
                   $temp .=" ".$key." ".$value." ";
            }
			$this->order =" order by ".$temp;
		}
		return $this;
	}
	
   public function files( $files="*" ){
	   $this->files=$files;
	   return $this;
   }
   
   public function table($table){
	   $this->_table = $table;
	   return $this;
   }
   
   public function select($clear=false){
	   $this->sql ="select ".$this->files." from ".$this->_table.$this->where.$this->order;
	   return $this->run($clear);
   }

     public function page($s=0,$l=10,$clear=false){
	   $this->sql ="select ".$this->files." from ".$this->_table.$this->where.$this->order." limit ".$s.",".$l;
	   return $this->run($clear);
   }

   
   public function update($update,$clear=false){
	   if(is_string($update)){
		   $this->sql = "UPDATE ".$this->_table." SET ".$update." ".$this->where;
	   }else if(is_array($update)){
		   $temp = "";
		   foreach($update as $key=>$value){
			   $temp .= $key."='".$value."',";
		   }
		   $temp = substr($temp,0,strlen($temp)-1);
		   $this->sql =  "UPDATE ".$this->_table." SET ".$temp." ".$this->where;
	   }
	   return $this->run($clear);
	 
   }
   
   public function add($add,$clear=false){
	   if(is_array($add)){
		   $tempk = "";
		   $tempv = "";
		   foreach($add as $key=>$value){
			   $tempk .= "`".$key."`,";
			   $tempv .= "'".$value."',";
		   }
		   $tempk = substr($tempk,0,strlen($tempk)-1);
		   $tempv = substr($tempv,0,strlen($tempv)-1);
		   $this->sql =  "INSERT INTO ".$this->_table." (".$tempk.")values(".$tempv.")";
	   }
	   return $this->run($clear);
   }
   
    public function query($sql,$clear=false){
		$this->sql = $sql;
	   return $this->run($clear);
   }
   
   public function clear(){
	     $this->where =' where 1=1 ';
		 $this->order ='  ';
		 $this->files="*";
		 $this->sql="";
   }
    /*
     * 关闭连接
     * */
    function __destruct(){
      //  echo "关闭数据库";
	  if($this->_dbObj) mysql_close($this->_dbObj);
    }
}



class db{
   public $D = null;
    public function __construct(){
        // $this->D = new Database("127.0.0.1","root","root","lp_bysj");
            if(isset($GLOBALS['db'])){
                $this->D = $GLOBALS['db'];
            }else{
                $this->D = new Database("127.0.0.1","root","root","lp_bysj");
                $GLOBALS['db'] = $this->D;
            }          
    }
}




?>