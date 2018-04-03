<?php
namespace controller\Admin;
class categoryController extends \core\Controller{
    //类别列表
    public function listAction(){
     $model = new \model\categoryModel;
     $list = $model->getList();
     $this->smarty->assign('list',$list);
     $this->smarty->display('cat_list.html');
    }
    //添加
    public function addAction(){
     if(!empty($_POST)){
         $data['name']=$_POST['cat_name'];
         $data['parent_id']=$_POST['parentid'];
         $data['sort_order']=$_POST['sort_order'];
         $model = new \core\Model('category');
         if($model->insert($data))
             $this->success('index.php?c=category&p=list&pt=Admin','添加成功');
         else
             $this->error('index.php?c=category&p=add&pt=Admin','添加失败');
     }
     $model = new \model\categoryModel;
     $list = $model->getList();
     $this->smarty->assign('list',$list);
     $this->smarty->display('cat_add.html');
    }
    //删除
    public function delAction(){
     $id = $_GET['id'];
     $model = new \model\categoryModel;
     if($model->isLeaf($id))
         $this->error('index.php?c=category&p=list&pt=Admin','当前有子节点不可删除');
     if($model->delete($id))
        $this->success('index.php?c=category&p=list&pt=Admin','删除成功');
     else
        $this->error('index.php?c=category&p=list&pt=Admin','删除失败');
    }
    //编辑
    public function editAction(){
     $id = $_GET['id'];
     $model = new \model\categoryModel;
     if(!empty($_POST)){
        $data['name']=$_POST['cat_name'];
        $data['parent_id']=$_POST['parentid'];
        $data['sort_order']=$_POST['sort_order'];
        $data['id']=$id;
        //自己不能做自己的父类
        if($_POST['parentid']==$id)
            $this->error('index.php?c=category&p=edit&pt=Admin&id='.$id,'自己不能为自己的父元素');
        //自己不能出现在子类树里
        if($model->isMySon($id,$_POST['parentid']))
            $this->error('index.php?c=category&p=edit&pt=Admin&id='.$id,'自己的父元素不能为自己的子类');
        if($model->update($data))
            $this->success('index.php?c=category&p=list&pt=Admin','修改成功');
        else
            $this->error('index.php?c=category&p=list&pt=Admin&id='.$id,'修改失败');
     }
     $model = new \model\categoryModel;
     $list = $model->getList();
     $info = $model->find($id);
     $this->smarty->assign('data',
      array(
              'list'=>$list,
              'info'=>$info,
            )
     );
     $this->smarty->display('cat_edit.html');
    }
}
