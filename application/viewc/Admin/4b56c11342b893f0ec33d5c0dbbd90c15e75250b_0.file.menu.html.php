<?php
/* Smarty version 3.1.30, created on 2017-12-28 22:09:45
  from "C:\phpstudy\abc\important\kj2\application\view\Admin\menu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a44fb29c8d818_96975577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b56c11342b893f0ec33d5c0dbbd90c15e75250b' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Admin\\menu.html',
      1 => 1514470180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a44fb29c8d818_96975577 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="/important/kj2/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/important/kj2/Public/Admin/css/admin.css">
</head>

<body>
<ul class="nav nav-inline admin-nav">
    <li class="active">
        <ul>
            <?php if ($_SESSION['user']['is_admin'] == 1) {?>
            <li><a href="index.php?pt=Admin&c=user&p=list" target="mainFrame">用户管理</a></li>
            <li><a href="index.php?pt=Admin&c=category&p=list" target="mainFrame">类别管理</a></li>
            <?php }?>        	
            <li><a href="index.php?pt=Admin&c=user&p=edit" target="mainFrame">个人设置</a></li>
            <li><a href="index.php?pt=Admin&c=article&p=list" target="mainFrame">文章管理</a></li> 
            <li><a href="index.php?pt=Admin&c=admin&p=admin" target="_top">首页信息</a></li>
        </ul>
    </li>
</ul>
</body>
</html>
<?php }
}
