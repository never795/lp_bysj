<?php 
class oracle{

    private $conn;
    private $sql;
    private $where;
    private $oeder;
    private $sql;
    private $err;
    private $fields;
    private $table;
    $_user="";
    $_password="";
    $_host="";

    public function __construct($_user="fjcf_base",$_password="123456",$_host="192.168.8.240/oracle"){
         $this->_user = $_user;
         $this->_password = $_password;
         $this->_host = $_host;
         $this->getCon();
    }

    public getCon(){
          $this->conn = ocilogon($this->_user,$this->_password,$this->_host);
          if (!$this->conn)
          {
            this->$err = oci_error();
            print htmlentities($Error['message']);
            return flase;
          }
          else
          {
             return true;
          }
    }

    public function run(){
        if($this->sql && $this->conn){
           $ora_test = oci_parse($this->conn,$this->sql);  //编译sql语句 
            oci_execute($ora_test,OCI_DEFAULT);  //执行 
            return $ora_test;  
        }else{
           if($this->sql){
               $this->err='缺少SQL语句';
           }else if($this->conn){
                if($this->getCon()){
                    $this->run();
                }
           }
        }
        
    }
    

    public  function select($sql=null){
        if($sql){$this->sql = $sql;}
        else{
            $this->sql = "select ".$this->fields." from ".$this->table;
        }
        $res = $this->run();
        $resarr=new array();
        while($r=oci_fetch_row($res)){ 
            array_push($rresarres,$r);
        }
        return $resarr;
    }

    public function table($table){
        $this->table=$table;
        return $this;
    }
    public function fields($fields="*"){
        $this->fields = $fields;
        return $this;
    }

     /*
     * 查询表达式参数处理函数
     * @access protected
     * @param mixed $param 传入参数(where limit order)
     * @return string 处理后字符串数据
     * */
    public function options_handle($param){
        if(is_numeric($param)){
            $option = $param;
        }elseif(is_string($param)&&!empty($param)&&!is_numeric($param)){ //
            $params = explode(',',$param);
            $count = count($params);
            $option = implode(' and ',$params);
        }elseif(is_array($param)&&!empty($param)){
            $params = $param;
            $count = count($params);
            $arr = array();
            foreach($param as $key=>$value){
                if(is_array($value)){
                   if($value[1] == 'in'){
                       $tip = " $key in(".$value[0].") "; 
                   }else{
                       $tip = " $key ".$value[0].$value[1]; 
                   }
                }else{
                    $tip = "$key=$value "; 
                }
                array_push($arr,$tip);
            }
            $option = implode(' and ',$arr);
        }else{
            return false;
        }
        return $option;
    }

    public function where($where){
        $this->options['where'] = self::options_handle($where);
        return $this;
    }


}




 ?>