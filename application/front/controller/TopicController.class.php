<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/5 0005
 * Time: 下午 19:04
 */
namespace front\controller;
use front\controller\CommonController;
use framewrok\core\Factory;

class TopicController extends CommonController{

    public function topicIndexAction(){


        $this->smarty->display('topic/topic_index.html');
    }
}

