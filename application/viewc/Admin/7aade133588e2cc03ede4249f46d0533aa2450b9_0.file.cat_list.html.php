<?php
/* Smarty version 3.1.30, created on 2017-12-23 17:48:41
  from "C:\phpstudy\abc\important\kj2\application\view\Admin\cat_list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3e2679af8eb4_14303502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7aade133588e2cc03ede4249f46d0533aa2450b9' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Admin\\cat_list.html',
      1 => 1514022513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3e2679af8eb4_14303502 (Smarty_Internal_Template $_smarty_tpl) {
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
    	<div class="panel-head"><strong>类别列表</strong></div>
        <div class="padding border-bottom">
          <input type="button" class="button button-small border-green" value="添加类别" onClick="location.href='index.php?c=category&p=add&pt=Admin'" />
        </div>
        <table class="table table-hover">
        	<tr>
        	  <th width="45">编号</th><th width="*">名称</th><th width="100">操作</th></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
$_smarty_tpl->tpl_vars['rows']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->iteration++;
$__foreach_rows_0_saved = $_smarty_tpl->tpl_vars['rows'];
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['rows']->iteration;?>
</td>
            <td style="padding-left:<?php echo $_smarty_tpl->tpl_vars['rows']->value['deep']*40;?>
px"><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</td>
            <td><a class="button border-blue button-little" href="index.php?c=category&p=edit&pt=Admin&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
">修改</a></td> 
            <td><a class="button border-blue button-little" href="index.php?c=category&p=del&pt=Admin&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
">删除</a></td> 
            </tr>
            <?php
$_smarty_tpl->tpl_vars['rows'] = $__foreach_rows_0_saved;
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
