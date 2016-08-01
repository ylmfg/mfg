<?php
namespace back\controller;

use back\controller\CommonController;
use framewrok\core\Factory;

use framewrok\tool\Upload;
use framewrok\tool\Image;


class TopicController extends CommonController
{

    public function addAction()
    {
        //展示模板

       $this->checkLogin();
        $this->smarty->display('Topic/topic_add.html');
    }

    public function insertAction()
    {
        $this->checkLogin();
        //接收数据
        $data['topic_title'] = $_POST['topic_title'];
        $data['topic_descrip'] = $_POST['topic_descrip'];
        $data['topic_img'] = "";

        //完成文件的上传
        $upload = new Upload;
        //设置我们的文件路径,这样我们清楚保存在那个地方,我们增加一个常量来存储
        $upload->setUploadPath(UPLOAD_PATH . 'topic/');

        $result_upload = $upload->uploadFile($_FILES['topic_img']);
        //如果上传成功
        if ($result_upload) {
            //$data['topic_img']=$result_upload;
            //直接做缩略图
            $image = new Image(UPLOAD_PATH . 'topic/' . $result_upload);
            //设置缩略图目录
            $image->setThumbPath(WEB_PATH . 'common/thumb/topic/');
            $thumb_result = $image->thumb(100, 100);
            $data['topic_img'] = $thumb_result;
        }
        //调用模型
        $topic_model = Factory::getModel('Topic');
        $result = $topic_model->insertValue($data);
        if ($result) {
            $this->jumpNow(Factory::U('back/Category/list'));
        } else {
            $this->jumpWait(Factory::U('back/Topic/add'), "插入失败" . $topic_model->getErrorInfo('<br>'));
        }
        //展示模板
    }

    public function listAction()
    {
        $this->checkLogin();
        //获取数据
        $topic_model = Factory::getModel('topic');

        $topic_list = $topic_model->getTopic();
        $this->smarty->assign('user', $_SESSION['user']);

        //分配数据
        $this->smarty->assign('topic_list', $topic_list);

        $this->smarty->display('topic/topic_list.html');
    }
}

/*
drop table if exists tang_topic;
       create table tang_topic(
	   topic_id int unsigned not null auto_increment,
	   topic_title varchar(64) not null default '',
	   topic_descrip varchar(255) not null default '',
	   topic_img varchar(255) not null default '',
	   primary key(topic_id)
)charset=utf8;
*/
?>