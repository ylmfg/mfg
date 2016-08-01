<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/31 0031
 * Time: 下午 20:24
 */
namespace back\controller;

use back\controller\CommonController;
use framewrok\core\Factory;

class  UserController extends CommonController{

    public function loginAction(){
        if(isset($_SESSION['user'])) {
            $this->smarty->assign('user', $_SESSION['user']);
        }
        $this->smarty->display('User/login.html');
    }
    public function loginProcessAction(){

        //验证密码是否合理

        $email=$_POST['user_email'];
        $user_password=$_POST['password'];
        $captcha=$_POST['captcha'];

        $user_model=Factory::getModel('user');
        $user=$user_model->getEmail($email);
//        var_dump($user);
//        echo "<br>";
//        echo $user['user_password'],"<br>";
//        echo md5($user_password.$user['password_salt']),"<br>";
//        echo $captcha,"<br>";
//        echo $_SESSION['captcha'],"<br>";
//        die;
        //在判断密码
        if(!$user){
            $this->jumpWait(Factory::U('back/User/login'),'用户信息填写错误');
        }
        if($user['user_password']!=md5($user_password.$user['password_salt'])){
            $this->jumpWait(Factory::U('back/User/login'),'用户信息填写错误');
        }
        //判断验证码

        if($captcha!=$_SESSION['captcha']){
            $this->jumpWait(Factory::U('back/User/login'),'用户信息填写错误');
        }
        //记录登陆标示
        @session_start();
        $_SESSION['user']=$user;
        $this->jumpNow(Factory::U('back/Category/list'));
    }
      public function loginOutAction(){
        unset($_SESSION['user']);
        $this->jumpNow(Factory::U('front/Content/index'));
    }
}