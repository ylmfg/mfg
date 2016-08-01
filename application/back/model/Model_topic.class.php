<?php
namespace back\model;
use framewrok\core\Model;

class Model_topic extends Model{
  
    //逻辑表名

   //获取topic数据
	public function getTopic(){
	  $sql="SELECT * FROM $this->table";

	  $topic_list=$this->dao->fetchAll($sql);

	  return $topic_list;
	}
}
?>
