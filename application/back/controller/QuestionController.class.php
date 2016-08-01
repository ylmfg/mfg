<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25 0025
 * Time: 上午 1:22
 */

namespace back\controller;

use back\controller\CommonController;
use framewrok\tool\RequestClient;
use framewrok\core\Factory;

class QuestionController extends CommonController
{
    public function zhihuAction()
    {
        $this->checkLogin();
        $t_client = new RequestClient();

        $url = 'www.myweb.com/zhihu/zhihu.html';
        $t_client->url = $url;

        $response = $t_client->get();

        //通过正则处理将需要的数据获取到
        $pattern = <<<RE
#<a[^>]*?class="js-title-link"[^>]*?>(.*?)</a>.*?<script type="text" class="content">(.*?)</script>#s
RE;
        //匹配
        preg_match_all($pattern, $response, $value_list);
        //第一子模式就是全部的问题
        $question_list = $value_list[1];
        //第二个子模式就是全部的回答
        $anwser_list = $value_list[2];

        //将内容添加到数据表中
        $question_model = Factory::getModel('question');
        $anwser_model = Factory::getModel('anwser');
        $counter = 0;
        //每一问题都对应多个回答
        foreach ($question_list as $key => $question) {

            $question_data['question_content'] =str_replace(['<em>','</em>'],'',$question);
            $question_data['category_id'] = 1;
            $question_data['add_time'] = time();
            //计数器方便知道自己添加的
            if (false !== $question_id = $question_model->insertValue($question_data)) {
                //问题插入成功
                $anwser_data['question_id'] = $question_id;
                $anwser_data['anwser_content'] = $anwser_list[$key];
                $anwser_data['add_time'] = time();

                //将答案放入数据库中
                $anwser_model->insertValue($anwser_data);

                ++$counter;
            }
        }
        $this->jumpWait(Factory::U('back/Category/list'), '创建了' . $counter . '条数据');

    }
    public function listAction(){
        $this->checkLogin();


        $this->smarty->display('question/question_list.html');
    }

}