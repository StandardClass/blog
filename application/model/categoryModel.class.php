<?php
namespace model;
    class categoryModel extends \core\Model{
       private  $tree;
       public function getList($parent_id=0){
           $sql = "select * from `category` order by sort_order";
           $list = $this->mypdo->fetchAll($sql);
           return $this->createTree($list,$parent_id);
       }
       //无限级分类
        public function createTree($list,$parent_id=0,$deep=0){
            foreach($list as $rows){
                if($rows['parent_id'] == $parent_id){
                    $rows['deep']=$deep;
                    $this->tree[]=$rows;
                    $this->createTree($list,$rows['id'],$deep+1);
                }
            }
            return $this->tree;
        }
        //统计类别数量
        public function isLeaf($id){
            $sql = "select count(*) from `category` where parent_id = $id";
            return $this->mypdo->fetchColumn($sql);
        }
        //遍历出所有后代
        public function isMySon($id,$parent){
            $list = $this->select();
            $list = $this->createTree($list,$id);
            $flag = 0;
            foreach($list as $rows){
                if($rows['id']==$parent){ 
                    $flag = 1;
                    break;
                }
            }
            return $flag;
        }
    }
