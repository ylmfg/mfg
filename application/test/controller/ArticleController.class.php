<?php
namespace test\controller;
use framewrok\core\Controller;
class ArticleController extends Controller{

  public function listAction(){
  //这里完成我们一系列的功能
//			 
//		require_once './framewrok/core/Model.class.php';
//		require_once './application/test/model/Model_article.class.php';
//		require_once './framewrok/core/Factory.class.php';
		$Model_article=\framewrok\core\Factory::getModel('article');

		$article_list=$Model_article->getArticle();

	     $this->smarty->assign('article_list',$article_list);
		 $this->smarty->display('view_article.html');;
  }
}

?>