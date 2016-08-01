<?php
/* Smarty version 3.1.29, created on 2016-05-14 23:43:07
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\test\view\view_category.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5737478b57b485_13469912',
  'file_dependency' => 
  array (
    '84a8fe62fb4d77510c802c2edb9df5008b484ace' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\test\\view\\view_category.html',
      1 => 1463144044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5737478b57b485_13469912 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>new file</title>
</head>
<body>
<h1>分类列表</h1>
<table>
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
<td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</td>
</tr>
<?php
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_local_item;
}
if ($__foreach_category_0_saved_item) {
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_item;
}
?>
</table>
</body>
</html>
<?php }
}
