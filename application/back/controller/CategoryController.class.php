<?php
namespace back\controller;
use back\controller\CommonController;
use framewrok\core\Factory;

class CategoryController extends CommonController{

  public function listAction(){

      $this->checkLogin();
      //调用模型
      $model_cate=Factory::getModel('category');
      //展示
      $this->smarty->assign('category_list',$model_cate->getCategory());
      $this->smarty->display('category/category_view.html');

  }
  //添加我们的分类数据
  public function insertAction(){
    //接受我们的数据
	$data['cate_title']=$_POST['category_title'];
	$data['prent_id']=$_POST['parent_id'];
      var_dump($data['prent_id']);
	$data['cate_sort']=$_POST['sort'];
   //调用模型
   $category_model=Factory::getModel('Category');
   $result=$category_model->insertCategory($data);
      //执行成功返回auto lastInserId失败返回false
	   if($result){
		 //成功

	   $this->jumpNow(Factory::U('back/Category/list'));
	   }else{
	   $this->jumpWait(Factory::U('back/Category/list'),'错误消息是:'.$category_model->getErrorInfo(),5);
	   }
    //展示 
  }
  public function deleteAction(){

    //接收我们的数据
	$cate_id=isset($_GET['id'])?(int)$_GET['id']:null;

	if(is_null($cate_id)){
	  //为空立即跳转
	  $this->jumpWait(Factory::U('back/Category/list'),'错误的ID');
	}
    $category_model=Factory::getModel('category');

	$result=$category_model->deleteCategory($cate_id);
    //返回受影响的函数 、false
	if($result){
	  //如果删除成功要将当前的问题移动到未分类下
	  $question_model=Factory::getModel('question');
	  $question_model->updateValue(['category_id'=>1],'category_id='.$cate_id);
	  $this->jumpNow(Factory::U('back/Category/list'));
	}else{
	  $this->jumpWait(Factory::U('back/Category/list'),'删除失败'.$category_model->getErrorInfo('<br>'));
	}
  }
  //编辑
  public function editAction(){
	  
      $this->checkLogin();
	 
     $cate_id=isset($_GET['id'])?(int)$_GET['id']:null;

	 if(is_null($cate_id)){
	    $this->jumpWait(Factory::U('back/Category/list'),"ID有问题");
	 }
	 //获取当前分类的数据
	 $categoryNow_model=Factory::getModel('category');

	 $categoryNow=$categoryNow_model->getNowCategory($cate_id);
     //分配当前分类的数据
	 $this->smarty->assign('categoryNow',$categoryNow);

	//获取全部分类的数据
	 $categoryAll_model=Factory::getModel('category');
	 
	 $categoryAll=$categoryAll_model->getCategory();

	 //分配全部分类的数据
	 $this->smarty->assign('categoryAll',$categoryAll);

	 //展示
	 $this->smarty->display('category/category_view_edit.html');
  }
  public function updateAction(){
     //接收数据
	 $data['cate_id']=$_POST['cate_id'];
	 $data['cate_title']=$_POST['cate_title'];
	 $data['cate_sort']=$_POST['cate_sort'];
	 $data['prent_id']=$_POST['prent_id'];

	 //调用模型
	 $category_model=Factory::getModel('category');

	 $result=$category_model->updateValue($data);
     if($result){
	    $this->jumpNow(Factory::U('back/Category/list'));
	 }else{
	$this->jumpWait(Factory::U('back/Category/list',['id'=>$data['cate_id']]),'数据添加失败'.$category_model->getErrorInfo('<br>'));
	 }
  }
}
?>