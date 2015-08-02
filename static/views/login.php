<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>离石啦后台管理系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />

<link href="<?php echo base_url('static/css/style.css') ?>" rel='stylesheet' type='text/css' />

<script type="text/javascript" src="<?php echo base_url('static/js/jquery.min.js') ?>"></script>

</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});	  
});
</script>

<h1>离石啦后台管理系统--管理员登录</h1>
<div class="login-form">

	<div class="head-info">
		<label class="lbl-1"> </label>
		<label class="lbl-2"> </label>
		<label class="lbl-3"> </label>
	</div>
	<div class="clear"> </div>
	<div class="avtar"><img src="<?php echo base_url('static/images/avtar.png') ?>" /></div>
	<form method="post" action="<?php echo site_url('login/logining')?>">
		<input type="text" class="text" name="nickname"  value="请输入用户名" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '请输入用户名';}" >
		<div class="key"><input name="password" style="margin-bottom:0em;" type="password" value="请输入密码" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '请输入密码';}"></div>
		<input style="width:40%;margin-top:0em;float:left;margin-left:1em;" name="code" type="text" value="请输入验证码" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '请输入验证码';}">
		<img style="margin-top:1em;" src="<?php echo site_url('login/get_code')?>" onclick="this.src='<?php echo site_url('login/get_code')?>'">
	
	<div class="signin"><input type="submit" value="登录"></div>
	</form>
</div>


</body>
</html>