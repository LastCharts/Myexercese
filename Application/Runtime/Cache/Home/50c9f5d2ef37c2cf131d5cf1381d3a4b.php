<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<link href="/blog/Public/Css/Login/login.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Login/login.js"></script>
</head>
<body>
	
	<div id="login">
		<div class="mainbody">
			<form action="/blog/index.php/Home/Login/dologin" method="post" class="loginform">
				<div id="owl-login">
					<div class="hand"></div>
					<div class="hand hand-r"></div>
					<div class="arms">
						<div class="arm"></div>
						<div class="arm arm-r"></div>
					</div>
				</div>
				<div class="input-box">
					<div class="username">
						<label for="username" class="pic1" ></label>
						<input type="text" name="username" placeholder="用户名" title="请输入用户名" tabindex="1" autofocus="autofocus">
					</div>
					<div class="password">
						<label for="password" class="pic2" ></label>
						<input type="password" name="password" placeholder="密码" title="请输入登录密码" tabindex="2" >
					</div>
					<div class="verify">
						<label for="verify" class="pic3" ></label>
						<input type="text" name="verify" placeholder="验证码" title="请输入验证码" tabindex="3" >&nbsp<img id=img1 width="80" height="40" src="/blog/index.php/Home/Public/Verify" 
					onclick="this.src=this.src+'?'+Math.random()" />
					</div>
				</div>
				<div class="form-actions">
					<button type="button" tabindex="4" class="btn btn-noLogin">先随便逛逛</button>
					<a href="/blog/index.php/Home/Register/reg" tabindex="5" class="register">注册</a>
					<button type="submit" tabindex="6" class="btn btn-login">登录</button>
				</div>
			</form>
		</div>
	</div>	


</body>
</html>