<?php
namespace controller\Admin;
class userController extends baseController{
    //用户列表
    public function listAction(){
        $model = new \core\Model('user');
        $list = $model->select();
        $this->smarty->assign('list',$list);
        $this->smarty->display('user_list.html');
    }
    //删除
    public function delAction(){
        $id=$_GET['id'];
        $model = new \core\Model('user');
        if($rs=$model->find($id)){
            $face = $rs['face'];
        }
        $path = $GLOBALS['config']['param']['face_path'].$face;
        if(file_exists($path))
           @unlink($path); //unlink要加错误抑制符
        if($model->delete($id))
            $this->success('index.php?pt=Admin&p=list&c=user','删除成功');
        else
            $this->error('index.php?pt=Admin&p=list&c=user','删除失败');
    }
    //编辑
    public function editAction(){
        if(!empty($_POST)){
            if(!empty($_POST['password']))
                $data['password']=md5(md5 ($_POST['password']));
            if($_FILES['face']['error']!=4){
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
                        $this->error('index.php?pt=Admin&p=edit&c=user',$img->getError(),1);
                    }
                }else
                    $this->error('index.php?pt=Admin&p=edit&c=user',$lib->getError(),3);
                }
            if(!empty($data)){
                $data['id']=$_SESSION['user']['id'];
                $model = new \core\Model('user');
                if($model->update($data)){
                    $_SESSION['user']['face']=isset($data['face'])?$data['face']:$_SESSION['user']['face'];
                    echo '<script type="text/javascript">';
                    echo "top.location.href='index.php?c=admin&p=admin&pt=Admin'";
                    echo '</script>';
                    exit;
                }
            }
        $this->smarty->display('user_edit.html');
    }
}
