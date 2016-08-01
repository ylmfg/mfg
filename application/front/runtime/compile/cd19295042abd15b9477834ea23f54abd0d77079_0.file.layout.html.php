<?php
/* Smarty version 3.1.29, created on 2016-06-26 18:57:53
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\front\view\layout\layout.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576fb5313b9825_15597183',
  'file_dependency' => 
  array (
    'cd19295042abd15b9477834ea23f54abd0d77079' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\front\\view\\layout\\layout.html',
      1 => 1465641937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576fb5313b9825_15597183 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html class="">
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
	<meta name="renderer" content="webkit">
	<title>发现 - 有问必答</title>
	<meta name="keywords" content="有问必答,知识社区,社交社区,问答社区">
	<meta name="description" content="有问必答 社交化知识社区">
	<base href="">
	<!--[if IE]>
</base>
<![endif]-->
<link href="<?php echo @constant('ROOT');?>
web/front/img/favicon.ico" rel="shortcut icon" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="<?php echo @constant('ROOT');?>
web/front/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo @constant('ROOT');?>
web/front/css/icon.css">

<link href="<?php echo @constant('ROOT');?>
web/front/css/default/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo @constant('ROOT');?>
web/front/css/default/link.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 src="<?php echo @constant('ROOT');?>
web/front/js/jquery.2.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/front/js/compatibility.js"><?php echo '</script'; ?>
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

<style type="text/css">.fancybox-margin{margin-right:17px;}</style>

</head>

<body>

<div class="aw-top-menu-wrap">
	<div class="container">
		<!-- logo -->
		<div class="aw-logo hidden-xs">
			<a href=""></a>
		</div>
		<!-- end logo -->
		<!-- 搜索框 -->
		<div class="aw-search-box  hidden-xs hidden-sm">
			<form class="navbar-search" action="?/search/" id="global_search_form" method="post">
				<input type="text" class="form-control search-query" placeholder="搜索问题、话题或人" autocomplete="off" name="q" id="aw-search-query">
				<span title="搜索" id="global_search_btns" onclick="$('#global_search_form').submit();"> <i class="icon icon-search"></i>
				</span>
				<div class="aw-dropdown">
					<div class="mod-body">
						<p class="title">输入关键字进行搜索</p>
						<ul class="aw-dropdown-list hide"></ul>
						<p class="search">
							<span>搜索:</span>
							<a onclick="$('#global_search_form').submit();"></a>
						</p>
					</div>
					<div class="mod-footer">
						<a href="publish.html" onclick="" class="pull-right btn btn-mini btn-success publish">发起问题</a>
					</div>
				</div>
			</form>
		</div>
		<!-- end 搜索框 -->
		<!-- 导航 -->
		<div class="aw-top-nav navbar">
			<div class="navbar-header">
				<button class="navbar-toggle pull-left">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.html" class="active"> <i class="icon icon-list"></i>
							发现
						</a>
					</li>
					<li>
						<a href="topic_index.html">
							<i class="icon icon-topic"></i>
							话题
						</a>
					</li>
					<li>
						<a style="font-weight:bold;">· · ·</a>
						<div class="dropdown-list pull-right">
							<ul id="extensions-nav-list"></ul>
						</div>
					</li>
				</ul>
			</nav>
		</div>
		<!-- end 导航 -->
		<!-- 未登录展示 -->
        <?php if (is_null($_smarty_tpl->tpl_vars['user']->value)) {?>
		<div class="aw-user-nav">
			<!-- 登陆&注册栏 -->
			<a class="login btn btn-normal btn-primary" href="<?php echo framewrok\core\Factory::U('front/User/login');?>
">登录</a>
			<a class="register btn btn-normal btn-success" href="<?php echo framewrok\core\Factory::U('front/User/register');?>
">注册</a>
			<!-- end 登陆&注册栏 -->
		</div>
        <?php } else { ?>
		<!-- 登陆成功展示用户栏 -->
		<div class="aw-user-nav">
			<!-- 登陆&注册栏 -->
			<a href="?/people/kang" class="aw-user-nav-dropdown">
				<img alt="kang" src="<?php echo @constant('ROOT');?>
web/front/img/avatar-mid-img.png"></a>
			<div class="aw-dropdown dropdown-list pull-right">
				<ul class="aw-dropdown-list">
					<li class="hidden-xs">
						<a href="user_set.html">
							<i class="icon icon-setting"></i>
							设置
						</a>
					</li>
					<li class="hidden-xs">
						<a href="admin/login.html">
							<i class="icon icon-job"></i>
							管理
						</a>
					</li>
					<li>
						<a href="<?php echo framewrok\core\Factory::U('front/User/loginOut');?>
">
							<i class="icon icon-logout"></i>
							退出
						</a>
					</li>
				</ul>
			</div>
			<!-- end 登陆&注册栏 -->
		</div>
        <?php }?>
		<!-- end 用户栏 -->
		<!-- 发起 -->
		<div class="aw-publish-btn">

			<a id="header_publish" class="btn-primary" href="?/publish/" onclick="">
				<i class="icon icon-ask"></i>
				发起
			</a>
			<div class="dropdown-list pull-right">
				<ul>
					<li>
						<a href="<?php echo framewrok\core\Factory::U('front/Content/publish');?>
" onclick="">问题</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- end 发起 -->
	</div>
</div>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_30585576fb531382d07_84282017',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<div class="aw-footer-wrap">
	<div class="aw-footer">
		Copyright &copy; 2016-2099, All Rights Reserved
		<span class="hidden-xs">
			Powered By
			<a href="http://hellokang.net/" target="blank">有问必答 1.0</a>
		</span>

	</div>
</div>
<?php echo '<script'; ?>
 type="<?php echo @constant('ROOT');?>
web/front/js/anwser.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'content'}  file:layout/layout.html */
function block_30585576fb531382d07_84282017($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content'} */
}
