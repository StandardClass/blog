<?php
namespace model;
    class userModel extends \core\Model{
        //获取cookie进行身份识别
        public function getCookie(){
            $id = isset($_COOKIE['id'])?$_COOKIE['id']:'';
            $pwd = isset($_COOKIE['pwd'])?$_COOKIE['pwd']:'';
            $model = new \core\Model('user');
            if(empty($id))
                return null;
            if($info = $model->find($id))
                return ($info['password']==$pwd)?$info:null;
            return  null;
        }
        //获取数据库用户信息
        public function getInformation(){
            //防sql注入
            $username = addslashes($_POST['username']);
            $password = $_POST['password'];
            $sql = "select * from `user` where username = '{$username}' and password = md5(md5('{$password}'))";
            return $this->mypdo->fetchRow($sql);
        }
        //更新用户登陆后的信息
        public function updateInformation(){
            $data['id']=$_SESSION['user']['id'];
            $data['logincount']=$_SESSION['user']['logincount']+1;
            $data['lastlogintime']=time();
            $data['lastloginip']=  ip2long($_SERVER['REMOTE_ADDR']);
            return $this->update($data);
        }
    }