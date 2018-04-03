<?php
namespace controller\Home;
class replyController extends baseController{
   //评论功能
   public function mainReplyAction(){
       if(empty($_SESSION['user']))
           $this->error('index.php?pt=Admin&c=login&p=login','评论前请先登录');
       if(!empty($_POST)){
           $data['reply_content']=$_POST['txaArticle'];
           $data['reply_time']=time();
           $data['art_id']=$_POST['art_id'];
           $data['user_id']=$_SESSION['user']['id'];
           $data['parent_id']=0;
           $reply_model = new \model\replyModel;
           if($reply_model->insert($data))
               $this->success('index.php?pt=Home&c=article&p=article&id='.$data['art_id'],'评论成功');
           else
               $this->error ('index.php?pt=Home&c=article&p=article&id='.$data['art_id'],'评论失败');
       }
   }
   //回复评论功能
   public function subReplyAction(){
       $parent_id = $_GET['parent_id'];
       $art_id = $_GET['id'];
       $id = $_GET['id'];
       if(empty($_SESSION['user']))
           $this->error('index.php?pt=Admin&c=login&p=login','评论前请先登录');
       if(!empty($_POST)){
           $data['reply_content']=$_POST['txaArticle'];
           $data['reply_time']=time();
           $data['art_id']=$art_id;
           $data['user_id']=$_SESSION['user']['id'];
           $data['parent_id']=$parent_id;
           $reply_model = new \model\replyModel;
           if($reply_model->insert($data))
               $this->success('index.php?pt=Home&c=article&p=article&id='.$data['art_id'],'评论成功');
           else
               $this->error ('index.php?pt=Home&c=article&p=article&id='.$data['art_id'],'评论失败');
       }
        $art_model = new \model\articleModel;
        $info = $art_model->find($id); 
        $art_list = $art_model->getAllInformationById($id);
        $reply_model = new \model\replyModel;
        $reply_list = $reply_model->getReply($id);
        $this->smarty->assign('data',array(    
            'art_list'=>$art_list,  
            'reply_list'=>$reply_list
        ));
          $this->smarty->display('addSubReply.html');
   }
}

