<?php
/* Smarty version 3.1.29, created on 2016-06-02 14:28:28
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\back\view\Topic\topic_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574fd20c2c8987_15730907',
  'file_dependency' => 
  array (
    '52f3d8666a2c7e03bb228b37c6a4106f453cf5b1' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\back\\view\\Topic\\topic_add.html',
      1 => 1464848906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/layout.html' => 1,
  ),
),false)) {
function content_574fd20c2c8987_15730907 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_17871574fd20c291e87_24256130',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:Topic/topic_add.html */
function block_17871574fd20c291e87_24256130($_smarty_tpl, $_blockParentStack) {
?>

        <div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;">
            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 607px; display: inherit; right: 0px;">
            <div class="ps-scrollbar-y" style="top: 0px; height: 560px;"></div>
        </div>
    </div>

    <div class="aw-content-wrap">
        <form action="index.php?m=back&c=Topic&a=insert" id="settings_form" method="post" onsubmit="" enctype="multipart/form-data">
        <div class="mod">
            <div class="mod-head">
                <h3>
                    <ul class="nav nav-tabs">
                        <li><a href="<?php echo framewrok\core\Factory::U('back/Topic/list');?>
">话题管理</a></li>
                        <li class="active"><a href="javascript:;">新建话题</a></li>
                    </ul>
                </h3>
            </div>

            <div class="tab-content mod-content">
                <table class="table table-striped">
                    <tbody><tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">缩略图:</span>
                                <div class="col-sm-5 col-xs-8">
									<input type="file" name="topic_img" class="file-input">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">话题标题:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" name="topic_title" value="" class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">话题描述:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <textarea class="form-control" name="topic_descrip"></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody><tfoot>
                    <tr>
                        <td>
                            <input type="submit" value="保存设置" class="btn btn-primary center-block">
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
    </form></div>
<?php
}
/* {/block 'content'} */
}
