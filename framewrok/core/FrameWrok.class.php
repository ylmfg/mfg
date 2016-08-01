<?php
namespace framewrok\core;

class FrameWrok
{

    public function __construct()
    {
        $this->initBase(); 
        //初始化加载的数据
        $GLOBALS['config'] = $this->initFrameWorkConfig();
        $GLOBALS['config'] = array_merge($GLOBALS['config'], $this->initApplicationConfig());
        //初始化我们的url的pathinfo部分
        $this->initPathinfo();
        //初始化我们的模块
        $this->initModule();
        $GLOBALS['config'] = array_merge($GLOBALS['config'], $this->initModuelConfig());
        $this->initLoad();
        $this->initCA();
        $this->disPatch();

    }

    private function initBase()
    {
        //定义一些基础常量路径
        define('PATH', getcwd() . '/');
        defined('APPLICATION_PATH') || define('APPLICATION_PATH', PATH . 'application/');
        defined('FRAMEWROK_PATH') || define('FRAMEWROK_PATH', PATH . 'framewrok/');
        //定义我们的上传目录
        define('UPLOAD_PATH', PATH . 'upload/');
        //定义我们的web目录
        define('WEB_PATH', PATH . 'web/');

        //定义url路径相关的常量

        define('ROOT', str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

    }

    private function initPathinfo()
    {
        //确定我们的url pathinfo部分
        $pathinfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
        if ($pathinfo == null) {
            return;
        }
//var_dump($pathinfo);
        $pathinfo = substr($pathinfo, 1);

//使用/分隔数组
        //判断是否是最后一个.html
        if ($GLOBALS['config']['url_profix'] == strrchr($pathinfo, '.')) {
            $pathinfo = substr($pathinfo, 0, -strlen($GLOBALS['config']['url_profix']));
        }
        $pathinfo_list = explode('/', $pathinfo);
//echo "<pre>";
//var_dump($pathinfo);
//计算总的长度
        $pathinfo_length = count($pathinfo_list);

        if (1 == $pathinfo_length) {
            $_GET['m'] = $pathinfo_list[0];
        } elseif (2 == $pathinfo_length) {
            $_GET['m'] = $pathinfo_list[0];
            $_GET['c'] = $pathinfo_list[1];
        } elseif (3 == $pathinfo_length) {
            $_GET['m'] = $pathinfo_list[0];
            $_GET['c'] = $pathinfo_list[1];
            $_GET['a'] = $pathinfo_list[2];
        } else {
            $_GET['m'] = $pathinfo_list[0];
            $_GET['c'] = $pathinfo_list[1];
            $_GET['a'] = $pathinfo_list[2];
            for ($i = 3; $i < $pathinfo_length; $i += 2) {
                $_GET[$pathinfo_list[$i]] = $pathinfo_list[$i + 1];
            }
        }
    }

    private function initModule()
    {


        //确定所请求模块、控制器、动作
        $default_model = $GLOBALS['config']['MODUEL'];

        define('MODULE', isset($_GET['m']) ? $_GET['m'] : $default_model);

        //定义模块常量路径
        define('MODULE_PATH', APPLICATION_PATH . MODULE . '/');
    }

    private function initLoad()
    {

        //注册一个自动加载
        spl_autoload_register(array($this, 'myload'));
    }

    private function myLoad($className)
    {
        //$className仅仅返回的是类名,如果我们需要将类文件引入完成自动加载的功能,我们需要判断我们前缀来确定我们到底是哪个基础目录,后缀来确定我们文件到底是类文件还是接口文件
        //smarty特列
        $list['Smarty'] = FRAMEWROK_PATH . 'vendor/smarty/Smarty.class.php';
        if (isset($list[$className])) {
            require $list[$className];
            return true;
        }
        $className_split = explode('\\', $className);
        $prefix = $className_split[0];
        //确定基础目录
        if ('framewrok' == $prefix) {
            $basic_path = FRAMEWROK_PATH;
        } else {
            $basic_path = APPLICATION_PATH . $prefix . '/';
        }
        //echo $basic_path."<br>";
        unset($className_split[0]);
        //确定后面的目录
        $sub_path = implode('/', $className_split);
        //echo $sub_path;
        $baseName = basename($sub_path);
        //确定到底是接口还是类
        if ('I_' == substr($baseName, 0, 2)) {
            //是接口
            $postfix = '.php';
        } else {
            $postfix = '.class.php';
        }
        $file = $basic_path . $sub_path . $postfix;
        if (file_exists($file)) {
            require $basic_path . $sub_path . $postfix;
        }

        //require $basic_path.$sub_path.$postfix;
    }

    private function initCA()
    {
        $default_controller = $GLOBALS['config']['CONTROLLER'];
        define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);
        $default_action = $GLOBALS['config']['ACTION'];
        define('ACTION', isset($_GET['a']) ? $_GET['a'] : $default_action);
    }

    Private function disPatch()
    {
        //实例化对象
        $controller_name = CONTROLLER . ('Controller' == substr(CONTROLLER, -10) ? '' : 'Controller');

        $action_name = ACTION . ('action' == substr(ACTION, -6) ? '' : 'action');

        // 当前模块/controller/$controller_name
        $controller_name = '\\' . MODULE . '\\controller\\' . $controller_name;
        $controller = new $controller_name;

        $controller->$action_name();

    }

    //加载框架配置
    private function initFrameWorkConfig()
    {
        //确定配置路径
        $config_file = FRAMEWROK_PATH . 'config/config.php';

        //载入存在
        $config = require $config_file;
//         echo "<pre>";
//		 var_dump($config);
        return $config;


    }

    private function initApplicationConfig()
    {
        //确定配置路径
        $config_file = APPLICATION_PATH . 'common/config/config.php';


        if (file_exists($config_file)) {
            $config = require $config_file;
//		 echo "<pre>";
//		 var_dump($config);
            return $config;
        } else {
            //不存在
            return [];
        }

    }

    private function initModuelConfig()
    {
        $config_file = MODULE_PATH . '/config/config.php';

        if (file_exists($config_file)) {
            $config = require $config_file;
//		 echo "<pre>";
//		 var_dump($config);
            return $config;
        } else {
            //不存在
            return [];
        }
    }

}

?>