<?php
/* Smarty version 3.1.29, created on 2016-06-08 22:32:21
  from "E:\tangdengshuai\Apache24\htdocs\myweb\ylmf\application\front\view\content\detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57582c753fbf16_68606750',
  'file_dependency' => 
  array (
    '6c1ef25840ef8279a7c8c5adc5c76dfc98ab5133' => 
    array (
      0 => 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\application\\front\\view\\content\\detail.html',
      1 => 1465396311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/layout.html' => 1,
  ),
),false)) {
function content_57582c753fbf16_68606750 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\tangdengshuai\\Apache24\\htdocs\\myweb\\ylmf\\framewrok\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_1226357582c752d6f53_70171949',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:content/detail.html */
function block_1226357582c752d6f53_70171949($_smarty_tpl, $_blockParentStack) {
?>

<div class="aw-container-wrap">
    <div class="container">
        <div class="row">
            <div class="aw-content-wrap clearfix">
                <div class="col-sm-12 col-md-9 aw-main-content">
                    <!-- 话题推荐bar -->
                    <!-- 话题推荐bar -->
                    <!-- 话题bar -->
                    <div class="aw-mod aw-topic-bar" id="question_topic_editor" data-type="question" data-id="12">
                        <div class="tag-bar clearfix">
							<span class="topic-tag" data-id="2">
								<a href="topic.html" class="text">php</a>
							</span>

                        </div>
                    </div>
                    <!-- end 话题bar -->
                    <div class="aw-mod aw-question-detail aw-item">
                        <div class="mod-head">
                            <h1><?php echo $_smarty_tpl->tpl_vars['question']->value['question_content'];?>
</h1>

                        </div>
                        <div class="mod-body">
                            <div class="content markitup-box"></div>
                        </div>
                        <div class="mod-footer">
                            <div class="meta">
                                <span class="text-color-999"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['add_time'],"Y-m-d H:i:s");?>
</span>

                                <!-- <a class="text-color-999" href="publish.html">
                                    <i class="icon icon-edit"></i>
                                    编辑
                                </a>
 -->
                                <div class="pull-right more-operate">
                                    <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon icon-share"></i>
                                        分享
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="aw-mod aw-question-comment">
                        <div class="mod-head">
                            <ul class="nav nav-tabs aw-nav-tabs active">
                                <li>
                                    <a href="question.html">
                                        时间
                                        <i class="icon icon-up"></i>
                                    </a>
                                </li>

                                <h2 class="hidden-xs">2 个回复</h2>
                            </ul>
                        </div>
                        <div class="mod-body aw-feed-list">
                            <div class="aw-item" uninterested_count="0" force_fold="0" id="answer_list_2">
                                <div class="mod-head">
                                    <a class="anchor" name="answer_2"></a>
                                    <!-- 用户头像 -->
                                    <a class="aw-user-img aw-border-radius-5" href="people.html" data-id="3">
                                        <img src="<?php echo @constant('ROOT');?>
