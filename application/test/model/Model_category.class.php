<?php
namespace test\model;
use framewrok\core\Model;
class Model_category extends Model{
 
	public function getCategory(){
	 $sql='SELECT * FROM `tn_category` ';
	 $category_list=$this->dao->fetchAll($sql);
	 return $category_list;
	}

}
?>