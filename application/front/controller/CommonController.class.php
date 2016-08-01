<?php


namespace front\controller;

use framewrok\core\Controller;
use framewrok\core\Factory;

class CommonController extends Controller
{

    /**
     * 构造
     */
    public function __construct()
    {
        parent::__construct();
        // 初始化session
        $this->initSession();

        // 初始化用户数据
        $this->initUser();
    }

    protected function initUser()
    {
        // 初始化用户信息
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
        $this->smarty->assign('user', $user);
    }


    protected function initSession()
    {
        session_start();
    }

    protected function isLogin()
    {

        if (!isset($_SESSION['user'])) {

            $this->jumpWait(Factory::U('front/Content/index'), '需要登陆');
        }
         return $_SESSION['user'];

    }
    protected function unsetSession(){
        unset($_SESSION['user']);
    }
}