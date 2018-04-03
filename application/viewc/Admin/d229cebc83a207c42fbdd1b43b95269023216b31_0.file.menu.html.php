<?php
/* Smarty version 3.1.30, created on 2018-01-17 19:05:39
  from "C:\phpstudy\abc\important pro\kj2\application\view\Admin\menu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5f2e0386ff32_16278235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd229cebc83a207c42fbdd1b43b95269023216b31' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important pro\\kj2\\application\\view\\Admin\\menu.html',
      1 => 1514470180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5f2e0386ff32_16278235 (Smarty_Internal_Template $_smarty_tpl) {
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
