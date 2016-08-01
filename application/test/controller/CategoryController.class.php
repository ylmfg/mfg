<?php
namespace test\controller;
use framewrok\core\Controller;
class CategoryController extends Controller{

  public function listAction(){
  //这里完成我们一系列的功能
			 
//		require_once './framewrok/core/Model.class.php';
//		require_once //'./application/test/model/Model_category.class.php';
//		require_once './framewrok/core/Factory.class.php';
		$Model_category=\framewrok\core\Factory::getModel('category');

		$category_list=$Model_category->getCategory();
         $this->smarty->assign('category_list',$category_list);
		 $this->smarty->display('view_category.html');
  }

}

?>

