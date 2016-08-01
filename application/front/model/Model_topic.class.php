<?php
namespace front\model;

use framewrok\core\Model;

class Model_topic extends Model{



   public function getTopic(){
     $sql="SELECT * FROM $this->table";

	 $topic_list=$this->dao->fetchAll($sql);

	 return $topic_list;
   }
}

?>