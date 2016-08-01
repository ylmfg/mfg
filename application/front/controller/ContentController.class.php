<?php
namespace front\controller;

use front\controller\CommonController;
use framewrok\core\Factory;
use framewrok\tool\Page;


class ContentController extends CommonController
{

    public function publishAction()
    {
        //需要判断用户是否登陆
        $this->isLogin();
        //获取分类模型
        $category_model = Factory::getModel('category');

        $category_list = $category_model->getCategory();
        //获取话题模型
        $topic_model = Factory::getModel('topic');

        $topic_list = $topic_model->getTopic();
        //分配数据
        $this->smarty->assign('category_list', $category_list);
        $this->smarty->assign('topic_list', $topic_list);

        //展示模板
        $this->smarty->display('content/publish.html');
    }

    public function insertAction()
    {

        //接收数据
        $user = $this->isLogin();


        $data['user_id'] = $user['user_id'];


        $data['question_content'] = $_POST['question_content'];
        $data['question_detail'] = $_POST['question_detail'];
        $data['category_id'] = $_POST['category_id'];
        //判断是否存在,如果没有,我们允许没有话题去讨论
        $topic_list = isset($_POST['topic']) ? $_POST['topic'] : [];
        //调用模型
        $question_model = Factory::getModel('question');

        $data['add_time'] = time();
        $data['update_time'] = time();
        //自动插入，成功返回lastInsertId失败返回false;
        $question_id = $result = $question_model->insertValue($data);
        if ($result) {
            //调用问题话题模型
            $topic_question_model = Factory::getModel('topic_Question');
//			echo "<pre>";
//			var_dump($topic_question_model);
//			exit;
            //生成问题和话题的对应关系
            foreach ($topic_list as $topic_id) {
                $topic_question_model->insertValue(['topic_id' => $topic_id, 'question_id' => $question_id]);
            }
            //问题插入成功时候生成静态文件??????
            ////select q.question_content,a.anwser_content
            //from tang_question as q left join tang_anwser as a
            //on q.question_id =a.question_id order by a.add_time limit 1;
            //处理我们的问题模型
            $question_model = Factory::getModel('question');
//select a.anwser_content,count(a.answer_id)as anwser_num,u.user_name from tang_anwser
//as a left join tang_question as q on a.question_id=q.question_id
//left join tang_user as u on a.user_id=u.user_id group by a.question_id order by a.add_time desc;

            //处理我们回答问题模型
            //获取回答的数据
//            $anwser_model=Factory::getModel('anwser');
//            $anwser_list=$anwser_model->getAnwserinfo();
//            $this->smarty->assign('anwser_list',$anwser_list);
//            echo "<pre>";
//            var_dump($anwser_list);
//            die;
            //获取一条数据
            $this->smarty->assign('question', $question_model->find($question_id));

            //  开启我们的输出缓冲
            ob_start();
            //展示模板
            $this->smarty->display('content/detail.html');

            //获取缓冲的内容
            $content = ob_get_contents();

            //关闭我们的输出缓冲
            ob_end_clean();
            //设置我们的静态文件，由于我们可以直接请求我们的静态文件
            //所以我们可以将我们的文件放在web目录下面
            //确定静态文件的基础目录.
            //确定我们的子目录
            $html_path = WEB_PATH . 'html/question/';
            $sub_dir = date('Ym') . '/';
            //判断我们的子目录是否存在
            if (!is_dir($html_path . $sub_dir)) {
                //支持递归创建目录
                mkdir($html_path . $sub_dir, 0755, true);
            }
            //文件名
            $basename = 'q_' . $question_id . '.html';

            //写入我们的文件
            $write_result = file_put_contents($html_path . $sub_dir . $basename, $content);
            if ($write_result) {
                //写入成功
                //将我们的静态文件记录到数据库中
                $data['question_id'] = $question_id;

                $data['static_url'] = ROOT . 'web/html/question/' . $sub_dir . $basename;
                $question_model->updateValue($data);
                //写入成功,提示后进入首页
                $URL = Factory::U('front/content/index');
                echo "生成静态文件成功<meta http-equiv='refresh' content=\"1;url=$URL\">";;;
            } else {
                //文件写入失败,直接进入首页
                $URL = Factory::U('front/content/index');
                echo "<meta http-equiv='refresh' content=\"1;url=$URL\">";
            }

        } else {

            //插入问题失败,提示后重新发布
            $this->jumpWait(Factory::U('front/index/publish'), '添加问题失败');
        }

    }

