<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/28 0028
 * Time: 下午 19:34
 */
namespace front\model;

use framewrok\core\Model;

class Model_user extends Model{

   public function checkByCode($user_id, $user_code)
   {
       {
           //通过Id找用户
           $user = $this->find($user_id);
           if (!$user) {
               return false;
           }
           //找到了用户
           if ($user_code == $user['active_code']) {
               //激活码相等
               return $user;
           } else {
               //激活码不相等
               return false;


           }
       }
   }
    public function getName($user_name){
        //通过用户名获取数据
        $sql="select * from $this->table where `user_name`=".$this->dao->escapeData($user_name);
        return $this->dao->fetchRow($sql);
    }
}