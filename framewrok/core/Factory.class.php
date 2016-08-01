<?php
namespace framewrok\core;
class Factory
{

    public static function getModel($class_name)
    {
        //用于存储实例化的数组
        static $instance_list = [];
        //如果不是以Model_开头的,人为的添加前缀
        if ('Model_' != substr($class_name, 0, 6)) {
            $class_name = 'Model_' . $class_name;
        }
        //如果数组里面没有存在实例化的对象
        if (!isset($instance_list[$class_name])) {

            $class_name = '\\' . MODULE . '\\model\\' . $class_name;
            //创建一个实例化对象
            $instance_list[$class_name] = new $class_name;
        }
        //返回实例化的对象
        return $instance_list[$class_name];
    }

    //定义一个生产url功能的方法
    public static function U($dispatch, $param_list = [])
    {

        //确定请求的入口文件地址
        $url = $_SERVER['SCRIPT_NAME'];
        //处理分发参数
        $url .= '/' . $dispatch;
        //获取请求参数
        foreach ($param_list as $key => $v) {
            $url .= '/' . $key . '/' . $v;
        }
        //增加后缀
        $url .= $GLOBALS['config']['url_profix'];

        //返回url
        return $url;
    }
}

?>