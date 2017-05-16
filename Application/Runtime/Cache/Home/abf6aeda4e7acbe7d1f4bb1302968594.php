<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册</title>
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Register/register.js" ></script>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Register/Register.css" rel="stylesheet" type="text/css" />

</head>
<body>
	
	<div id="Register">
		<div class="mainbody">
			<form action="/blog/index.php/Home/Register/register" method="post" class="regform">
				<div id="owl-reg">
					<div class="hand"></div>
					<div class="hand hand-r"></div>
					<div class="arms">
						<div class="arm"></div>
						<div class="arm arm-r"></div>
					</div>
				</div>
				<div class="input-box">
					<div class="username">
						<label for="username" class="pic pic1" ></label>
						<input type="text" name="username" placeholder="用户名" title="请输入用户名，不少于6位" tabindex="1" autofocus="autofocus" />
					</div>
					<div class="password">
						<label for="password" class="pic pic2" ></label>
						<input type="password" name="password" placeholder="密码" title="请输入密码，不少于6位" tabindex="2" />
					</div>
					<div class="Repassword">
						<label for="repassword" class="pic pic3" ></label>
						<input type="password" name="repassword" placeholder="确认密码" title="请再一次确认密码" tabindex="3" />
					</div>
					<div class="sex sexborder">
						<img style="width:23px;height:23px;position:absolute;top:3px;left:10px;" src="/blog/Public/Image/sex.png" />
						<span>性别</span>
						<label for="man">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/man.png" />
							男士
						</label>
						<input type="radio" name="sex" value="1" id="man" checked="checked" tabindex="4" />
						<label for="women">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/women.png" />
							女士
						</label>
						<input type="radio" name="sex" value="0" id="women"  />
					</div>
					<div class="date">
						<label for="date" class="pic pic4" ></label>
						<input type="text" name="date" placeholder="你的生日" title="请选择您的生日" tabindex="5" />
					</div>
					<div class="verify">
						<label for="verify" class="pic pic5" ></label>
						<input type="text" name="verify" placeholder="验证码" title="请输入验证码" tabindex="6" />&nbsp<img id=img1 width="80" height="40" src="/blog/index.php/Home/Public/Verify" 
					onclick="this.src=this.src+'?'+Math.random()" />
					</div>
				</div>
				<div class="form-actions">
					<button type="button" tabindex="7" class="btn btn-toLogin">已注册?去登陆</button>
					<button type="button" tabindex="8" class="btn btn-reg">注册</button>
				</div>
			</form>
		</div>
	</div>	

</body>
</html>