<?php
namespace framewrok\dao;
interface I_Dao{
     //定义一个单例模式
     public static function getSingleton(array $option=array());
	 //用于查询的方法
     public function query($sql='');
	 //用于非查询的方法
	 public function execu($sql='');
     //查询所有的记录
	 public function fetchAll($sql='');
     //查询一条记录
	 public function fetchRow($sql='');
	 //查询某条记录第一个字段
	 public function fetchOne($sql='');
	 //用于提供转义的方法
	 public function escapeData($data='');
	 //获取被影响的记录数
	 public function affectedRow();
	 //获取结果影响的记录数
	 public function resultRow();
	 //获取最新自动生成的ID
	 public function lastInsertId();
}
?>