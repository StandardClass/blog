<?php
/* Smarty version 3.1.30, created on 2017-12-28 22:01:48
  from "C:\phpstudy\abc\important\kj2\application\view\Admin\article_list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a44f94c52a473_28232930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17e19069c44efca93565d516c91a253594f8d0a7' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important\\kj2\\application\\view\\Admin\\article_list.html',
      1 => 1514469667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a44f94c52a473_28232930 (Smarty_Internal_Template $_smarty_tpl) {
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
<div class="panel-head"><strong>文章检索</strong>&nbsp;&nbsp;&nbsp;&nbsp;
	类别：
        <select name="cat_id">
            <option value="">不限</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['cat_list'], 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
" <?php echo isset($_POST['cat_id']) && $_POST['cat_id'] == $_smarty_tpl->tpl_vars['rows']->value['id'] ? 'selected' : '';?>
><?php ob_start();
echo $_smarty_tpl->tpl_vars['rows']->value['deep']*4;
$_prefixVariable1=ob_get_clean();
echo str_repeat('&nbsp;',$_prefixVariable1);
echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
        标题：<input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '';?>
">
    内容：<input type="text" name="content" value="<?php echo isset($_POST['content']) ? $_POST['content'] : '';?>
">
    是否公开：<select name="is_public"><option value="" name="is_public">不限</option><option value="1" <?php echo isset($_POST['is_public']) && $_POST['is_public'] === "1" ? 'selected' : '';?>
>是</option><option value="0" <?php echo isset($_POST['is_public']) && $_POST['is_public'] === "0" ? 'selected' : '';?>
>否</option></select>
    是否置顶：<select name="is_top"><option value="" name="is_top">不限</option><option value="1" <?php echo isset($_POST['is_top']) && $_POST['is_top'] === '1' ? 'selected' : '';?>
>是</option><option value="0" <?php echo isset($_POST['is_top']) && $_POST['is_top'] === "0" ? 'selected' : '';?>
>否</option></select>
    <input type="submit" name="submit" value="搜索">
</div>
</div>
</form>
<?php echo '<script'; ?>
 type="text/javascript">
    var flag = false;
    function selectAll(){
        flag=!flag;
        var arr = document.getElementsByName('id');
        for(var i in arr)
            arr[i].checked=flag;
        }

    function del(){
	var art_ids=document.getElementsByName('id');	//获取所有的复选框
	var array=[];	//数组用来保存选中的编号
	for(var s in art_ids){
		if(art_ids[s].checked && art_ids[s].value){ //不加&& arr[i].value,全选恢复时会报错
			array.push(art_ids[s].value);
		}
	}
	if(array.length==0)	//如果没有选择复选框，就终止执行
		return;
	art_id=array.join(',');	//将选中的编号用逗号分隔
	if(confirm('确定要删除吗'))
		location.href='index.php?pt=Admin&c=article&p=del&id='+art_id;
} 
<?php echo '</script'; ?>
>
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" onClick="selectAll()" name="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-green" value="添加文章" onClick="location.href='index.php?pt=Admin&c=article&p=add'"/>
            <input type="button" class="button button-small border-yellow" onClick="del()" value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" onClick="location.href='index.php?pt=Admin&c=article&p=recycle'"/>
        </div>
        <table class="table table-hover">
            <tr><th width="45">选择</th><th width="120">分类</th><th width="*">名称</th><th width='100'>是否置顶</th><th width="100">是否公开</th>
                <th width="100">标签</th><th width="100">时间</th><th width="160">操作</th></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['art_list'], 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
            <tr>
                <td><input type="checkbox" name="id" value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['art_title'];?>
</td>
                <td><img src="\important\kj2\Public\Admin\images\<?php echo $_smarty_tpl->tpl_vars['rows']->value['is_top'] == 1 ? 'yes' : 'no';?>
.gif"></td>
                <td><img src="\important\kj2\Public\Admin\images\<?php echo $_smarty_tpl->tpl_vars['rows']->value['is_public'] == 1 ? 'yes' : 'no';?>
.gif"></td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['art_label'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rows']->value['art_time'],'%Y-%m-%d');?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?c=article&p=update&pt=Admin&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
">修改</a>
                    <a class="button border-yellow button-little" href="index.php?pt=Admin&c=article&p=del&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
" onclick="return confirm('确认删除?')">删除</a>
                    <?php if ($_smarty_tpl->tpl_vars['rows']->value['is_top']) {?>
                    <a class="button border-blue button-little" href="index.php?pt=Admin&c=article&p=setTop&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
&top=0">取消置顶</a>
                    <?php } else { ?>
                    <a class="button border-blue button-little" href="index.php?pt=Admin&c=article&p=setTop&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
&top=1">置顶</a>
                    <?php }?>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li><a href="#">上一页</a></li></ul>
            <ul class="pagination pagination-group">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <ul class="pagination"><li><a href="#">下一页</a></li></ul>
        </div>
    </div>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">传智播客</a>构建</p>
</div>
</body>
</html><?php }
}
