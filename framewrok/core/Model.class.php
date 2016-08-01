<?php
namespace framewrok\core;

class Model
{
    protected $dao;

    //错误信息
    protected $error_info = [];

    //真实表名
    protected $table;

    //逻辑表名
    protected $logic_table;
    //字段
    protected $field_list = [];

    public function __construct()
    {
        $this->initDao();
        $this->initLogicTable();
        $this->initTable();
        $this->initField();
    }

    //通过参数去访问逻辑表名
    public function table($logic_table)
    {
        return '`' . $GLOBALS['config']['table_prefix'] . $logic_table . '`';
    }

    //初始化逻辑表名
    public function initLogicTable()
    {
        if (!(is_null($this->logic_table))) {
            return;
        }
        $model_name = get_class($this);
        $model_name = basename($model_name);
        $model_name = substr($model_name, 6);
        $model_name = strtolower($model_name);
        $model_name = $GLOBALS['config']['table_prefix'] . $model_name;
        $this->logic_table = $model_name;

    }

    //初始化表名
    protected function initTable()
    {
        $this->table = $this->logic_table;
    }


    public function insertValue($data)
    {
        //拼接insert语句
        $sql = "INSERT INTO $this->table";
        //拼接字段
        //获取键值
        $field_list = array_keys($data);
        $field_list = array_map(function ($v) {
            return '`' . $v . '`';
        }, $field_list);
        $field_str = implode(',', $field_list);
        $sql .= "($field_str)";
        //拼接字段值
        $value_list = array_values($data);
        $value_list = array_map([$this->dao, 'escapeData'], $value_list);
        $value_str = implode(',', $value_list);
        $sql .= "VALUES($value_str)";

        $result = $this->dao->execu($sql);
        if (false !== $result) {
            //执行成功
            return $this->dao->lastInsertId();
        } else {
            //失败
            return false;
        }
    }

    protected function initField()
    {

        $sql = "DESC $this->table";
        //获取表结构的全部信息
        $rows = $this->dao->fetchAll($sql);
        foreach ($rows as $row) {
            //将Field字段的信息存储在field_list属性中;
            $this->field_list[] = $row['Field'];
            //存储主键值
            if ('PRI' == $row['Key']) {
                $this->field_list['PK'] = $row['Field'];
            }
        }

    }

    protected function deleteValue($cate_id)
    {

        $sql = "DELETE FROM $this->table";

        $where_str = "WHERE `{$this->field_list['PK']}`='{$cate_id}'";

        $sql .= ' ' . $where_str;
        return $this->dao->execu($sql);
    }

    public function getErrorInfo($seperetor = '')
    {
        //如果没有分隔符
        if ($seperetor == '') {
            return $this->error_info;
        } else {
            $error = '';
            foreach ($this->error_info as $key => $v) {
                $error .= $key . '----' . $v . $seperetor;
            }
            return $error;
        }
    }

    //执行我们的查询语句(全部数据)
    public function selectValue($filter = [])
    {
        //拼凑sql语句
        if (isset($filter['field'])) {
            $filed_str = $filter['field'];
        } else {
            $filed_str = '*';
        }
        $sql = "SELECT $filed_str";
        $sql .= " FROM $this->table";

        //拼凑别名部分
        if(isset($filter['alias'])){
            $sql.=" AS {$filter['alias']}";
        }
        if(isset($filter['join'])){
            $sql.=" {$filter['join']}";
        }
        //拼凑where字句
        if (isset($filter['where'])) {
            $sql .= " WHERE {$filter['where']}";
        }
        //拼凑group
        if (isset($filter['group'])) {
            $sql .= " GROUP BY {$filter['group']}";
        }
        //拼凑having
        if (isset($filter['having'])) {
            $sql .= " HAVING {$filter['having']}";
        }
        //拼凑排序
        if (isset($filter['order'])) {
            $sql .= " ORDER BY {$filter['order']}";
        }
        //拼凑limit
        if (isset($filter['limit'])) {
            $sql .= " lIMIT {$filter['limit']}";

            //echo $sql;
        }

        //执行全部返回的结果
        return $this->dao->fetchAll($sql);
    }
    //执行一条语句的查询
    public function find($pk,$filter=[]){
        //拼凑sql语句
        if(isset($filter['field'])){
            $str_field=$filter['field'];
        }else{
            $str_field='*';
        }
        $sql="SELECT $str_field";
        $sql.=" FROM $this->table";
        //获取我们的主键值
        $pk_field=$this->field_list['PK'];
        //用户传递过来的id我们需要进行转义
        $sql.=" WHERE $pk_field =".$this->dao->escapeData($pk);

        //返回我们的数据
        return $this->dao->fetchRow($sql);

    }

    public function updateValue($data, $where = null)
    {

        $PK_field = $this->field_list['PK'];
        if (!is_null($where)) {
            $where_str = $where;
        } elseif (isset($data[$PK_field])) {
            $PK_value = $data[$PK_field];
            $where_str = "`{$PK_field}`='{$PK_value}'";
        } else {
            return false;
        }
        //拼凑sql
        $sql = "UPDATE $this->table";
        foreach ($data as $key => $v) {
            $field_list[] = '`' . $key . '`' . '=' . $this->dao->escapeData($v);
        }
        $field_str = implode(',', $field_list);

        $sql .= " SET $field_str";
        $sql .= " WHERE $where_str";
        return $this->dao->execu($sql);
    }

    private function initDao()
    {
        $config = array(
            'host' => $GLOBALS['config']['host'],
            'root' => $GLOBALS['config']['root'],
            'pw' => $GLOBALS['config']['pw'],
            'dbname' => $GLOBALS['config']['dbname'],
            'port' => $GLOBALS['config']['port'],
            'charset' => $GLOBALS['config']['charset']
        );
        //require_once './framewrok/dao/I_Dao.php';
        //require_once './framewrok/dao/DAOPdo.class.php';
        $this->dao = \framewrok\dao\DAOPdo::getSingleton($config);
    }

}

?>
