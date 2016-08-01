<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/28 0028
 * Time: 下午 13:03
 */
namespace front\controller;

use front\controller\CommonController;

use  framewrok\core\Factory;

use  framewrok\tool\Captcha;

class UserController extends CommonController
{

    public function registerAction()
    {

        $this->smarty->display('user/register.html  ');
    }

    public function registerProcessAction()
    {
        //获取表单
        $data['user_name'] = $_POST['user_name'];
        $data['user_email'] = $_POST['user_email'];
        $data['user_password'] = $_POST['user_password'];
        //验证数据的合理性
        //验证用户名u:模式修订符-utf8
        $name_pattern = '/^[a-zA-z_\x{4e00}-\x{9fa5}][\w\x{4e00}-\x{9fa5}]{3,19}$/u';
        if (0 == preg_match($name_pattern, $data['user_name'])) {
            $error_info['user_name'] = '用户名不符合规则';
        }
        //验证邮箱
        $email_pattern = '/[\w-]+@([\w-]+\.)+[\w-]+$/';
        if (0 == preg_match($email_pattern, $_POST['user_email'])) {
            $error_info['user_email'] = '邮件格式错误';
        }
        //验证密码
        $pass_pattern = '/^\S{6,12}$/';
        if (0 == preg_match($pass_pattern, $_POST['user_password'])) {
            $error_info['user_password'] = '密码错误';
        } else {
            //判断密码强度
            $upper = preg_match('/[A-Z]/', $data['user_password']);
            $lower = preg_match('/[a-z]/', $data['user_password']);
            $number = preg_match('/\d/', $data['user_password']);
            if ($upper + $lower + $number < 3) {
                $error_info['user_password'] = '密码强度不够';
            }
        }
        //验证验证码$_SESSION['captcha']
        if ($_POST['captcha'] != $_SESSION['captcha']) {
            $error_info['captcha'] = '验证码错误';
        }
        if (isset($error_info)) {
            //有错误
            $info = var_dump($error_info);
            $this->jumpWait(Factory::U('front/User/register'), $info);
        }
        //验证了数据的合法性
        //处理密码
        //随机的salt
        $data['password_salt'] = substr(md5(mt_rand(0, 99999)), 10, 5);
        //password的哈希算法
        $data['user_password'] = md5($data['user_password'] . $data['password_salt']);
        //生成激活码
        $active_code = md5(mt_rand(10000, 99999) . time());
        //调用模型
        $user_model = Factory::getModel('user');
        $data['active_code'] = $active_code;
        //激活码的生成时间
        $data['active_code_time'] = time();
        //插入数据库
        $user_id = $user_model->insertValue($data);
        //插入成功我们需要给用户发送邮件,激活
        //发送邮件的存储地址
        $email_address = 'E:/temp/email/' . $data['user_name'] . 'email.txt';
        //激活邮件的链接地址
        $active_url = 'www.myweb.com' . Factory::U('front/user/active', ['id' => $user_id, 'code' => $active_code]);
        $body = <<<BODY
dear:{$data['user_name']}:
感谢注册意灵魔法馆:请点击下面的链接地址完成激活
<a href="{$active_url}"></a>
你的密码为:{$data['user_password']}
BODY;
        //邮件标题
        $subject = '意灵魔法馆激活邮件';
        //收件人
        $to = $data['user_email'];
        $email_content = <<<CONTENT
标题:$subject
收件人:$to
邮件内容:$body
CONTENT;

        //发送邮件
        file_put_contents($email_address, $email_content);
        echo "邮件已经发送,请尽快激活邮件";
    }

