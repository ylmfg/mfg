<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/8 0008
 * Time: 下午 15:21
 */
namespace front\model;

use framewrok\core\Model;

class Model_anwser extends Model{

    public function getAnwserinfo(){
        $sql="select a.anwser_content,u.user_name from $this->table
as a left join {$this->table('user')} as u on a.user_id=u.user_idb order by a.add_time desc;";
        return $this->dao->fetchAll($sql);
    }
}