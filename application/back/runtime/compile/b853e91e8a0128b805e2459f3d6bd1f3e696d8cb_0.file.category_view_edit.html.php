<?php
/* Smarty version 3.1.29, created on 2016-05-31 16:50:58
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\back\view\category\category_view_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574d5072ee4973_61218386',
  'file_dependency' => 
  array (
    'b853e91e8a0128b805e2459f3d6bd1f3e696d8cb' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\back\\view\\category\\category_view_edit.html',
      1 => 1464684652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/layout.html' => 1,
  ),
),false)) {
function content_574d5072ee4973_61218386 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_3343574d5072c50650_05067278',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

  <?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:category/category_view_edit.html */
function block_3343574d5072c50650_05067278($_smarty_tpl, $_blockParentStack) {
?>

        <div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;">
            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 607px; display: inherit; right: 0px;">
            <div class="ps-scrollbar-y" style="top: 0px; height: 560px;"></div>
        </div>
    </div>

    <div class="aw-content-wrap">
        <form  method="post" id="category_form" action="<?php echo framewrok\core\Factory::U('back/Category/update');?>
">
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['categoryNow']->value['cate_id'];?>
" name="cate_id">
        <div class="mod">
            <div class="mod-head">
                <h3>
                    <span class="pull-left">分类编辑</span>
                </h3>
            </div>
            <div class="tab-content mod-content">
                <table class="table table-striped">
                    <tbody>
					<tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">分类标题:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['categoryNow']->value['cate_title'];?>
" name="cate_title" class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">父级分类:</span>
                                <div class="col-sm-5 col-xs-8">
							<select class="form-control" name="prent_id">
								<option value="0">无</option>
								 <?php
$_from = $_smarty_tpl->tpl_vars['categoryAll']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cateAll_0_saved_item = isset($_smarty_tpl->tpl_vars['cateAll']) ? $_smarty_tpl->tpl_vars['cateAll'] : false;
$_smarty_tpl->tpl_vars['cateAll'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cateAll']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cateAll']->value) {
$_smarty_tpl->tpl_vars['cateAll']->_loop = true;
$__foreach_cateAll_0_saved_local_item = $_smarty_tpl->tpl_vars['cateAll'];
?>
								<option value=<?php echo $_smarty_tpl->tpl_vars['cateAll']->value['cate_id'];?>

<?php if ($_smarty_tpl->tpl_vars['categoryNow']->value['prent_id'] == $_smarty_tpl->tpl_vars['cateAll']->value['cate_id']) {?>
 selected
<?php }?>
								
								>
								<?php echo preg_replace('!^!m',str_repeat('--',$_smarty_tpl->tpl_vars['cateAll']->value['deep']),$_smarty_tpl->tpl_vars['cateAll']->value['cate_title']);?>

								</option>
								<?php
$_smarty_tpl->tpl_vars['cateAll'] = $__foreach_cateAll_0_saved_local_item;
}
if ($__foreach_cateAll_0_saved_item) {
$_smarty_tpl->tpl_vars['cateAll'] = $__foreach_cateAll_0_saved_item;
}
?>
							</select>
						       </div>
                            </div>
                        </td>
                    </tr>
						<tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">排序:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['categoryNow']->value['cate_sort'];?>
" name="cate_sort" class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody><tfoot>
                    <tr>
                        <td>
                            <input type="submit" class="btn btn-primary center-block" value="保存设置">
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </form>
    </div>

<?php
}
/* {/block 'content'} */
}
