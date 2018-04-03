<?php
namespace model;
    class replyModel extends \core\Model{
            //获取评论表里关于此文章的所有评论
            public function getReply($id){
                $sql = "select * from `reply` r,user u where r.user_id=u.id and art_id = $id ";
                $list = $this->mypdo->fetchAll($sql);
                return $this->createReplyTree($list,$parent_id=0);
            }
            //创建无限级分类
            public function createReplyTree($list,$parent_id=0,$deep=0){
                static $tree = array();
                foreach($list as $rows){
                    if($rows['parent_id']==$parent_id){
                        $rows['deep']=$deep;
                        $tree[]=$rows;
                        $this->createReplyTree($list,$rows['reply_id'],$deep+1);
                    }
                }
                return $tree;
            }
        }
