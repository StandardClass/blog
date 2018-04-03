<?php
/* Smarty version 3.1.30, created on 2018-01-17 18:56:29
  from "C:\phpstudy\abc\important pro\kj2\application\view\Admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5f2bdd1b3e20_11842327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90d40bc58055783f38f1710f577886e9171447c3' => 
    array (
      0 => 'C:\\phpstudy\\abc\\important pro\\kj2\\application\\view\\Admin\\login.html',
      1 => 1513847308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5f2bdd1b3e20_11842327 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>拼图后台管理-用户登录</title>
    <link rel="stylesheet" href="/important/kj2/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/important/kj2/Public/Admin/css/admin.css">
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y"> <img src="/important/kj2/Public/Admin/images/logo.png" class="radius" alt="后台管理系统" />
            </div>
            <br /><br />
            <form action="" method="post">
            <div class="panel">
                <div class="panel-head"><strong>登录拼图后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="username" placeholder="登录账号"  />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" placeholder="登录密码" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input" name="passcode" placeholder="填写右侧的验证码" />
                            <img src="index.php?p=verify&c=login&pt=Admin" width="80" height="32" class="passcode" onClick="this.src='index.php?p=verify&c=login&pt=Admin&'+Math.random()" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                        	<input type="checkbox" name="remember" value="1">7天之内免登陆
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center">
                <input type="submit" name='submit' class="button button-block bg-main text-big"  style="float:left; margin-right:10px;" value="立即登录后台" />
                <input type="button" value="用户注册"  class="button button-block bg-main text-big" onClick="location.href='index.php?pt=Admin&c=login&p=register'" />
                </div>
            </div>
            </form>
            <div class="text-right text-small text-gray padding-top">基于传智播客构建</div>
        </div>
    </div>
</div>

</body>
</html>














<?php }
}