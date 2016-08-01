<?php
/* Smarty version 3.1.29, created on 2016-05-14 23:38:01
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\test\view\view_article.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57374659b0b2f1_17991655',
  'file_dependency' => 
  array (
    '1a68d8a1e28a9f390dbf2395a5bd18a30b2e27b9' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\test\\view\\view_article.html',
      1 => 1463144353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57374659b0b2f1_17991655 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>new file</title>
</head>
<body>
<h1>文章列表</h1>
<table>
<?php
$_from = $_smarty_tpl->tpl_vars['article_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_article_0_saved_item = isset($_smarty_tpl->tpl_vars['article']) ? $_smarty_tpl->tpl_vars['article'] : false;
$_smarty_tpl->tpl_vars['article'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['article']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
$__foreach_article_0_saved_local_item = $_smarty_tpl->tpl_vars['article'];
?>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['article']->value['create_at'];?>
</td>
</tr>
<?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_local_item;
}
if ($__foreach_article_0_saved_item) {
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_item;
}
?>
</table>
</body>
</html>
<?php }
}
