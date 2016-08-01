<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/5 0005
 * Time: 下午 22:41
 */
namespace front\controller;
use front\controller\Commoncontroller;
use framewrok\core\Factory;
class AnwserController extends CommonController{

    public function  anwserMessageAction(){
        //需要知道是对哪个问题回复，哪个用户回复的:(通过用户登陆获得)
        //只有会员才可以回复问题
        if(!isset($_SESSION['user'])){
           $this->jumpWait(Factory::U('front/Content/index'),'回复问题需要登陆');
        }
        //question_id如何获取 用户发布问题的时候会生成一个question_id
        $data['question_id']=$question_id=$_POST['question'];

        //获取回答的具体信息
        $data['anwser_content']=$_POST['anwser']?$_POST['anwser']:'';

        if(''==$data['anwser_content']){
            //
            $this->jumpWait(Factory::U('front/Content/index'),'回复问题不能为空');
        }
        //获取用户
        $data['user_id']=$_SESSION['user']['user_id'];
        //获取时间
        $data['add_time']=time();

        //通过question_id获取当前问题的静态url
        $question_model=Factory::getModel('question');

        $question=$question_model->find($question_id);

        //同时需要更新问题表

        //获取模型
        $user_model=Factory::getModel('anwser');

        $result=$user_model->insertValue($data);

        if($result){

            $this->jumpWait($question['static_url'],'回复问题成功');
        }else{
            $this->jumpwait($question['static_url'],'回复插入失败');
        }

    }
}