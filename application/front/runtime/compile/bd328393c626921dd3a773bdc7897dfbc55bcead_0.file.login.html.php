<?php
/* Smarty version 3.1.29, created on 2016-06-08 19:55:39
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\front\view\user\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575807bb2f9260_40477371',
  'file_dependency' => 
  array (
    'bd328393c626921dd3a773bdc7897dfbc55bcead' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\front\\view\\user\\login.html',
      1 => 1465302988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575807bb2f9260_40477371 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
    <meta content="webkit" name="renderer">
    <title>登录 - 有问必答</title>
    <meta content="有问必答,知识社区,社交社区,问答社区" name="keywords">
    <meta content="有问必答 社交化知识社区" name="description">
    <link type="image/x-icon" rel="shortcut icon" href="<?php echo @constant('ROOT');?>
web/front/img/favicon.ico">

    <link href="<?php echo @constant('ROOT');?>
web/front/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="<?php echo @constant('ROOT');?>
web/front/css/icon.css" type="text/css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/front/css/default/common.css">
    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/front/css/default/link.css">
    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/front/js/plug_module/style.css">
    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/front/css/default/login.css">

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/front/js/jquery.2.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('ROOT');?>
web/front/js/compatibility.js" type="text/javascript"><?php echo '</script'; ?>
>
    <!--[if lte IE 8]>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/front/js/respond.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <style type="text/css">
        .fancybox-margin {
            margin-right:17px;
        }
    </style>

</head>

<body>
<noscript id="noscript" unselectable="on">
    <div class="aw-404 aw-404-wrap container">
        <img src="<?php echo @constant('ROOT');?>
web/common/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
<div id="wrapper">
    <div class="aw-login-box">
        <div class="mod-body clearfix">
            <div class="content pull-left">
                <h1 class="logo">
                    <a href=""></a>
                </h1>
                <h2>有问必答</h2>
                <form action="<?php echo framewrok\core\Factory::U('front/User/loginProcess');?>
" onsubmit="" method="post" id="login_form">
                    <input type="hidden" value="" name="return_url">
                    <ul>
                        <li>
                            <input type="text" name="user_name" placeholder="邮箱 / 用户名" class="form-control" id="aw-login-user-name"></li>
                        <li>
                            <input type="password" name="user_password" placeholder="密码" class="form-control" id="aw-login-user-password"></li>
                        <li class="aw-register-verify">
                            <input type="text" placeholder="验证码" name="captcha" class="form-control" size="5">
                            <img src="<?php echo framewrok\core\Factory::U('front/User/Captcha');?>
" onclick="changeCaptcha()" id="captcha" class="pull-right">
                        </li><br><br>
                        <li class="alert alert-danger hide error_message"> <i class="icon icon-delete"></i> <em></em>
                        </li>
                        <li class="last">
                            <input type="submit" class="pull-right btn btn-large btn-primary" id="login_submit" onclick="" value="登录" >
                            <label>
                                <input type="checkbox" name="net_auto_login" value="1">记住我</label>
                            <a href="forget_password.html">&nbsp;&nbsp;忘记密码</a>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="side-bar pull-left"></div>
        </div>
        <div class="mod-footer">
            <span>还没有账号?</span>
            &nbsp;&nbsp;
            <a href="register.html">立即注册</a>
            &nbsp;&nbsp;•&nbsp;&nbsp;
            <a href="">游客访问</a>
        </div>
    </div>
</div>

<div class="aw-footer-wrap">
    <div class="aw-footer">
        Copyright &copy; 2016-2099, All Rights Reserved
		<span class="hidden-xs">
			Powered By
			<a target="blank" href="http://hellokang.net/">有问必答 1.0</a>
		</span>

    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    function changeCaptcha(){
        var oImag=document.getElementById('captcha');
        //window.alert(oImag);
        oImag.src = 'Captcha/'+Math.random();
        //window.alert(oImag.src);

    }

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
