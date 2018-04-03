<?php
namespace controller\Admin;
class articleController extends \core\Controller{
    //文章列表
    public function listAction(){
        $data['id']= isset($_POST['cat_id'])?$_POST['cat_id']:'';
        $data['art_title']= isset($_POST['title'])?$_POST['title']:'';
        $data['art_content']= isset($_POST['content'])?$_POST['content']:'';
        $data['is_top']= isset($_POST['is_top'])?$_POST['is_top']:'';
        $data['is_public']= isset($_POST['is_public'])?$_POST['is_public']:'';
        $art_model = new \model\articleModel;
        $list = $art_model->getACTable($data);
        $cat_model = new \model\categoryModel;
        $rs = $cat_model->getList();
        $this->smarty->assign('data',array(
            'art_list'=>$list,
            'cat_list'=>$rs
        ));
        $this->smarty->display('article_list.html');
    }
    //文章添加
    public function addAction(){
        if(!empty($_POST)){
            $data['art_title']=$_POST['title'];
            $data['art_label']=$_POST['label'];
            $data['cat_id']=$_POST['cat_id'];
            $data['art_content']=$_POST['content'];
            $data['is_top']=$_POST['is_top'];
            $data['is_public']=$_POST['is_public'];
            $data['user_id']=$_SESSION['user']['id'];
            $data['art_time']=time();
            //所有值不得为空
            foreach($data as $k=>$v){
                //!!!典型错误：empty会把0看成空，所以报错，if(empty($v)){
                if($v==''){
                    $this->error('index.php?c=article&p=list&pt=Admin',"{$k}不能为空");
                    return;
                }    
            }
            $article_model = new \core\Model('article');
            if($article_model->insert($data))
                $this->success('index.php?c=article&p=list&pt=Admin','添加成功');
            else
                $this->error('index.php?c=article&p=list&pt=Admin','添加失败');
        }
        $category_model = new \model\categoryModel;
        $list = $category_model->getList();
        $this->smarty->assign('data',array(
            'list'=>$list
        ));
        $this->smarty->display('article_add.html');
    }
    //文章修改
    public function updateAction(){
        $id = $_GET['id'];
        if(!empty($_POST)){    
            $data['art_title']=$_POST['title'];
            $data['art_label']=$_POST['label'];
            $data['cat_id']=$_POST['cat_id'];
            $data['art_content']=$_POST['content'];
            $data['is_top']=$_POST['is_top'];
            $data['is_public']=$_POST['is_public'];
            $data['art_time']=time();
            $data['art_id']=$id;
            foreach($data as $k=>$v){
                if($v==''){
                    $this->error('index.php?c=article&p=list&pt=Admin',"{$k}不能为空");
                    return;
                }   
                //防内容注入js代码
               $data[$k] = str_replace(array('<script','</script'),array('< script','< /script') , $v);
            }
            $article_model = new \core\Model('article');
            if($article_model->update($data))
                $this->success('index.php?c=article&p=list&pt=Admin','修改成功');
            else
                $this->error('index.php?c=article&p=list&pt=Admin','修改失败');
        }
        $cat_model = new \model\categoryModel;
        $list = $cat_model->getList();
        $art_model = new \model\articleModel;
        $info = $art_model->find($id);
        $this->smarty->assign('data',array(
                'info'=>$info,
                'list'=>$list
            ));
        $this->smarty->display('article_edit.html');
    }
    //文章放入回收站
    public function delAction(){
        $id = $_GET['id'];
        $model = new \model\articleModel;
        if($model->del($id))
            $this->success('index.php?c=article&p=list&pt=Admin','删除成功');
        else
            $this->error('index.php?c=article&p=list&pt=Admin','删除失败');
    }
    //回收站恢复文章
    public function recoverAction(){
            $id = $_GET['id'];
            $model = new \model\articleModel;
            if($model->recover($id))
                $this->success('index.php?c=article&p=list&pt=Admin','恢复成功');
            else
                $this->error('index.php?c=article&p=recycle&pt=Admin','恢复失败');
    }
    //删除文章
    public function deleteAction(){
        $id = $_GET['id'];
        $model = new \model\articleModel;
        if($model->delete($id))
            $this->success('index.php?c=article&p=recycle&pt=Admin','删除成功');
        else
            $this->error('index.php?c=article&p=recycle&pt=Admin','删除失败');
    }
    //回收站
    public function recycleAction(){
        $art_model = new \model\articleModel;
        $list = $art_model->getRecycle();
        $cat_model = new \model\categoryModel;
        $rs = $cat_model->getList();
        $this->smarty->assign('data',array(
            'art_list'=>$list,
            'cat_list'=>$rs
        ));
        $this->smarty->display('article_recycle.html');
    } 
    //设置文章置顶
    public function setTopAction(){
        $data['art_id']=$_GET['id'];
        $data['is_top']=$_GET['top'];
        $model = new \core\Model('article');
        if($model->update($data))
            $this->success('index.php?c=article&p=list&pt=Admin','设置成功');
        else
            $this->error('index.php?c=article&p=list&pt=Admin','设置失败');
    }
}
