<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发表内容</title>

<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/NewMoments/newmoments.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/jquery.sinaEmotion.css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/NewMoments/jquery.sinaEmotion.js"></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/NewMoments/newmoments.js"></script>
</head>
<body>
	
	<header>
	<nav id="nav">
		<ul>
		  <li><a href="/blog/index.php/Home/Index/index" target="_blank" title="我的首页">我的首页</a></li>
		  <li><a href="/blog/index.php/Home/Userinfo/userinfo" target="_blank" title="个人中心">个人中心</a></li>
		  <li><a href="/blog/index.php/Home/Friend/friend" target="_blank" title="好友列表">好友列表</a></li>
		  <li><a href="/blog/index.php/Home/Favorite/favorite" target="_blank" title="关注列表">关注列表</a></li>
		  <li><a href="/blog/index.php/Home/Repassword/repassword" target="_blank" title="关注列表">修改密码</a></li>
		  <li><a href="/blog/index.php/Home/Moments/moments" target="_blank" title="朋友圈">朋友圈</a></li>
		</ul>
	</nav>
	<div class="login">
		<a href="javascript:void(0)" id="login_a"> 登录</a>
		<a href="javascript:void(0)" id="member"> 用户</a>
		<a href="/blog/index.php/Register/reg" id="reg"> | 注册</a>
		<a href="javascript:void(0)" id="logout"> |退出</a>
	</div>
</header>


<div id="login_div" title="用户登录">
	<form action="/blog/index.php/Home/Login/dologin" method="post" name="login">
		用户名:<input type="text" name="username" id="username" /><br/>
		密　码:<input type="password" name="password" id="password" /><br/>
		验证码:<input type="text" name="verify" id="verify" />&nbsp<img id=img1 width="50" height="25" src="/blog/index.php/Home/Public/Verify" 
				onclick="this.src=this.src+'?'+Math.random()" /> <br/>       
	</form>
</div>
<div id="loading">
	登录中...
</div>
<div id="success">
	登录成功...
</div>
<div id="default">
	登录失败...
</div>
<div id="quit">
	成功退出...
</div>
<div id="default-quit">
	退出失败...
</div>

	
	<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" />
	<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
	
	<div id="mainbody">
		<form action="/blog/index.php/Home/NewMoments/addmoments" method="POST" name="mymoment" enctype="multipart/form-data" >
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
			<div class="left">
				<div class="content-text">
					<textarea name="contents" ></textarea>
				</div>
				
				<div class="picture">
					<div class="pic-box">
						<input type="file" name="pic[]" />
					</div>
					<div class="pic-box">
						<input type="file" name="pic[]" />
					</div>
					<div class="pic-box">
						<input type="file" name="pic[]" />
					</div>
					<div class="pic-box">
						<input type="file" name="pic[]" />
					</div>
					<div class="pic-box">
						<input type="file" name="pic[]" />
					</div>
					<div class="pic-box">
						<input type="file" name="pic[]" />
					</div>
				</div>
			</div>
			
			<div class="right">
				<div class="icon-face">
					<span class="emoji">😚</span>
				</div>
				
				<div class="buttons">
					<button type="button" class="send">发送</button>
					<button type="button" class="reset">重置</button>
				</div>
				
			</div>
		</form>
	</div>
	
	<div id="mmt-send">
		发送中...
	</div>
	


</body>
</html>