    public function indexAction()
    {
        $pageNow = isset($_GET['pageNow']) ? (int)($_GET['pageNow']) : '';
        // $q_id = isset($_GET['q_id']) ? (int)($_GET['q_id']) : '';
        if ('' == $pageNow) {
            $pageNow = 1;
        } elseif ($pageNow < 1) {
            $pageNow = 1;
        }
        //获取首页数据
        //问题模型
        $question_model = Factory::getModel('question');
        //信息列表
        $info_list = $question_model->getInfo();
        //分类模型
        $category_model = Factory::getModel('category');
        //分类列表
        $category_list = $category_model->getCategory();
        //话题与问题模型
        $tq_model = Factory::getModel('topic_question');
        //话题与问题列表
        $topic_question_list = $tq_model->getTQlist();
//        echo "<pre>";
//        var_dump($question_list);
//        die;

//        echo "<pre>";
//        var_dump($topic_question_list);
//        die;
        //       实现链接查
        //from question as q left join user as u on q.user_id=u.user_id

        //获取分页总的记录数
        $totalRow = $question_model->getTotalRow();
        //分页处理
        //设置每一页应该显示的数目
        $pageSize = 3;
        //获取偏移量
        $offset = ($pageNow - 1) * $pageSize;
        //每一页
        $limit = "$offset,$pageSize";
        //处理额外参数
        $url_param = [];
        //$url_param['q_id'] = $q_id;
        //拼凑别名
        $page = new Page;
        $pageResult = $page->showPage($pageNow, $totalRow, $pageSize, '', $url_param);
        $filter['alias'] = 'q';
        $user_table = $question_model->table('user');
        $category_table = $question_model->table('category');
        ///拼凑join
        $filter['join'] = "left join $user_table as u on q.user_id=u.user_id left join $category_table as c on q.category_id=c.cate_id ";
        //需要获取的字段值
        $filter['field'] = "q.*,u.user_name,c.cate_title as cate_title";
        $filter['group'] = "q.question_content";
        //设置排序 limit
        $filter['order'] = 'q.add_time desc';
        $filter['limit'] = "$limit";

        $question_list = $question_model->selectValue($filter);
//        echo "<pre>";
//        var_dump($question_list);
//        die;
        //分配数据

        $this->smarty->assign('pageResult', $pageResult);
        $this->smarty->assign('info_list', $info_list);
        $this->smarty->assign('topic_question_list', $topic_question_list);
        $this->smarty->assign('category_list', $category_list);
        $this->smarty->assign('question_list', $question_list);
        $this->smarty->display('content/index.html');

    }

    //问题的详细页
    public function detailAction()
    {
        //接受question_id
        $question_id = isset($_GET['id']) ? (int)($_GET['id']) : null;
        //判断question_id

        if (is_null($question_id)) {
            $this->jumpWait(Factory::U('front/Conten/index'), '你查询的的问题不存在');
        }
        //select q.question_content,a.anwser_content
        //from tang_question as q left join tang_anwser as a
        //on q.question_id =a.question_id order by a.add_time limit 1;
        //通过模型获取数据
        $question_model = Factory::getModel('question');
        $filter['field'] = '*';
        $question = $question_model->find($question_id, $filter);


        //分配数据
        $this->smarty->assign('question', $question);
        $this->smarty->display('content/detail.html');
    }
}
?>