<?php
namespace controller\Home;
class indexController extends baseController{
    //前台文章列表
    public function indexAction(){
        $art_model = new \model\articleModel;
        $cat_model = new \model\categoryModel;
        $label_list = $art_model->getAllLabel();
        $cat_list = $cat_model->getList();
        $rowscount = $art_model->getCount();
        $page = new \lib\page($rowscount,3);
        $art_list = $art_model->getAllArticle($page->startno,$page->pagesize);
        $str = $page->show();
        $this->smarty->assign('data',array(
            'art_list'=>$art_list,
            'label_list'=>$label_list,
            'cat_list'=>$cat_list,
            'str'=>$str
        ));
        $this->smarty->display('index.html');
    }
}