web/common/avatar-mid-img.png" alt="图片"></a>
                                    <!-- end 用户头像 -->
                                    <div class="title">
                                        <p>
                                            <a class="aw-user-name" href="people.html" data-id="3">han</a>
                                            -
                                            <span class="text-color-999">一句话介绍</span>
                                        </p>
                                        <p class="text-color-999 aw-agree-by hide">赞同来自:</p>
                                    </div>
                                </div>
                                <div class="mod-body clearfix">
                                    <!-- 评论内容 -->
                                    <div class="markitup-box">这个问题基本上很难</div>

                                    <!-- end 评论内容 -->
                                </div>
                                <div class="mod-footer">
                                    <!-- 社交操作 -->
                                    <div class="meta clearfix">
                                        <span class="text-color-999 pull-right">9 分钟前</span>
                                        <!-- 投票栏 -->
										<span class="operate">
											<a class="agree  " onclick="AWS.User.agree_vote(this, 'kang', 2);">
                                                <i data-placement="right" title="" data-toggle="tooltip" class="icon icon-agree" data-original-title="赞同回复"></i> <b class="count">0</b>
                                            </a>
											<a class="disagree " onclick="AWS.User.disagree_vote(this, 'kang', 2)">
                                                <i data-placement="right" title="" data-toggle="tooltip" class="icon icon-disagree" data-original-title="对回复持反对意见"></i>
                                            </a>
										</span>
                                        <!-- end 投票栏 -->
										<span class="operate">
											<a class="aw-add-comment" data-id="2" data-type="answer" data-comment-count="0" data-first-click="hide" href="javascript:;">
                                                <i class="icon icon-comment"></i>
                                                0
                                            </a>
										</span>
                                        <!-- 可显示/隐藏的操作box -->
                                        <div class="more-operate">
                                            <a class="text-color-999" href="javascript:;" onclick="">
                                                <i class="icon icon-edit"></i>
                                                编辑
                                            </a>
                                            <a href="javascript:;" onclick="AWS.User.answer_force_fold($(this), 2);" class="text-color-999">
                                                <i class="icon icon-fold"></i>
                                                折叠
                                            </a>

                                            <a href="javascript:;" onclick="" class="text-color-999">
                                                <i class="icon icon-favor"></i>
                                                收藏
                                            </a>

                                            <a href="javascript:;" onclick="AWS.User.answer_user_rate($(this), 'thanks', 2);" class="aw-icon-thank-tips text-color-999" data-original-title="感谢热心的回复者" data-toggle="tooltip" title="" data-placement="bottom">
                                                <i class="icon icon-thank"></i>
                                                感谢
                                            </a>
                                            <div class="btn-group pull-left">
                                                <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon icon-share"></i>
                                                    分享
                                                </a>
                                                <div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown shareout pull-right">
                                                    <ul class="aw-dropdown-list">
                                                        <li>
                                                            <a onclick="">
                                                                <i class="icon icon-weibo"></i>
                                                                微博
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="">
                                                                <i class="icon icon-qzone"></i>
                                                                QZONE
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="">
                                                                <i class="icon icon-wechat"></i>
                                                                微信
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="javascript:;" onclick="AWS.ajax_request(G_BASE_URL + '/question/ajax/set_best_answer/', 'answer_id=2');" class="text-color-999">
                                                <i class="icon icon-best"></i>
                                                最佳回复
                                            </a>
                                        </div>
                                        <!-- end 可显示/隐藏的操作box -->

                                    </div>
                                    <!-- end 社交操作 -->
                                </div>
                            </div>
                            <div class="aw-item" uninterested_count="0" force_fold="0" id="answer_list_3">
                                <div class="mod-head">
                                    <a class="anchor" name="answer_3"></a>
                                    <!-- 用户头像 -->
                                    <a class="aw-user-img aw-border-radius-5" href="people.html" data-id="3">
                                        <img src="<?php echo @constant('ROOT');?>
