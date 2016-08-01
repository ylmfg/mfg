<?php
/* Smarty version 3.1.29, created on 2016-06-08 23:44:12
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\back\view\layout\layout.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57583d4cc65673_03993113',
  'file_dependency' => 
  array (
    'bd78e9510bc18f29917b032547a2d097c3c1fd01' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\back\\view\\layout\\layout.html',
      1 => 1465400647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57583d4cc65673_03993113 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blank">
    <meta name="format-detection" content="telephone=no">
    <title>分类列表 - 有问必答</title>
    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/back/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/back/css/icon.css">
    <link type="text/css" rel="stylesheet" href="<?php echo @constant('ROOT');?>
web/back/css/common.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/back/js/jquery.2.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/back/js/framework.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/back/js/global.js"><?php echo '</script'; ?>
>

    <!--[if lte IE 8]>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ROOT');?>
web/back/js/respond.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<div class="aw-header">
    <button class="btn btn-sm mod-head-btn pull-left">
        <i class="icon icon-bar"></i>
    </button>

    <div class="mod-header-user">
        <ul class="pull-right">

            <li class="dropdown username">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img width="30" src="<?php echo @constant('ROOT');?>
web/back/img/avatar-mid-img.png" class="img-circle">
                    <?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>

                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu pull-right mod-user">
                    <li>
                        <a href="" target="_blank">
                            <i class="icon icon-user"></i>
                            账户
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo framewrok\core\Factory::U('back/User/loginOut');?>
">
                            <i class="icon icon-logout"></i>
                            退出
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="aw-side ps-container" id="aw-side">
    <div class="mod">
        <div class="mod-logo">
            <img class="pull-left" src="<?php echo @constant('ROOT');?>
web/back/img/logo.png" alt="">
            <h1>有问必答</h1>
        </div>

        <div class="mod-message">
            <div class="message">
                <a class="btn btn-sm" href="index.php?m=home&amp;c=Content&amp;a=index" target="_blank" title="首页">
                    <i class="icon icon-home"></i>
                </a>

                <a class="btn btn-sm" href="login.html" title="退出">
                    <i class="icon icon-logout"></i>
                </a>
            </div>
        </div>

        <ul class="mod-bar">
            <input type="hidden" id="hide_values" val="0">
            <li>
                <a href="index.php?m=back&amp;c=Manage&amp;a=info" class="icon icon-ul active">
                    <span>摘要信息</span>
                </a>
            </li>

            <li>
                <a href="javascript:;" class=" icon icon-reply" data="icon">
                    <span>内容管理</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="<?php echo framewrok\core\Factory::U('back/Category/list');?>
">
                            <span>分类管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo framewrok\core\Factory::U('back/Question/list');?>
">
                            <span>问题管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo framewrok\core\Factory::U('back/Topic/list');?>
">
                            <span>话题管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo framewrok\core\Factory::U('back/Question/zhihu');?>
">
                            <span>采集管理</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class=" icon icon-user" data="icon">
                    <span>用户管理</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="user.html">
                            <span>用户列表</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?m=back&amp;c=Role&amp;a=list">
                            <span>用户角色</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="icon icon-setting" data="icon">
                    <span>全局设置</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="site.html">
                            <span>站点信息</span>
                        </a>
                    </li>
                    <li>
                        <a href="regedit.html">
                            <span>注册访问</span>
                        </a>
                    </li>
                    <li>
                        <a href="mail.html">
                            <span>邮件设置</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class=" icon icon-job" data="icon">
                    <span>工具</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="tool.html">
                            <span>系统维护</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_2521657583d4cb9a443_35045956',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<div class="aw-footer">
    <p>
        Copyright &copy; 2016-2099 - Powered By
        <a href="http://hellokang.net/" target="blank">有问必答 1.0</a>
    </p>
</div>


</body>
</html><?php }
/* {block 'content'}  file:layout/layout.html */
function block_2521657583d4cb9a443_35045956($_smarty_tpl, $_blockParentStack) {
?>

    <div style="width: 235px; display: none; left: 0px; bottom: 3px;" class="ps-scrollbar-x-rail">
        <div style="left: 0px; width: 0px;" class="ps-scrollbar-x"></div>
    </div>
    <div style="top: 0px; height: 607px; display: inherit; right: 0px;" class="ps-scrollbar-y-rail">
        <div style="top: 0px; height: 560px;" class="ps-scrollbar-y"></div>
    </div>
    <div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;">
        <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 585px; display: inherit; right: 0px;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 520px;"></div>
    </div>
</div>
<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <span class="pull-left">分类管理</span>
            </h3>
        </div>

        <div class="tab-content mod-body">
            <div class="alert alert-success hide error_message"></div>

            <div class="table-responsive">
                <form id="category_form" action="#" method="post" onsubmit="return false"></form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="">分类标题</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['category_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_category_0_saved_item = isset($_smarty_tpl->tpl_vars['category']) ? $_smarty_tpl->tpl_vars['category'] : false;
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$__foreach_category_0_saved_local_item = $_smarty_tpl->tpl_vars['category'];
?>
                    <tr>
                        <td style="text-align: left;" class="">
                            <a href="#"><?php echo preg_replace('!^!m',str_repeat('--',$_smarty_tpl->tpl_vars['category']->value['deep']),$_smarty_tpl->tpl_vars['category']->value['cate_title']);?>
</a>
                        </td>
                        <td>
                            <div class="col-sm-6 clo-xs-12 col-lg-offset-3">
                                <?php echo $_smarty_tpl->tpl_vars['category']->value['cate_sort'];?>

                            </div>
                        </td>
                        <td>
                            <a data-original-title="编辑" href="
index.php?a=back&c=Category&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['cate_id'];?>
" data-toggle="tooltip" class="icon icon-edit md-tip"
                               title=""></a>
                            <a href="index.php?a=back&c=Category&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['cate_id'];?>
"
                               data-original-title="移除" data-toggle="tooltip" class="icon icon-trash md-tip" title=""
                               onclick="return confirm('你真的要删除?')"></a>
                        </td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_local_item;
}
if ($__foreach_category_0_saved_item) {
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_item;
}
?>
                    </tbody>
                    <tfoot class="mod-foot-center">
                    <tr>
                        <td colspan="3">
                            <form id="add_category_form" action="index.php?m=back&c=Category&a=insert" method="post"
                                  onsubmit="">

                                <div class="form-group col-sm-4">
                                    <span class="col-sm-3 col-xs-12 mod-category-foot">分类标题</span>
                                    <div class="col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="category_title"></div>
                                </div>

                                <div class="form-group col-sm-4">
                                    <span class="col-sm-3 col-xs-12 mod-category-foot">父级分类:</span>
                                    <div class="col-sm-9 col-xs-12">
                                        <select name="parent_id" class="form-control">
                                            <option value=0>顶级分类</option>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['category_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_category_1_saved_item = isset($_smarty_tpl->tpl_vars['category']) ? $_smarty_tpl->tpl_vars['category'] : false;
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$__foreach_category_1_saved_local_item = $_smarty_tpl->tpl_vars['category'];
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['cate_id'];?>
">
                                                <?php echo preg_replace('!^!m',str_repeat("---",$_smarty_tpl->tpl_vars['category']->value['deep']),$_smarty_tpl->tpl_vars['category']->value['cate_title']);?>

                                            </option>
                                            <?php
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_1_saved_local_item;
}
if ($__foreach_category_1_saved_item) {
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_1_saved_item;
}
?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-2">
                                    <span class="col-sm-3 col-xs-12 mod-category-foot">排序</span>
                                    <div class="col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" value="0" name="sort"></div>
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <input type="submit" value="添加分类" class="form-control btn-primary btn">
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    <div id="target-category" class="hide">
        <option value="1">默认分类</option>
    </div>
</div>
<?php
}
/* {/block 'content'} */
}
