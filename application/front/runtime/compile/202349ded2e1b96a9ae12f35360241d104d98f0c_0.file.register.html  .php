<?php
/* Smarty version 3.1.29, created on 2016-07-02 13:19:38
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\front\view\user\register.html  " */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57774eea578758_33684381',
  'file_dependency' => 
  array (
    '202349ded2e1b96a9ae12f35360241d104d98f0c' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\front\\view\\user\\register.html  ',
      1 => 1464713709,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57774eea578758_33684381 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
    <meta content="webkit" name="renderer">
    <title>注册 - 有问必答</title>
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
web/front/css/default/register.css">

    <style type="text/css">
        .fancybox-margin{
            margin-right:17px;
        }
    </style>
    <?php echo '<script'; ?>
 type="text/javascript">
        function changeCaptcha(){
            var oImag=document.getElementById('captcha');
            oImag.src ="Captcha/"+Math.random();
        }
    <?php echo '</script'; ?>
>
</head>

<body>
<noscript id="noscript" unselectable="on">
    <div class="aw-404 aw-404-wrap container">
        <img src="<?php echo @constant('ROOT');?>
web/common/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>

<div class="aw-register-box">
    <div class="mod-head">
        <a href="">
            <img alt="" src="<?php echo @constant('ROOT');?>
web/front/img/login_logo.png"></a>
        <h1>注册新用户</h1>
    </div>
    <div class="mod-body">
        <form id="register_form" method="post" action="<?php echo framewrok\core\Factory::U('front/User/registerProcess');?>
" class="aw-register-form">

            <ul>
                <li class="alert alert-danger hide error_message text-left"> <i class="icon icon-delete"></i> <em></em>
                </li>
                <li>
                    <input type="text" value="" tips="" placeholder="字母数字下划线，不以数字开头" name="user_name" class="aw-register-name form-control"></li>
                <li>
                    <input type="text" errortips="邮箱格式不正确" value="" tips="请输入你常用的电子邮箱作为你的账号" name="user_email" placeholder="邮箱" class="aw-register-email form-control"></li>
                <li>
                    <input type="text" errortips="密码不符合规则" tips="" placeholder="6-12 个字符, 同时包含大小写与数字" name="user_password" class="aw-register-pwd form-control">
                </li>
                <li class="aw-register-verify">
                    <img src="<?php echo framewrok\core\Factory::U('front/User/Captcha');?>
" onclick="changeCaptcha()" id="captcha" class="pull-right">

                    <input type="text" placeholder="验证码" name="captcha" class="form-control"></li>
                <li class="last">
                    <label>
                        <input type="checkbox" name="agreement" value="agree" checked="checked">我同意</label>
                    <a class="aw-agreement-btn" id="agreement-link" href="javascript:;">用户协议</a>
                    <a class="pull-right" href="?/account/login/">已有账号?</a>
                    <div class="aw-register-agreement hide">
                        <div id="register_agreement" class="aw-register-agreement-txt">
                            当您申请用户时，表示您已经同意遵守本规章。
                            <br>
                            欢迎您加入本站点参与交流和讨论，本站点为社区，为维护网上公共秩序和社会稳定，请您自觉遵守以下条款：
                            <br>
                            <br>
                            一、不得利用本站危害国家安全、泄露国家秘密，不得侵犯国家社会集体的和公民的合法权益，不得利用本站制作、复制和传播下列信息：
                            <br>
                            &#12288;（一）煽动抗拒、破坏宪法和法律、行政法规实施的；
                            <br>
                            &#12288;（二）煽动颠覆国家政权，推翻社会主义制度的；
                            <br>
                            &#12288;（三）煽动分裂国家、破坏国家统一的；
                            <br>
                            &#12288;（四）煽动民族仇恨、民族歧视，破坏民族团结的；
                            <br>
                            &#12288;（五）捏造或者歪曲事实，散布谣言，扰乱社会秩序的；
                            <br>
                            &#12288;（六）宣扬封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；
                            <br>
                            &#12288;（七）公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；
                            <br>
                            &#12288;（八）损害国家机关信誉的；
                            <br>
                            &#12288;（九）其他违反宪法和法律行政法规的；
                            <br>
                            &#12288;（十）进行商业广告行为的。
                            <br>
                            <br>
                            二、互相尊重，对自己的言论和行为负责。
                            <br>
                            三、禁止在申请用户时使用相关本站的词汇，或是带有侮辱、毁谤、造谣类的或是有其含义的各种语言进行注册用户，否则我们会将其删除。
                            <br>
                            四、禁止以任何方式对本站进行各种破坏行为。
                            <br>
                            五、如果您有违反国家相关法律法规的行为，本站概不负责，您的登录信息均被记录无疑，必要时，我们会向相关的国家管理部门提供此类信息。
                        </div>
                    </div>

                </li>
                <li class="clearfix">
                    <input type="submit" onclick="" class="btn btn-large btn-blue btn-block" value="注册">
                </li>
            </ul>
        </form>
    </div>
    <div class="mod-footer"></div>
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

</body>

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
<?php echo '<script'; ?>
 type="text/javascript">
    // $(".")
<?php echo '</script'; ?>
>
</html><?php }
}
