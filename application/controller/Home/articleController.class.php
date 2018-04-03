<?php
namespace controller\Home;
class articleController extends baseController{
    //文章分类
    public function listAction(){
        $art_model = new \model\articleModel;
        $cat_model = new \model\categoryModel;
        $label_list = $art_model->getAllLabel();
        $cat_list = $cat_model->getList();
        if(isset($_GET['cat_id'])){
            $id = $_GET['cat_id'];
            $rowscount = $art_model->getCount($id);
            if($rowscount==0)
                $this->error('index.php?c=index&p=index&pt=Home','未添加此类别的文章');
            $page = new \lib\page($rowscount,3);
            $str = $page->show($id);
            $art_list = $art_model->getAllArticleById($id,$page->startno,$page->pagesize);
        }
        if(isset($_GET['label'])){
             $label = $_GET['label'];
             $rowscount = $art_model->getCount($label);
             $page = new \lib\page($rowscount,3);
             $str = $page->show($label);
             $art_list = $art_model->getAllArticleByLabel($label,$page->startno,$page->pagesize);
        }
        if(!isset($str)){
            $rowscount = $art_model->getCount($label);
            $page = new \lib\page($rowscount,3);
            $str = $page->show();
        }
        $this->smarty->assign('data',array(
            'art_list'=>$art_list,
            'label_list'=>$label_list,
            'cat_list'=>$cat_list,
            'str'=>$str
        ));
        $this->smarty->display('index.html');
    }
    //文章详情
    public function articleAction(){
        $id = $_GET['id'];
        $art_model = new \model\articleModel;
        $info = $art_model->find($id);
        if(empty($_SESSION['no'.$id])){ 
            $info['art_click']++;
            $art_model->update($info);
            $_SESSION['no'.$id]=1;
        }
        $art_list = $art_model->getAllInformationById($id);
        $reply_model = new \model\replyModel;
        $reply_list = $reply_model->getReply($id);
        $this->smarty->assign('data',array(    
            'art_list'=>$art_list,  
            'reply_list'=>$reply_list
        ));
        $this->smarty->display('article.html');
    }
    //点赞
    public function upAction(){
        $id = $_GET['id'];
        $type = $_GET['type'];
        if (isset($_SESSION['up'.$id]))
            $this->error('index.php?pt=Home&c=article&p=article&id='.$id);
        $art_model = new \model\articleModel;
        $info = $art_model->find($id);
        if($type=='up')
            $info['art_up']++;
        else
            $info['art_low']++;
        $art_model->update($info);
        $_SESSION['up'.$id]=1;
        $art_list = $art_model->getAllInformationById($id);
        $reply_model = new \model\replyModel;
        $reply_list = $reply_model->getReply($id);
        $this->smarty->assign('data',array(    
            'art_list'=>$art_list,
            'reply_list'=>$reply_list
        ));
        $this->smarty->display('article.html');
    }
    //下一页
    public function nextAction(){
        $art_id = $_GET['art_id'];
        $type = $_GET['type'];
        $art_model = new \model\articleModel;
        $list = $art_model->prevNext($art_id,$type); 
        if(empty($list)){
             echo <<<JS
        <script type="text/javascript">
            history.back();
        </script>
JS;
        }
        $reply_model = new \model\replyModel;
        $reply_list = $reply_model->getReply($list['art_id']);
        $this->smarty->assign('data',array(
            'art_list'=>$list,
            'reply_list'=>$reply_list
        ));
        $this->smarty->display('article.html');
    }
}
