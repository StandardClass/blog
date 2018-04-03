<?php
/* Smarty version 3.1.30, created on 2017-12-28 10:16:05
  from "C:\phpstudy\abc\important\kj2\application\view\Home\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4453e55ac4e7_03573586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01c0fbac5dc7302b28aa8b635da52f2aebe077ce' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Home\\index.html',
      1 => 1514427344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a4453e55ac4e7_03573586 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\phpstudy\\abc\\important\\kj2\\framework\\core\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<title>www.myblog.com - Welcome to 我的博客 - Powered by PHP150912</title>
	<link rel="stylesheet" rev="stylesheet" href="/important/kj2/application/view/Home/style/default.css" type="text/css" media="all"/>
	<?php echo '<script'; ?>
 src="/important/kj2/application/view/Home/script/common.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body class="multi index">

<!-- top bar -->
<div id="top">
	<div class="center">
    <div class="menu-left">
    <ul>
     <li><a href="javascript:;" onclick="setHomepage('http://www.myblog.com');">设为首页</a></li>
     <li><a href="javascript:;" onclick="addFavorite('http://www.myblog.com','www.myblog.com - Welcome to 我的博客')">收藏本站</a></li>      
    </ul>
    </div>
    <div class="menu-right">
	    <ul id="info">
		
        <li>欢迎 admin(管理员)！</li>
        <li><a href="/admin/admin.php" target="_blank">管理</a></li>
        <li><a href="index.php?module=Privilege&action=logout">退出</a></li>       
    </ul>
	    </div>
   </div>	
</div>
  
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="http://www.myblog.com">www.myblog.com</a></h1>
			<h3 id="BlogSubTitle">Welcome to 我的博客</h3>
		</div>
		<div id="divNavBar">
			<ul>
				<li id="nvabar-item-index"><a href="">首页</a></li><li id="navbar-page-2"><a href="">留言本</a></li>			</ul>
		</div>

		<div id="divMain">
 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['art_list'], 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
<div class="post multi">
	<h4 class="post-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rows']->value['art_time'],'%Y-%m-%d');?>
</h4>
	<h2 class="post-title"><a href="index.php?pt=Home&c=article&p=article&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['rows']->value['art_title'];?>
</a></h2>
	<div class="post-body">
		<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_content'];?>

	</div>
	<h5 class="post-tags"></h5>
	<h6 class="post-footer">
		作者:<?php echo $_smarty_tpl->tpl_vars['rows']->value['username'];?>
 | 分类:<?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
 | 阅读:<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_click'];?>
 | 赞:<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_up'];?>
 | 踩:<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_low'];?>
 | 评论:0</h6>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<div class="pagebar" > 
  	<?php echo $_smarty_tpl->tpl_vars['data']->value['str'];?>

  </div>
		</div>
<div id="divSidebar">
 
<dl class="function" id="divSearchPanel">
<dt class="function_t">文章标题搜索</dt><dd class="function_c">

<div>
	<form name="search" method="post" action="index.php">
		<input type="text" name="q" size="11" value=""/> 
		<input type="submit" value="搜索" />
	</form>
</div>
</dd>
</dl> 
<dl class="function" id="divCalendar">
<dl class="function" id="divCatalog">
<dt class="function_t">文章分类</dt><dd class="function_c">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['cat_list'], 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
        <li><a href="index.php?pt=Home&c=article&p=list&cat_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
" target="_self"><?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['rows']->value['deep']*4);
echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</a></li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</dd>
</dl> 
<dl class="function" id="divCalendar">
<dl class="function" id="divCatalog">
<dt class="function_t">标签分类</dt><dd class="function_c">
    <ul>
        <?php $_smarty_tpl->_assignInScope('n', 1);
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['label_list'], 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <li><a href="index.php?pt=Home&c=article&p=list&label=<?php echo urlencode($_smarty_tpl->tpl_vars['k']->value);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a></li>
        <?php if ($_smarty_tpl->tpl_vars['n']->value++ >= 5) {?>
            <?php break 1;?> <!--展示的标签达到5个就结束循环（就是只呈现5个最常出现的标签）-->
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</dd>
</dl> 
</div>
		<div id="divBottom">
        	<h3 id="BlogCopyRight">
                                            	Copyright © 2008-2028 PHP150912 All Rights Reserved            </h3>
			<h4 id="BlogPowerBy">Powered by <a href="" title="myblog" target="_blank">myblog V1.0 Release 20151116</a></h4>
		</div><div class="clear"></div>
	</div><div class="clear"></div>
	</div><div class="clear"></div>
</div>
</body>
</html><?php }
}
