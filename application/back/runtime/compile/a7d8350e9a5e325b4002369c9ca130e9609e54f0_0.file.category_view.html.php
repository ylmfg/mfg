<?php
/* Smarty version 3.1.29, created on 2016-06-02 00:35:02
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\back\view\category\category_view.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574f0eb64e4a77_84287034',
  'file_dependency' => 
  array (
    'a7d8350e9a5e325b4002369c9ca130e9609e54f0' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\back\\view\\category\\category_view.html',
      1 => 1464798898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/layout.html' => 1,
  ),
),false)) {
function content_574f0eb64e4a77_84287034 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_12458574f0eb640dcc1_93607955',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:category/category_view.html */
function block_12458574f0eb640dcc1_93607955($_smarty_tpl, $_blockParentStack) {
?>

        <div style="width: 235px; display: none; left: 0px; bottom: 3px;" class="ps-scrollbar-x-rail">
            <div style="left: 0px; width: 0px;" class="ps-scrollbar-x"></div>
        </div>
        <div style="top: 0px; height: 607px; display: inherit; right: 0px;" class="ps-scrollbar-y-rail">
            <div style="top: 0px; height: 560px;" class="ps-scrollbar-y"></div>
        </div>
    <div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 585px; display: inherit; right: 0px;"><div class="ps-scrollbar-y" style="top: 0px; height: 520px;"></div></div></div>
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
							<th>问题数量</th>
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
	<td><?php echo $_smarty_tpl->tpl_vars['category']->value['question_count'];?>
</td>
                            <td>
                                <div class="col-sm-6 clo-xs-12 col-lg-offset-3">
								<?php echo $_smarty_tpl->tpl_vars['category']->value['cate_sort'];?>

								</div>
                            </td>
                            <td>
<a data-original-title="编辑" href="<?php echo framewrok\core\Factory::U('back/Category/edit',array('id'=>$_smarty_tpl->tpl_vars['category']->value['cate_id']));?>
" data-toggle="tooltip" class="icon icon-edit md-tip" title=""></a>
                                <a href="<?php echo framewrok\core\Factory::U('back/Category/delete',array('id'=>$_smarty_tpl->tpl_vars['category']->value['cate_id']));?>
" data-original-title="移除" data-toggle="tooltip" class="icon icon-trash md-tip" title="" onclick="return confirm('你真的要删除?')"></a>
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
                                <form id="add_category_form" action="<?php echo framewrok\core\Factory::U('back/Category/insert');?>
" method="post" onsubmit="">

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
"><?php echo preg_replace('!^!m',str_repeat("---",$_smarty_tpl->tpl_vars['category']->value['deep']),$_smarty_tpl->tpl_vars['category']->value['cate_title']);?>
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
