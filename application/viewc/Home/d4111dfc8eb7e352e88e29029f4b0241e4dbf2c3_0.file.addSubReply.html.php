<?php
/* Smarty version 3.1.30, created on 2017-12-27 22:24:29
  from "C:\phpstudy\abc\important\kj2\application\view\Home\addSubReply.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a43ad1d157556_67435769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4111dfc8eb7e352e88e29029f4b0241e4dbf2c3' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Home\\addSubReply.html',
      1 => 1514384507,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a43ad1d157556_67435769 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\phpstudy\\abc\\important\\kj2\\framework\\core\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<title>www.myblog.com - 数量测试 - Powered by ITCAST</title>
	<link rel="stylesheet"  href="/important/kj2/application/view/Home/style/default.css" type="text/css" media="all"/>
	<?php echo '<script'; ?>
 src="/important/kj2/application/view/Home/script/common.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body class="single article">

<!-- top bar -->
<div id="top">
	<div class="center">
    <div class="menu-left">
    <ul>
     <li><a href="javascript:;" onclick="setHomepage('');">设为首页</a></li>
     <li><a href="javascript:;" onclick="addFavorite('','www.myblog.com - Welcome to TQBlog!')">收藏本站</a></li>      
    </ul>
    </div>
	 <div class="menu-right">
    <ul id="info">
		
        <li>欢迎 admin(管理员)！</li>
        <li><a href="/important/kj2/application/view/Home//admin/admin.php" target="_blank">管理</a></li>
        <li><a href="index.php?module=Privilege&action=logout">退出</a></li>       
    </ul>
    </div>
   </div>	
</div>
  
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="">www.myblog.com</a></h1>
			<h3 id="BlogSubTitle">Welcome to TQBlog!</h3>
		</div>
		<div id="divNavBar">
			<ul>
				<li id="nvabar-item-index"><a href="index.php?c=index&p=index&pt=Home">首页</a></li>			
                        </ul>
		</div>

		<div id="divMain">
<div class="post single">
	<h4 class="post-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['art_list']['art_time'],'%Y-%m-%d');?>
</h4>
	<h2 class="post-title"><?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_title'];?>
</h2>
	<div class="post-body"><?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_content'];?>
</div>
	<h5 class="post-tags"></h5>
	<h6 class="post-footer">
		作者:<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['username'];?>
 | 分类:<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['name'];?>
 | 阅读:<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_click'];?>
 | 评论:3 | <a href="index.php?c=article&p=up&pt=Home&type=up&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_id'];?>
">赞</a>:<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_up'];?>
 | <a href="index.php?c=article&p=up&pt=Home&type=down&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_id'];?>
">踩</a>:<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_low'];?>
	</h6>
</div>
<div>
    <a href="index.php?pt=Home&c=article&p=next&type=prev&art_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_id'];?>
">上一篇</a> &nbsp;
    <a href="index.php?pt=Home&c=article&p=next&type=next&art_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['art_list']['art_id'];?>
">下一篇</a>
</div>


<label id="AjaxCommentBegin"></label>
<!--评论输出-->
<ul class="msg msghead">
	<li class="tbname">评论列表:</li>
</ul>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['reply_list'], 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
<ul id="cmt1" class="msg" style="margin-left: <?php echo $_smarty_tpl->tpl_vars['rows']->value['deep']*40;?>
px">
	<li class="msgname"><img width="32" alt="" src="/important/kj2/Public/upload/<?php echo $_smarty_tpl->tpl_vars['rows']->value['face'];?>
" class="avatar">&nbsp;<span class="commentname"><a target="_blank" rel="nofollow" href=""><?php echo $_smarty_tpl->tpl_vars['rows']->value['username'];?>
</a></span><br><small>发布于&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rows']->value['reply_time'],'%Y-%m-%d');?>
&nbsp;&nbsp;<span class="revertcomment"><a onclick="RevertComment('1')" href="#comment">回复</a></span></small></li>
        <li class="msgarticle"><?php echo $_smarty_tpl->tpl_vars['rows']->value['reply_content'];?>
</li>
</ul>	
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<!--评论框-->
<div class="post" id="divCommentPost">
	<p class="posttop"><a name="comment">admin发表评论:</a><a rel="nofollow" id="cancel-reply" href="#divCommentPost" style="display:none;"><small>取消回复</small></a></p>
	<form id="frmSumbit" target="_self" method="post" action="" >	
		<p><label for="txaArticle">正文(*)</label></p>
		<p><textarea name="txaArticle" id="txaArticle" class="text" cols="50" rows="4" tabindex="6" ></textarea></p>
		<p><input name="sumbit" type="submit" tabindex="7" value="提交" onclick="return VerifyMessage()" class="button" /></p>
	</form>
	<p class="postbottom">☆欢迎发表您的看法、交流您的观点。</p>
</div>
		</div>
		<div id="divBottom">
        	<h3 id="BlogCopyRight">
                                            	Copyright © 2008-2028 tqtqtq.com All Rights Reserved            </h3>
			<h4 id="BlogPowerBy">Powered by <a href="http://www.tqtqtq.com/" title="TQBlog" target="_blank">TQBlog V2.0 Release 20140101</a></h4>
		</div><div class="clear"></div>
	</div><div class="clear"></div>
	</div><div class="clear"></div>
</div>
</body>
</html><!--86.655ms--><?php }
}
