<?php
namespace lib;
class session{
	private $mypdo;
	public function __construct(){
		session_set_save_handler(
			array($this,'open'),
			array($this,'close'),
			array($this,'read'),
			array($this,'write'),
			array($this,'destroy'),
			array($this,'gc')
			);
		session_start();
	}
	public function open(){
		$this->mypdo = \core\MYPDO::getInstance($GLOBALS['config']['database']);
	}
	public function close(){

	}
	public function read($id){
		$sql = "select value from `session` where id = '$id'";
		return $this->mypdo->fetchColumn($sql);
	}
	public function write($id,$value){
		$time = time();
		//避免主键冲突
		$sql = "insert into `session` values('$id','$value','$time') on duplicate key update value='$value',time='$time'";
		return $this->mypdo->exec($sql);
	}
	public function destroy($id){
		$sql = "delete from `session` where id = '$id'";
		return $this->mypdo->exec($sql);
	}
	public function gc($lifetime){
		$time = time()- $lifetime; //临界值
		$sql = "delete from `session` where time < $time";
		return $this->mypdo->exec($sql);
	}
}
