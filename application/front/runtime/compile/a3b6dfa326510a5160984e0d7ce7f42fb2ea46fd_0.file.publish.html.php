<?php
/* Smarty version 3.1.29, created on 2016-06-08 19:25:52
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\front\view\content\publish.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575800c0296aa5_62269537',
  'file_dependency' => 
  array (
    'a3b6dfa326510a5160984e0d7ce7f42fb2ea46fd' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\front\\view\\content\\publish.html',
      1 => 1464488177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/layout.html' => 1,
  ),
),false)) {
function content_575800c0296aa5_62269537 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_2975575800c01b02f2_44595178',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:content/publish.html */
function block_2975575800c01b02f2_44595178($_smarty_tpl, $_blockParentStack) {
?>

<div class="aw-container-wrap">
	<div class="container aw-publish">
		<div class="row">
			<div class="aw-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 aw-main-content">
					<!-- tab 切换 -->
					<ul class="nav nav-tabs aw-nav-tabs active">
						<li><a href="javascript:;">文章</a></li>
						<li class="active"><a href="">问题</a></li>
						<h2 class="hidden-xs"><i class="icon icon-ask"></i> 发起</h2>
					</ul>
					<!-- end tab 切换 -->

					<form action="<?php echo framewrok\core\Factory::U('front/Content/insert');?>
" method="post" id="question_form" onsubmit="">
						<div class="aw-mod aw-mod-publish">
							
							<div class="mod-body">
								<h3>问题标题:</h3>
								<!-- 问题标题 -->
								<div class="aw-publish-title">
									<div>
										<input type="text" placeholder="问题标题..." name="question_content" id="question_contents" value="" class="form-control">
										<div class="aw-publish-suggest-question hide">
											<p class="text-color-999">你的问题可能已经有答案</p>
											<ul class="aw-dropdown-list">
											</ul>
										</div>
									</div>
									<div class="dropdown">
										<select name="category_id" class="form-control">
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
											<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['cate_id'];?>
"><?php echo preg_replace('!^!m',str_repeat('--',$_smarty_tpl->tpl_vars['category']->value['deep']),$_smarty_tpl->tpl_vars['category']->value['cate_title']);?>
</option>
										<?php
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_local_item;
}
if ($__foreach_category_0_saved_item) {
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_item;
}
?>
										</select>
									</div>
								</div>
								<!-- end 问题标题 -->

								<h3>问题补充 (选填):</h3>
								<div class="">
									<div>
										<textarea name="question_detail" class="form-control"></textarea>
									</div>
								</div>

								<h3>话题:</h3>
								<div class="aw-topic-bar">
									<div class="topic-bar clearfix">
									<?php
$_from = $_smarty_tpl->tpl_vars['topic_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_topic_1_saved_item = isset($_smarty_tpl->tpl_vars['topic']) ? $_smarty_tpl->tpl_vars['topic'] : false;
$_smarty_tpl->tpl_vars['topic'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['topic']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->value) {
$_smarty_tpl->tpl_vars['topic']->_loop = true;
$__foreach_topic_1_saved_local_item = $_smarty_tpl->tpl_vars['topic'];
?>
									<label><input type="checkbox" name="topic[]" value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_id'];?>
">
									<?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_title'];?>
</label>
									<?php
$_smarty_tpl->tpl_vars['topic'] = $__foreach_topic_1_saved_local_item;
}
if ($__foreach_topic_1_saved_item) {
$_smarty_tpl->tpl_vars['topic'] = $__foreach_topic_1_saved_item;
}
?>
									</div>

								</div>

							</div>

							<div class="mod-footer clearfix">
								<span class="aw-anonymity">
								<label>
								<input type="checkbox" class="pull-left" value="1" name="anonymous">匿名</label>
								</span>
								<input type="submit" value="确认发起" class="btn btn-primary">
							</div>
						</div>
					</form>
					
				</div>
				<!-- 侧边栏 -->
				<div class="col-sm-12 col-md-3 aw-side-bar hidden-xs">
					<!-- 问题发起指南 -->
					<div class="aw-mod publish-help">
						<div class="mod-head">
							<h3>问题发起指南</h3>
						</div>
						<div class="mod-body">
							<p><b>• 问题标题:</b> 请用准确的语言描述您发布的问题思想</p>
							<p><b>• 问题补充:</b> 详细补充您的问题内容, 并提供一些相关的素材以供参与者更多的了解您所要问题的主题思想</p>
							<p><b>• 选择话题:</b> 选择一个或者多个合适的话题, 让您发布的问题得到更多有相同兴趣的人参与. 所有人可以在您发布问题之后添加和编辑该问题所属的话题</p>
													</div>
					</div>
					<!-- end 问题发起指南 -->
				</div>
				<!-- end 侧边栏 -->
			</div>
		</div>
	</div>
</div>
<?php
}
/* {/block 'content'} */
}
