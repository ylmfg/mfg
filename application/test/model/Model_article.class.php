<?php
namespace test\model;

use framewrok\core\Model;

class Model_article extends Model{
 
	public function getArticle(){
	 $sql='SELECT * FROM `tn_article` ORDER BY `create_at` DESC limit 3';
	 $article_list=$this->dao->fetchAll($sql);
	 return $article_list;
	}

}
?>