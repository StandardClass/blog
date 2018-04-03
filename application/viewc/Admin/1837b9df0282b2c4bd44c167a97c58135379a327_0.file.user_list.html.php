<?php
/* Smarty version 3.1.30, created on 2017-12-22 20:21:36
  from "C:\phpstudy\abc\important\kj2\application\view\Admin\user_list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3cf8d0a37984_79179313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1837b9df0282b2c4bd44c167a97c58135379a327' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Admin\\user_list.html',
      1 => 1513945293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3cf8d0a37984_79179313 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\phpstudy\\abc\\important\\kj2\\framework\\core\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-后台管理</title>
    <link rel="stylesheet" href="/important/kj2/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/important/kj2/Public/Admin/css/admin.css">
</head>

<body>
<div class="admin">
	<form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>用户信息</strong></div>
    	<table class="table table-hover">
        	<tr>
        	  <th width="45">编号</th>
        	  <th width="*">姓名</th>
        	  <th width="*">登陆次数</th>
        	  <th width="*">最后登陆时间</th>
        	  <th width="*">最后登陆IP</th><th width="100">操作</th></tr>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                  <tr>
                    <!--不显示超级管理员的信息-->
                    <?php if ($_smarty_tpl->tpl_vars['rows']->value['is_admin'] == 1) {?>
                        <?php continue 1;?>;
                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('n', 1);
?>
                       <td><?php echo $_smarty_tpl->tpl_vars['n']->value++;?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['username'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['logincount'];?>
</td>
                       <!--下述把数据库里的时间戳（用它因为读写速度快）改为我们平时看的时间格式-->
                       <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rows']->value['lastlogintime'],'%Y-%m-%d %H:%M:%S');?>
</td> 
                       <td><?php echo long2ip($_smarty_tpl->tpl_vars['rows']->value['lastloginip']);?>
</td>
                       <td><a class="button border-yellow button-little" href="index.php?c=user&p=del&pt=Admin&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
" onclick="return confirm('确认删除?')">删除</a></td></tr>
                  </tr> 
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>       
    </div>
    </form>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">传智播客</a>构建</p>
</div>
</body>
</html><?php }
}
