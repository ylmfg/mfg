<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2 0002
 * Time: 上午 10:36
 */
namespace back\model;
use framewrok\core\Model;
class Model_user extends Model{
    public function getEmail($email){
        $sql="select * from $this->table where user_email =".$this->dao->escapeData($email);
        return $this->dao->fetchRow($sql);
    }
}