    //这个动作是完成对邮件激活的处理
    public function activeAction()
    {

        //判断用户是否在邮件时效内提交，如果未提交，激活邮件失效
        //获取数据
        //获取用户Id
        $user_id = $_GET['id'];
        //获取用户激活码
        $user_code = $_GET['code'];
        //获取用户数据
        $user_model = Factory::getModel('user');
        //需要校验用户的合理性
        $user = $user_model->checkByCode($user_id, $user_code);


        if (!$user) {
            //不合理跳转到首页
            $this->jumpWait(Factory::U('front/Content/index'), '你的激活码有问题');
        }
        //用户合理，激活码合理，在判断激活码是否过期
        if ($user['active_code_time'] < time() - 7 * 24 * 3600) {
            //激活码过期
            //重新发送邮件,重新生成盐值
            $data['password_salt'] = $salt = substr(md5(mt_rand(0, 99999)), 10, 5);

            //这里存储一个明文密码,方便用户
            $user_password = substr(md5(mt_rand(0, 99999) . time()), 0, 10);
            //哈希密码生产混合字符串
            $data['user_password'] = md5($user_password . $salt);
            //生成激活码
            $data['active_code'] = md5(mt_rand(0, 11111) . time());
            //记录激活码生成的时间
            $data['active_code_time'] = time();
            //得到用户id
            $data['user_id'] = $user_id;
            $data['is_actived'] = 1;
            //更新
            $user_model->updateValue($data);

            //重新发送
            $this->sendActive($user['user_id'], $user_password);
            //提示激活不成功，重新激活
            $this->jumpWait(Factory::U('front/User/index'), '重新激活');
        }
        //激活码未过期
        $data['user_id'] = $user_id;

        //使之成为已激活状态
        $data['is_actived'] = 1;
        //更新
        $user_model->updateValue($data);

        $this->jumpWait(Factory::U('front/User/login'), '激活成功');

    }

    public function sendActive($user_id, $user_password)
    {

        //获取用户信息
        $user_model = Factory::getModel('user');

        $user = $user_model->find($user_id);
        $email_address = 'E:/temp/email/' . $user['user_name'] . 'email.txt';
        //激活邮件的链接地址
        $active_url = 'www.myweb.com' . Factory::U('front/user/active', ['id' => $user_id, 'code' => $user['active_code']]);
        $body = <<<BODY
dear:{$user['user_name']}:
感谢注册意灵魔法馆:请点击下面的链接地址完成激活
<a href="{$active_url}"></a>
你的密码为:$user_password
BODY;
        //邮件标题
        $subject = '意灵魔法馆激活邮件';
        //收件人
        $to = $user['user_email'];
        $email_content = <<<CONTENT
标题:$subject
收件人:$to
邮件内容:$body
CONTENT;
        file_put_contents($email_address, $email_content);

    }

    public function loginAction()
    {
        $this->smarty->display('user/login.html');
    }

    public function loginProcessAction()
    {
        //收集数据
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        //分布验证
        //先验证用户的合法
        $user_model = Factory::getModel('user');
        $user = $user_model->getName($user_name);

        if (!$user) {
            //用户不存在
            $this->jumpWait(Factory::U('front/User/login'), '用户信息错误');
        }
        //在判断密码
        if ($user['user_password'] != md5($user_password . $user['password_salt'])) {
            $this->jumpWait(Factory::U('front/User/login'), '用户密码错误');
        }
        //判断验证码
        if ($_POST['captcha'] != $_SESSION['captcha']) {
            $this->jumpWait(Factory::U('front/User/login'), '用户信息错误');
        }
        //用户合法,判断是否激活
        if ($user['is_actived'] == 0) {
            //没有激活
            $this->jumpWait(Factory::U('front/User/login'), '请先激活');
        }
        //激活，设置登陆标示
        @session_start();
        //通过session来存储我们的值
        $_SESSION['user'] = $user;
        //跳转到来源页面
        $return_url = Factory::U('front/content/index');

        $this->jumpNow($return_url);

    }

    public function loginOutAction()
    {
        unset($_SESSION['user']);
        $this->jumpNow(Factory::U('front/Content/index'));
    }

    public function CaptchaAction()
    {
        $captcha = new Captcha;
        $captcha->mkImage();
    }
}






