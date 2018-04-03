<?php
namespace model;
class articleModel extends \core\Model{
    public function getACTable($data=array()){ 
        $sql ="select * from article a,category c where a.cat_id=c.id and 
        user_id={$_SESSION['user']['id']} and is_recycle=0 ";
       if(isset($data['id']) && $data['id']!==''){
            $cate_model = new \model\categoryModel;
            $parent_id = $data['id'];
            $rs =$cate_model->getList($parent_id); //获取子类列表
            $arr = array();
            foreach($rs as $rows) {
                $arr[]=$rows['id'];  //获取所有子类的id
            }
            $arr[]=$data['id'];
            $id_list = implode(',', $arr);
       }
        foreach($data as $k=>$v){
            if($v!==''){
                if(in_array($k,array('art_title','art_content')))
                    $sql.=" and `{$k}` like '%{$v}%'"; //此处语句前有空格
                elseif($k=='id')
                    $sql.=" and a.cat_id in ($id_list)";
                else
                    $sql.=" and `{$k}`={$v}" ;
            }
        }
        $sql.= " order by art_id desc"; //此处语句前有空格
        return $this->mypdo->fetchAll($sql);
    }
    public function del($id){
        $sql = "update article set is_recycle=1 where art_id in ($id)";
        return $this->mypdo->exec($sql);
    }
    public function recover($id){
        $sql = "update article set is_recycle=0 where art_id in ($id)";
        return $this->mypdo->exec($sql);
    }
    public function getRecycle(){
        $sql ="select * from article a,category c where a.cat_id=c.id and 
        user_id={$_SESSION['user']['id']} and is_recycle=1 order by art_id desc";
        return $this->mypdo->fetchAll($sql);
    }
/**************前台功能*********************/
    //获取所有文章
     public function getAllArticle($startno,$pagesize){
        $sql="select a.*,c.name,u.username from `article` a , `user` u ,`category` c where a.user_id = u.id
        and a.cat_id = c.id order by art_id desc limit $startno,$pagesize";
        return $this->mypdo->fetchAll($sql);
    }
    //获取所有标签
    public function getAllLabel(){
        $sql = "select art_label from article";
        $list = $this->mypdo->fetchAll($sql);
        $arr = array();
        foreach($list as $rows){
            $label = preg_split('/[,|，]/', $rows['art_label'], 0, PREG_SPLIT_NO_EMPTY);
            foreach($label as $rs){
                $arr[]=$rs;
            }
        }
        //统计每个标签的数量(去重)
        $label_list = array();
        foreach($arr as $rows){
            if(array_key_exists($rows, $label_list))
               $label_list[$rows]++;
            else
               $label_list[$rows]=1;
        }
        arsort($label_list);
        return $label_list;
    }
    //通过ID检索文章
    public function getAllArticleById($id,$startno,$pagesize){
        $sql="select a.*,c.name,u.username from `article` a , `user` u ,`category` c where a.user_id = u.id
        and a.cat_id = c.id and cat_id = {$id} order by art_id desc limit $startno,$pagesize";
        return $this->mypdo->fetchAll($sql);
    }
    //通过标签检索文章
    public function getAllArticleByLabel($label,$startno,$pagesize){
        $sql="select a.*,c.name,u.username from `article` a , `user` u ,`category` c where a.user_id = u.id
        and a.cat_id = c.id and art_label like '%{$label}%' order by art_id desc limit $startno,$pagesize";
        return $this->mypdo->fetchAll($sql);
    }
    //通过id获取详情
     public function getAllInformationById($id){
        $sql="select a.*,c.name,u.username from `article` a , `user` u ,`category` c where a.user_id = u.id
        and a.cat_id = c.id and art_id = {$id} order by art_id desc";
        return $this->mypdo->fetchRow($sql);
    }
    //下一页功能
     public function prevNext($art_id,$type){
       if($type=='prev')
            $sql="select a.*,c.name,u.username from `article` a , `user` u ,`category` c where a.user_id = u.id
            and a.cat_id = c.id and art_id > {$art_id} order by art_id asc limit 1";
        else
            $sql="select a.*,c.name,u.username from `article` a , `user` u ,`category` c where a.user_id = u.id
            and a.cat_id = c.id and art_id < {$art_id} order by art_id desc limit 1";
        return $this->mypdo->fetchRow($sql);
    }
    //统计功能
    public function getCount($param=''){
        if($param=='')
            $sql = "select count(*) from article";
        if(is_numeric($param)){
            $sql = "select count(*) from `article` where cat_id = $param";
        }
        else{
           $sql = "select count(*) from article where art_label like '%{$param}%'";
        }  
        return $this->mypdo->fetchColumn($sql);
    }
}
