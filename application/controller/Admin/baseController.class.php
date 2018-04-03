<?php
namespace controller\Admin;
class baseController extends \core\Controller{
    public function __construct(){
        parent::__construct();
        $this->checkUser();
    }
    //防翻墙
    private function checkUser(){
        if(CONTROLLER == 'login')
            return;
        if(empty($_SESSION['user']))
            $this->error('index.php?pt=Admin&p=login&c=login','登录失败',1);
        }
}
