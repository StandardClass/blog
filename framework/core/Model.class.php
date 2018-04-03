<?php
namespace core;
class Model{
    protected $mypdo;
    private $table;
    public function __construct($table=''){
        $this->initMYPDO();
        $this->getTable($table);
    }
    private function initMYPDO(){
        $this->mypdo = MYPDO::getInstance($GLOBALS['config']['database']);
    }
    /**
     * 获取表名
     * @param string $table 表名
     * @return string  
     */
    private function getTable($table){
        $this->table = $table;
        if($table == ''){
            $class_name = get_Class($this);
            $class_name = basename($class_name);
            $class_name = substr($class_name, 0,-5);
            $this->table = $class_name;
        }
     }
     /**
     * 获取主键
     * @return string
     */
    private function getPK(){
        $rs = $this->mypdo->fetchAll("desc `{$this->table}`");
        foreach($rs as $rows){
            if($rows['Key']=='PRI'){
                return $rows['Field'];
            }
        }
        return null;
    }
    /**
     * 添加
     * @param array $data
     * @return boolean
     */
    public function insert($data){
        $keys = array_keys($data);
        $keys = array_map(function($k){
            return "`{$k}`";
        }, $keys);
        $keys = implode(',', $keys);
        $values = array_values($data);
        $values = array_map(function($k){
            return "'{$k}'";
        }, $values);
        $values = implode(',', $values);
        $sql = "insert into `{$this->table}`({$keys}) values({$values})";
        return $this->mypdo->exec($sql);
    }
    /**
     * 修改
     * @param array $data
     * @return boolean
     */
    public function update($data){
        $pk = $this->getPK();
        $keys = array_keys($data);
        $index = array_search($pk, $keys);
        unset($keys[$index]);
        $keys = array_map(function($k) use($data){
            return "`{$k}`='{$data[$k]}'";
        }, $keys);
        $keys = implode(',', $keys);
        $sql =" update `{$this->table}` set {$keys} where `{$pk}` = {$data[$pk]}";
        return $this->mypdo->exec($sql);
    }
    /**
     * 删除
     * @param int $id
     * @return boolean
     */
    public function delete($id){
        $pk = $this->getPK();
        $sql="delete from `{$this->table}` where `{$pk}` = $id";
        return $this->mypdo->exec($sql);
    }
    /**
     * 查询所有
     * @return boolean
     */
    public function select(){
        $sql = "select * from `{$this->table}`";
        return $this->mypdo->fetchAll($sql);
    }
    /**
     * 查询一条
     * @return boolean
     */
    public function find($id){
        $pk = $this->getPK();
        $sql = "select * from `{$this->table}` where {$pk} = $id";
return $this->mypdo->fetchRow($sql);
    }
}
