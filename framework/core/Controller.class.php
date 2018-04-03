<?php
namespace core;
    abstract class Controller{
        protected $smarty;
        public function __construct(){
            $this->initSession();
            $this->initSmarty();
        }
        //实例化session
        private function initSession(){
            new \lib\session();
        }
        //实例化smarty引擎,设置模板、编译文件夹路由
        private function initSmarty(){
            $this->smarty = new \Smarty;
            $this->smarty->setTemplateDir(__VIEW__);
            $this->smarty->setCompileDir(__VIEWC__);
        }
        /**
         * 成功触发函数
         * @param $url 跳转地址
         * @param $info 提示信息
         * @param $time 等待时间
         * @return boolean
         */
        public function success($url,$info='',$time=1){
            $this->jump($url,$info,$time,true);
        }
        /**
         * 失败触发函数
         * @param $url 跳转地址
         * @param $info 提示信息
         * @param $time 等待时间
         * @return boolean
         */
        public function error($url,$info='',$time=3){
            $this->jump($url,$info,$time,false);
        }
        /**
         * 跳转页面
         * @param $url 跳转地址
         * @param $info 提示信息
         * @param $time 持续时间
         * @param $time 结果状态
         * @return boolean
         */
        private function jump($url,$info='',$time,$success){
           if($info=='')
                //header('location:index.php?pt=Admin&p=login&c=login');(！！！典型错误)
                header("location:$url");
            if($success){
                $flag = 'true';
            }else{
                $flag = 'error';
            }
            echo<<<str
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />                
<meta http-equiv="refresh" content="{$time}; url={$url}"/>
<style type="text/css">
img{
	display:block;
	margin:100px auto 20px;
}
body{
	font-size:24px;
	font-family:'黑体';
	text-align:center;
}
#true{
	color:#060;
}
#error{
	color:#F00;
}
</style>  
</head>
<body>
    <img src="Public/images/{$flag}.fw.png">
    <div id="{$flag}">{$info},{$time}秒后跳转</div>
</body>
</html>
str;
exit;
        }
    }
