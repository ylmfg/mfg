<?php
namespace back\model;
use framewrok\core\Model;

class Model_category extends Model{



	  public function getCategory(){
		
		//调用数据
$sql="SELECT c.*,count(q.question_id)as question_count FROM $this->table AS c left join {$this->table('question')} as q on c.cate_id=q.category_id GROUP BY c.cate_id ORDER BY c.cate_sort";
		$category_list=$this->dao->fetchAll($sql);
		//利用递归算法查找后代分类
		$tree=$this->getCatetree($category_list);
		return $tree;
//		echo "<pre>";
//		var_dump($tree);
	  }
	  private function getCatetree($list,$p_id=0,$deep=0){
	  
		//存储我们数据
			 static $tree=[];

		  foreach($list as $row){
			  if($row['prent_id']==$p_id){
			  //记录我们的deep值
			  $row['deep']=$deep;
			  $tree[]=$row;
			  //二次调用
			  $this->getCatetree($list,$row['cate_id'],$deep+1);
		   }
		 }
		 return $tree;
	  }
	  public function insertCategory($data){
	  
	   //这里我们需要做合理判段
       
	   //判断标题是否为空
	   if($data['cate_title']==''){
	   
	      $this->error_info['cate_title']='字段不允许为空';
	   
	   }
	   //判断同一个子分类下不允许标题同名
	   elseif($this->hasChildCategory($data['cate_title'],$data['prent_id'])){
	     $this->error_info['cate_title']='同一个分类字段不能相同';
	   }

	   //判断排序
	   if(!((string)(int)$data['cate_sort']==$data['cate_sort']&&$data['cate_sort']>=0)){
	   
	     $this->error_info['cate_sort']='排序不满足规则,必须是非负整数';
	   }
	   if(!empty($this->error_info)){
	   
	     //如果存在错误、返回false程序不在执行

		 return false;
	   }

	   
	   //形成一条insert语句
	   return $this->insertValue($data);
	  }
	  private function hasChildCategory($cate_title,$prent_id){
			  //验证数据库里否
			 $sql="SELECT 1 from $this->table WHERE `cate_title`='{$cate_title}'AND `prent_id`='{$prent_id}'";

			 return (bool)$this->dao->fetchRow($sql);
	  }
     public function deleteCategory($cate_id){
	    //判断数据的合理性
         if($this->isLeaf($cate_id)){
		    $this->error_info['cate_id']='有子分类,不能直接删除';
		 }
		 if(!empty($this->error_info)){
		   return false;
		 }
       //执行删除
	    return $this->deleteValue($cate_id);

	 }

	 private function isLeaf($cate_id){
	    //有分类
	    $sql="SELECT 1 FROM $this->table WHERE `prent_id`=$cate_id LIMIT 1";
        return (bool)$this->dao->fetchRow($sql);
	 }
	//处理当前的分类数据
	public function getNowCategory($cate_id){
	   $sql="SELECT * FROM $this->table WHERE `cate_id`='{$cate_id}'";
	   return $this->dao->fetchRow($sql);
	}
}
/*创建tang_category
drop table if exists tang_category;

create table tang_category(
cate_id int unsigned not null auto_increment,
cate_title varchar(64) not null default '',
cate_sort int unsigned default 0,
prent_id int unsigned default 0,
primary key(cate_id)
)charset=utf8;

insert into tang_category values
(1,'未分类',0,0),
(22,'php',0,0),
(7,'mysql数据库',0,22),
(13,'面向对象oop',0,22),
(12,'前端',0,0),
(3,'html5',0,12),
(6,'ajax',0,12);
*/
//insert into tang_category values(15,'canvas',0,3);
?>