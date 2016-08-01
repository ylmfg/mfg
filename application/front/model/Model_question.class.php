<?php
namespace front\model;

use framewrok\core\Model;

class Model_question extends Model
{
    public function getInfo()
    {
        $sql = " SELECT t.* FROM(
        SELECT count(q.question_content) AS q_num,(u.user_name)AS username FROM $this->table AS q LEFT JOIN {$this->table('user')} AS u ON q.user_id = u.user_id
        GROUP BY u.user_id HAVING username IS NOT NULL ORDER BY q.add_time DESC)as t  order by t.q_num desc limit 6";

        return $this->dao->fetchAll($sql);
    }

    public function getTotalRow(){

        $sql="select count(*) from $this->table";

        return $this->dao->fetchOne($sql);
    }
}

?>