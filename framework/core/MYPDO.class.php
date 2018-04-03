<?php
namespace core;
class MYPDO{
    private static $instance;
    private $type;
    private $host;
    private $port;
    private $user;
    private $pwd;
    private $charset;
    private $dbname;
    private function __clone(){
    }
    private function __construct($param){
        $this->initParam($param);
        $this->initPDO();
        $this->initException();
    }
    /**
     * 实例化方法
     * @static getInstance
     * @param  array
     */
    public static function getInstance($param){
        if(!self::$instance instanceof self){
            self::$instance = new self($param);
        }
        return self::$instance;
    }
    /**
     * 实例化参数
     * @param  array
     */
    private function initParam($param){
        $this->type = isset($param['type'])?$param['type']:'';
        $this->host = isset($param['host'])?$param['host']:'localhost';
        $this->port = isset($param['port'])?$param['port']:'3306';
        $this->user = isset($param['user'])?$param['user']:'root';
        $this->pwd = isset($param['pwd'])?$param['pwd']:'root';
        $this->charset = isset($param['charset'])?$param['charset']:'utf8';
        $this->dbname = isset($param['dbname'])?$param['dbname']:'';
    }
    /**
     * 实例化PDO
     */
    private function initPDO(){
        try{
             $dsn = "{$this->type}:dbname={$this->dbname}";
             $this->pdo = new \PDO($dsn,"{$this->user}","{$this->pwd}");
        }  catch (PDOException $e){
            $this->showException($e);
        }
    }
    /**
     * 设置异常模式,抛出异常
     * @param  array
     * @return  boolean
     */
    private function initException(){
        return $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,  \PDO::ERRMODE_EXCEPTION);
    }
    /**
     * 显示异常信息
     * @param $e Exception 异常对象
     * @param $sql string SQL语句
     * @return string
     */
    private function showException($e,$sql=''){
        if($sql!=''){
            echo '执行错误';
            echo '错误语句'.$sql;
        }else{
            echo '错误编号'.$e->getCode();
            echo '错误信息'.$e->getMessage();
            echo '错误语句'.$sql;
        }
    }
    /**
     * @param $sql 
     * @return  boolean
     */
    public function exec($sql){
        try{
            return $this->pdo->exec($sql);
        }  catch (Exception $e){
            $this->showException($e);
        }
    }
    /**
     * 返回结果集的数组类型
     * @param $type string 数组类型
     * @return string
     */
    private function getType($type){
        switch ($type){
            case 'assoc':
                return \PDO::FETCH_ASSOC;
            case 'num':
                return \PDO::FETCH_NUM;
            case 'both':
                return \PDO::FETCH_BOTH;
            default :
                return \PDO::FETCH_ASSOC;
        }
    }
    /**
     * 查询所有结果
     * @param $sql string SQL语句
     * @param $type string 数组类型
     * @return array
     */
    public function fetchAll($sql,$type=''){
        try{
            $rs = $this->pdo->query($sql);
            $fetch = $this->getType($type);
            return $rs->fetchAll($fetch);
        }  catch (Exception $e){
            $this->showException($e);
        }
    }
    /**
     * 查询一条结果
     * @param $sql string SQL语句
     * @param $type string 数组类型
     * @return array
     */
    public function fetchRow($sql,$type=''){
        try{
             $rs = $this->pdo->query($sql);
             $fetch = $this->getType($type);
            return $rs->fetch($fetch);
        }  catch (Exception $e){
            $this->showException($e);
        }
    }
    /**
     * 查询唯一结果
     * @param $sql string SQL语句
     * @return array
     */
    public function fetchColumn($sql){
        try{
             $rs = $this->pdo->query($sql);
             return $rs->fetchColumn();
        }  catch (Exception $e){
            $this->showException($e);
        }
    }
}

//测试；
/**
$param =array(
    'type' => 'mysql',
    'dbname' => '',
);
$pdo = MYPDO::getInstance($param);
var_dump($pdo);
 * 
 */