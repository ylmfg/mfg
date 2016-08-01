<?php
namespace framewrok\dao;
//定义一个pdo工具类
class DAOPdo implements I_Dao
{
     //配置信息
	 private $_host;
	 private $_root;
	 private $_dbname;
	 private $_pw;
	 private $_port;
	 private $_charset;

	 //pdo对象
	 private $pdo;

	 //pdo结果集对象
	 private $result;

	 //被影响的记录数
	 private $affected_row;

     //当前类的实例化对象
     private static $instance;


	 private function __construct($option){
		 //初始化服务器配置信息
		 $this->_initArray($option);
		 //初始化pdo
		 $this->_initPdo();
	 
	 }
     //定义一个单例模式
     public static function getSingleton(array $option=array()){
	    if(!(self::$instance instanceof self)){
		     self::$instance = new self ($option);
		  }
		  return self::$instance;
		}
	  private function __clone(){
	 
	 }
	 private function _initArray($option){
	    $this->_host=isset($option['host'])?$option['host']:'';
	    $this->_pw=isset($option['pw'])?$option['pw']:'';
	    $this->_root=isset($option['root'])?$option['root']:'';
	    $this->_dbname=isset($option['dbname'])?$option['dbname']:'';
	    $this->_port=isset($option['port'])?$option['port']:'';
	    $this->_charset=isset($option['charset'])?$option['charset']:'';
	 }
	 private function _initPdo(){
		 try{
		 $dns="mysql:host=$this->_host;dbname=$this->_dbname;port=$this->_port;charset=$this->_charset";
         $this->pdo=new \PDO($dns,$this->_root,$this->_pw);
		 }
		 //捕获异常
		 catch(PDOException $e){
		  trigger_error("数据库连接失败",E_USER_WARNING);
		  return false;
		 }
	 }
	 //用于查询的方法
     public function query($sql=''){
		 if(!($this->pdo instanceof \PDO)){
		    return false;
		 }
		 $result=$this->pdo->query($sql);
		 if(false==$result){
		   $error_info=$this->pdo->errorInfo();
		   $error_str="执行失败".$sql.'----'.$error_info[2];
		   trigger_error($error_str,E_USER_WARNING);
		   return false;
		 }else{
		 $this->result=$result;
		    return $result; 
		 }
	 }
	 //用于非查询的方法
   	 public function execu($sql=''){
	     if(!($this->pdo instanceof \PDO)){
		    return false;
		 }
		 $result=$this->pdo->exec($sql);
		 if(false===$result){
		   $error_info=$this->pdo->errorInfo();
		   $error_str="执行失败".$sql.'----'.$error_info[2];
		   trigger_error($error_str,E_USER_WARNING);
		   return false;
		 }else{
		  $this->affected_row=$result;
		   return $result;
		 }
	 }
     //查询所有的记录
	 public function fetchAll($sql=''){
		 $result=$this->query($sql);
		 if(false==$result){
		    return false;
		 }
      $rows=$result->fetchAll(\PDO::FETCH_ASSOC);
	  $result->closeCursor();
	  return $rows;

	 }
     //查询一条记录
	 public function fetchRow($sql=''){
	   $result=$this->query($sql);
	   if(false==$result){
	    return false;
	   }
	   $row=$result->fetch(\PDO::FETCH_ASSOC);
	   $result->closeCursor();
	   return $row;
	 }
	 //查询某条记录第一个字段
	 public function fetchOne($sql=''){
	   $result=$this->query($sql);
	   if(false==$result){
	    return false;
	   }
	   $row_one=$result->fetchColumn(0);
	   $result->closeCursor();
	   return $row_one;
	 }
	 //查询某个字段的全部数据
     public function fColumn($sql=''){
		$result = $this->query($sql);
		$rows = $result->fetchAll(\PDO::FETCH_COLUMN);
		return $rows;
	 }
	 //用于提供转义的方法
	 public function escapeData($data=''){
	   return $this->pdo->quote($data);
	 }
	 //获取被影响的记录数
	 public function affectedRow(){
	   $affected_row=$this->affected_row;
	   return $affected_row;
	 }
	 //获取上次结果影响的记录数
	 public function resultRow(){
	   $result_row=$this->result->rowCount();
	    
	   $this->result=null;

	    return $result_row;
	 }
	 //获取最新自动生成的ID
	 public function lastInsertId(){
	  
	  return $this->pdo->lastInsertId();
	 }
 
}

?>