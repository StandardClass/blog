<?php
return array(
    //数据库名
    'database'=>array(
        'type'=> 'mysql',
        'dbname'=> '', 
    ),
    //路由参数
    'param' => array(
        'debug'=>'true', 
        'face_type'=>array('image/png','image/jpeg','image/gif'),
        'face_size'=>1024*1024,
        'face_path'=>'./Public/upload/',
        'c' => 'login', //控制器名
        'p' => 'login', //方法名
        'pt' => 'Admin', //平台名
    )
);