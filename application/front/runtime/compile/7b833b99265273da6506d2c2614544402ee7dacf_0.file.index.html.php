<?php
/* Smarty version 3.1.29, created on 2016-06-08 19:21:56
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\front\view\content\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5757ffd436f7b0_83787207',
  'file_dependency' => 
  array (
    '7b833b99265273da6506d2c2614544402ee7dacf' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\front\\view\\content\\index.html',
      1 => 1465136143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/layout.html' => 1,
  ),
),false)) {
function content_5757ffd436f7b0_83787207 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_200355757ffd4285187_63434697',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:content/index.html */
function block_200355757ffd4285187_63434697($_smarty_tpl, $_blockParentStack) {
?>


<div class="aw-container-wrap">
	<div class="container category">
		<div class="row">
			<div class="col-sm-12">
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
				<dl>
					<dt>
						<img alt="默认分类" src="<?php echo @constant('ROOT');?>
web/front/css/default/img/default_class_imgs.png"></dt>
					<dd>
						<p class="title">
							<a href="category.html"><?php echo $_smarty_tpl->tpl_vars['category']->value['cate_title'];?>
</a>
						</p>
						<span>默认分类描述</span>
					</dd>
				</dl>
                <?php
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_local_item;
}
if ($__foreach_category_0_saved_item) {
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_item;
}
?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="aw-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 aw-main-content">
					<!-- end 新消息通知 -->
					<!-- tab切换 -->
					<ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
						<li>
							<a href="">等待回复</a>
						</li>
						<li>
							<a id="sort_control_hot" href="">热门</a>
						</li>
						<li>
							<a href="">推荐</a>
						</li>
						<li class="active">
							<a href="">最新</a>
						</li>

						<h2 class="hidden-xs">
							<i class="icon icon-list"></i>
							发现
						</h2>
					</ul>
					<!-- end tab切换 -->

					<div class="aw-mod aw-explore-list">
						<div class="mod-body">
							<div class="aw-common-list">

                                <?php
$_from = $_smarty_tpl->tpl_vars['question_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_question_1_saved_item = isset($_smarty_tpl->tpl_vars['question']) ? $_smarty_tpl->tpl_vars['question'] : false;
$_smarty_tpl->tpl_vars['question'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['question']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
$__foreach_question_1_saved_local_item = $_smarty_tpl->tpl_vars['question'];
?>
								<div data-topic-id="2," class="aw-item active">
									<a rel="nofollow" href="people.html" data-id="1" class="aw-user-name hidden-xs">
										<img alt="" src="<?php echo @constant('ROOT');?>
web/common/avatar-max-img.png"></a>
									<div class="aw-question-content">
										<h4>
											<a href="<?php echo $_smarty_tpl->tpl_vars['question']->value['static_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['question_content'];?>
</a>
										</h4>
										<a class="pull-right text-color-999" href="<?php echo $_smarty_tpl->tpl_vars['question']->value['static_url'];?>
">回复</a>

										<p>
											<a href="category.html" class="aw-question-tags"><?php echo $_smarty_tpl->tpl_vars['question']->value['cate_title'];?>
</a>
											•
											<a class="aw-user-name" href="people.html"><?php echo $_smarty_tpl->tpl_vars['question']->value['user_name'];?>
</a>
											<span class="text-color-999">发起了问题 • 1 人关注 • 0 个回复 • 1 次浏览 • 3 天前</span>
											<span class="text-color-999 related-topic hide">• 来自相关话题</span>
										</p>

									</div>
								</div>
								<?php
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_1_saved_local_item;
}
if ($__foreach_question_1_saved_item) {
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_1_saved_item;
}
?>
							</div>
						</div>
						<div class="mod-footer">
							<div class="page-control">
								<?php echo $_smarty_tpl->tpl_vars['pageResult']->value;?>

							</div>
						</div>
					</div>
				</div>

				<!-- 侧边栏 -->
				<div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
					<div class="aw-mod aw-text-align-justify">
						<div class="mod-head">
							<a class="pull-right" href="topic_index.html">更多 &gt;</a>
							<h3>热门话题</h3>
						</div>
						<div class="mod-body">
                            <?php
$_from = $_smarty_tpl->tpl_vars['topic_question_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_topic_question_2_saved_item = isset($_smarty_tpl->tpl_vars['topic_question']) ? $_smarty_tpl->tpl_vars['topic_question'] : false;
$_smarty_tpl->tpl_vars['topic_question'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['topic_question']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['topic_question']->value) {
$_smarty_tpl->tpl_vars['topic_question']->_loop = true;
$__foreach_topic_question_2_saved_local_item = $_smarty_tpl->tpl_vars['topic_question'];
?>
							<dl>
								<dt class="pull-left aw-border-radius-5">
									<a href="topic.html">
										<img src="<?php echo @constant('ROOT');?>
web/common/topic-mid-img.png" alt=""></a>
								</dt>
								<dd class="pull-left">
									<p class="clearfix">
										<span class="topic-tag">
											<a data-id="2" class="text" href="<?php echo framewrok\core\Factory::U('front/Topic/topicIndex');?>
">
                                                <?php echo $_smarty_tpl->tpl_vars['topic_question']->value['topic_title'];?>

                                            </a>
										</span>
									</p>
									<p> <b><?php echo $_smarty_tpl->tpl_vars['topic_question']->value['question_num'];?>
</b>
										个问题, <b>1</b>
										人关注
									</p>
								</dd>
							</dl>
						    <?php
$_smarty_tpl->tpl_vars['topic_question'] = $__foreach_topic_question_2_saved_local_item;
}
if ($__foreach_topic_question_2_saved_item) {
$_smarty_tpl->tpl_vars['topic_question'] = $__foreach_topic_question_2_saved_item;
}
?>
						</div>
					</div>
					<div class="aw-mod aw-text-align-justify">
						<div class="mod-head">
							<a class="pull-right" href="?/people/">更多 &gt;</a>
							<h3>热门用户</h3>
						</div>
						<div class="mod-body">
                           <?php
$_from = $_smarty_tpl->tpl_vars['info_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_3_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_3_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
							<dl>
								<dt class="pull-left aw-border-radius-5">
									<a href="people.html">
										<img src="<?php echo @constant('ROOT');?>
web/common/avatar-mid-img.png" alt=""></a>
								</dt>
								<dd class="pull-left">
									<a class="aw-user-name" data-id="2" href="people.html"><?php echo $_smarty_tpl->tpl_vars['info']->value['username'];?>
</a>
									<p class="signature"></p>
									<p>
										<b><?php echo $_smarty_tpl->tpl_vars['info']->value['q_num'];?>
</b>
										个问题,
										<b>0</b>
										次赞同
									</p>
								</dd>
							</dl>
                            <?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_3_saved_local_item;
}
if ($__foreach_info_3_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_3_saved_item;
}
?>
						</div>
					</div>
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
