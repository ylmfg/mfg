<?php
namespace framewrok\core;

class Controller
{
    //定义一个smarty对象
    protected $smarty;

    public function __construct()
    {
        $this->typeAction();
        $this->initAction();
    }

    protected function typeAction()
    {
        header("content-type:text/html;charset=utf-8");
    }

    protected function initAction()
    {
        // require_once './framewrok/vendor/smarty/Smarty.class.php';
        //实例化一个smarty对象
        $this->smarty = new \Smarty;
        //定义模板文件目录
        $this->smarty->template_dir = MODULE_PATH . 'view/';
        //定义一个编译目录
        $this->smarty->compile_dir = MODULE_PATH . 'runtime/compile/';

    }

    protected function jumpNow($url)
    {

        header("Location:$url");
        exit;
    }

    protected function jumpWait($url, $message, $wait = 1)
    {
        header('Refresh:' . $wait . ';URL=' . $url);
        echo $message;
        exit;
    }

}

?> 