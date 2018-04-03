<?php
namespace controller\Admin;
class loginController extends baseController{
  //登录页面
   public function loginAction(){
       if(!isset($_SERVER['HTTP_REFERER'])){
           $model = new \model\userModel;
           if($info = $model->getCookie()){
               $_SESSION['user']=$info;
               $model->updateInformation();
               $this->success('index.php?pt=Admin&p=admin&c=admin');
               }
           }
       if(!empty($_POST)){
         $captch = new \lib\captcha;
         if(!$captch->checkCaptcha($_POST['passcode']))
             $this->error('index.php?c=login&p=login&pt=Admin','登录失败',3);
         $model = new \model\userModel;
         if($info = $model->getInformation()){
             $_SESSION['user']=$info;
             $model->updateInformation();
             if(!empty($_POST['remember'])){
                 $time = time()+ 3600*24*7;
                 setcookie('id',$info['id'],$time,'/');
                 setcookie('pwd',$info['password'],$time,'/');
             }
             $this->success('index.php?pt=Admin&p=admin&c=admin','登录成功');
         }else
             $this->error('index.php?pt=Admin&p=login&c=login','登录失败');
       }else
          $this->smarty->display('login.html'); 
   }
   //注册页面
   public function registerAction(){
       if(!empty($_POST)){
            $type=$GLOBALS['config']['param']['face_type'];
            $size=$GLOBALS['config']['param']['face_size'];
            $path=$GLOBALS['config']['param']['face_path'];
            $lib =new  \lib\upload($type,$size,$path);
            $img = new \lib\image;
            if($upload_path = $lib->uploadOne($_FILES['face'])){
                $src_path = $path.$upload_path;
                if($thumb = $img->thumb($src_path, 300, 300)){
                    $data['face']=$thumb;
                }else{
                    $this->error('index.php?pt=Admin&p=register&c=login',$img->getError(),1000);
                }
            }else
                $this->error('index.php?pt=Admin&p=register&c=login',$lib->getError(),3);
            $data['username']=$_POST['username'];
            $data['password']=md5(md5($_POST['password']));
            $model = new  \core\Model('user');
            if($model->insert($data))
            $this->success('index.php?pt=Admin&p=login&c=login','注册成功');
       }else
           $this->smarty->display('register.html');
   }
   //验证码
   public function verifyAction(){
       $lib = new \lib\captcha;
       $lib->getCaptcha();
   }
   public function logoutAction(){
       session_destroy();
       $this->success('index.php?pt=Admin&p=login&c=login');
   }
}
