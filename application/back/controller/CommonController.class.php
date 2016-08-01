<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/31 0031
 * Time: 下午 17:42
 *
 *
 */
namespace back\controller;
use framewrok\core\Controller;
use framewrok\core\Factory;

class CommonController extends Controller{

    public function __construct()
    {
        parent::__construct();
        $this->sessionStart();
      //  $this->checkLogin();
    }

    protected function sessionStart(){
        session_start();
    }

    protected function checkLogin(){
        if(@isset($_SESSION['user'])&@$_SESSION['user']['role_id']==1){

            $this->smarty->assign('user',$_SESSION['user']);
            //展示
        }else{
            $this->jumpWait(Factory::U('back/User/login'),'需要管理员登录');
        }

    }

}