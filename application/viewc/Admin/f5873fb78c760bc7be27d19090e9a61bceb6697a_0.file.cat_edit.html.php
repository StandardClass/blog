<?php
/* Smarty version 3.1.30, created on 2017-12-23 19:17:27
  from "C:\phpstudy\abc\important\kj2\application\view\Admin\cat_edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3e3b47af2528_61429949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5873fb78c760bc7be27d19090e9a61bceb6697a' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Admin\\cat_edit.html',
      1 => 1514027839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3e3b47af2528_61429949 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>拼图后台管理-后台管理</title>
<link rel="stylesheet" href="/important/kj2/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/important/kj2/Public/Admin/css/admin.css">
</head>

<body>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>分类管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">修改分类</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="">
          <div class="form-group">
            <div class="label">
              <label for="cat_name">分类名称</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="cat_name" name="cat_name" size="50" placeholder="分类名称" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['info']['name'];?>
" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="parentid">所属分类</label>
            </div>
            <div class="field">
              <select class="input" name="parentid" style="width:20%" id="parentid">
              	<option value="0">---最顶层---</option>
              	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['list'], 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                	<option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['rows']->value['id'] == $_smarty_tpl->tpl_vars['data']->value['info']['parent_id'] ? 'selected' : '';?>
 ><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sort_order">排序</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sort_order" name="sort_order" size="50" placeholder="50" data-validate="required:请填写分类排序"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['info']['sort_order'];?>
"/>
            </div>
          </div>
          <div class="form-button">
            <button class="button bg-main" type="submit">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">传智播客</a>构建</p>
</div>
</body>
</html><?php }
}
