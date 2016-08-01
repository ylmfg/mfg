<?php
namespace front\model;

use framewrok\core\Model;

class Model_topic_question extends Model{

    public function getTQlist(){
        //获取数据
        $sql="select count(tq.question_id)as question_num,t.topic_title as topic_title,q.question_content,q.user_id as username from $this->table as tq left join
              {$this->table('topic')} as t on tq.topic_id=t.topic_id
              left join {$this->table('question')}as q on tq.question_id=q.question_id group by tq.topic_id order by question_num desc limit 3;";
        //执行sql语句
        return $this->dao->fetchAll($sql);
    }

}
?>