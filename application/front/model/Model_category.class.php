<?php
namespace front\model;

use framewrok\core\Model;

class Model_category extends Model{


  public function getCategory(){
	$sql="SELECT * FROM $this->table ORDER BY `cate_sort` ";

    
	$category_list=$this->dao->fetchAll($sql);
     
	 //利用递归查找后代
	$tree=$this->getTree($category_list);
    return $tree;
  }
  private function getTree($list,$pid=0,$deep=0){
	  //用于存储数据
      static $tree=[];
	  //遍历数组拿到每一行的记录
	  foreach($list as $row){
		  //如果某一行的prent_id等于当前的id
	   if($row['prent_id']==$pid){
		    $row['deep']=$deep;
			$tree[]=$row;
           $this->getTree($list,$row['cate_id'],$deep+1); 
		}
	  }
	  return $tree;
  }
}

?>