web/common/avatar-mid-img.png" alt=""></a>
                                    <!-- end 用户头像 -->
                                    <div class="title">
                                        <p>
                                            <a class="aw-user-name" href="people.html" data-id="3">han</a>
                                            -
                                            <span class="text-color-999">一句话介绍</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="mod-body clearfix">
                                    <!-- 评论内容 -->
                                    <div class="markitup-box">代码很重要，程序员也很重要</div>

                                    <!-- end 评论内容 -->
                                </div>
                                <div class="mod-footer">
                                    <!-- 社交操作 -->
                                    <div class="meta clearfix">
                                        <span class="text-color-999 pull-right">9 分钟前</span>
                                        <!-- 投票栏 -->
										<span class="operate">
											<a class="agree  " onclick="AWS.User.agree_vote(this, 'kang', 3);">
                                                <i data-placement="right" title="" data-toggle="tooltip" class="icon icon-agree" data-original-title="赞同回复"></i> <b class="count">0</b>
                                            </a>
											<a class="disagree " onclick="AWS.User.disagree_vote(this, 'kang', 3)">
                                                <i data-placement="right" title="" data-toggle="tooltip" class="icon icon-disagree" data-original-title="对回复持反对意见"></i>
                                            </a>
										</span>
                                        <!-- end 投票栏 -->

                                    </div>
                                    <!-- end 社交操作 -->
                                </div>
                            </div>
                        </div>
                        <div class="mod-footer">
                            <div class="aw-load-more-content hide" id="load_uninterested_answers">
                                <span class="text-color-999 aw-alert-box text-color-999" href="javascript:;" tabindex="-1" onclick="AWS.alert('被折叠的回复是被你或者被大多数用户认为没有帮助的回复');">为什么被折叠?</span>
                                <a href="javascript:;" class="aw-load-more-content">
                                    <span class="hide_answers_count">0</span>
                                    个回复被折叠
                                </a>
                            </div>

                            <div class="hide aw-feed-list" id="uninterested_answers_list"></div>
                        </div>

                    </div>
                    <!-- end 问题详细模块 -->

                    <div class="aw-mod aw-replay-box question">
                        <a name="answer_form"></a>
                        <form action="<?php echo framewrok\core\Factory::U('front/Anwser/anwserMessage');?>
" onsubmit="" method="post" id="answer_form" class="question_answer_form">
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['question_id'];?>
" id="" name="question">
                            <div class="mod-head">
                                <a href="?/people/" class="aw-user-name">
                                    <img alt="kang" src="<?php echo @constant('ROOT');?>
web/common/avatar-mid-img.png"></a>
                                <p>
                                    <label class="pull-right">
                                        <input type="checkbox" value="1" name="anonymous">回复</label>
                                    <label class="pull-right"></label>
                                    kang
                                </p>
                            </div>
                            <div class="mod-body">
                                <div class="aw-mod aw-editor-box">
                                    <div class="mod-head">
                                        <textarea name="anwser" style="width:100%"></textarea>
                                    </div>
                                    <div class="mod-body clearf">
                                        <input type="submit" value="回复">
                                        <span class="pull-right text-color-999" id="answer_content_message">&nbsp;</span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <!-- 回复编辑器 -->
                    <div class="aw-mod aw-replay-box question">
                        <a name="anwser_form"></a>
                        <p align="center">
                            要回复问题请先
                            <a href="?/account/login/">登录</a>
                            或
                            <a href="?/account/register/">注册</a>
                        </p>
                    </div>
                    <!-- end 回复编辑器 -->
                </div>
                <!-- 侧边栏 -->
                <div class="col-md-3 aw-side-bar hidden-xs hidden-sm">
                    <!-- 发起人 -->
                    <div class="aw-mod">
                        <div class="mod-head">
                            <h3>发起人</h3>
                        </div>
                        <div class="mod-body">
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="?/people/kang">
                                        <img alt="kang" src="<?php echo @constant('ROOT');?>
web/common/avatar-mid-img.png"></a>
                                </dt>
                                <dd class="pull-left">
                                    <a class="aw-user-name" href="?/people/kang" data-id="1">kang</a>
                                    <p></p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- end 发起人 -->

                    <!-- 问题状态 -->
                    <div class="aw-mod question-status">
                        <div class="mod-head">
                            <h3>问题状态</h3>
                        </div>
                        <div class="mod-body">
                            <ul>
                                <li>
                                    最新活动:
                                    <span class="aw-text-color-blue">4 天前</span>
                                </li>
                                <li>
                                    浏览:
                                    <span class="aw-text-color-blue">1</span>
                                </li>
                                <li>
                                    关注:
                                    <span class="aw-text-color-blue">1</span>
                                    人
                                </li>

                                <li class="aw-border-radius-5" id="focus_users">
                                    <a href="?/people/kang">
                                        <img src="<?php echo @constant('ROOT');?>
web/common/avatar-mid-img.png" class="aw-user-name" data-id="1" alt="kang"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end 问题状态 -->
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
