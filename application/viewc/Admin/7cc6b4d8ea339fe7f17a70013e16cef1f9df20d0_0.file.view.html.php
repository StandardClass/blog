<?php
/* Smarty version 3.1.30, created on 2017-12-19 16:53:08
  from "C:\phpstudy\abc\important\kj2\application\view\Admin\view.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a38d374427036_84865650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cc6b4d8ea339fe7f17a70013e16cef1f9df20d0' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Admin\\view.html',
      1 => 1513432424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a38d374427036_84865650 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1" rules="all" width="600">
		<tr>
			<th>类别</th>
			<th>内容</th>
			<th>作者</th>
		</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                            <tr>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Contents'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value['Author'];?>
</td>
                                <td><input type="button" value="删除" onclick="location.href='index.php?p=del&pt=Admin&c=products&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['Id'];?>
'"></td>
                            </tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
</body>
</html><?php }
}
