<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Userinfo/userinfo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/jquery.Jcrop.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/leftnav.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Userinfo/userinfo.js"></script>
</head>
<body>
	
	<header>
	<nav id="nav">
		<ul>
		  <li><a href="/blog/index.php/Home/Index/index" target="_blank" title="我的首页">我的首页</a></li>
		  <li><a href="/blog/index.php/Home/Userinfo/userinfo" target="_blank" title="个人中心">个人中心</a></li>
		  <li><a href="/blog/index.php/Home/Friend/friend" target="_blank" title="好友列表">好友列表</a></li>
		  <li><a href="/blog/index.php/Home/Favorite/favorite" target="_blank" title="关注列表">关注列表</a></li>
		  <li><a href="/blog/index.php/Home/Myarticle/myarticle" target="_blank" title="关注列表">发表文章</a></li>
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

	
	<div id="mainbody">
		<aside>
	<div id="choose">
		<ol>
			<li><a href="/blog/index.php/Home/Userinfo/userinfo"><span class="first">1.个人信息</span></a></li>
			<li><a href="/blog/index.php/Home/Friend/friend"><span class="second">2.好友列表</span></a></li>
			<li><a href="/blog/index.php/Home/Mycomment/mycomment"><span class="three">3.我的评论</span></a></li>
			<li><a href="/blog/index.php/Home/Myarticle/myarticle"><span class="four">4.我的文章</span></a></li>
			<li><a href="/blog/index.php/Home/Favorite/favorite"><span class="five">5.关注列表</span></a></li>
			<li><a href="/blog/index.php/Home/Message/message"><span class="six">6.信息通知</span></a></li>
			<li><a href="/blog/index.php/Home/Repassword/repassword"><span class="seven">7.修改密码</span></a></li>
			<li><span class="quit" >8.退出登录</span></li>
			<label class="navlabel labelsize"></label>
		</ol>
	</div>
</aside>
		
		<div id="show">
			<div id="message">
				<ul>
					<li><a href="#userinfo">个人资料</a></li>
					<li><a href="#usersign">个人签名</a></li>
					<li><a href="#Pic">修改头像</a></li>
				</ul>
				
				<div id="userinfo">
					<form action="/blog/index.php/Home/Userinfo/modifyinfo" method="POST" name="modifyinfo" />
						<div class="poname">
							<img src="<?php echo ($list['pic']); ?>" />
							<label class="lablesize lablepic"></label>
							<span><?php echo ($list['username']); ?></span>
						</div>
						<div class="age">							
							<label for="age" class="lablesize agepic" ></label>
							<input type="text" name="age" placeholder="年龄" value="<?php echo ($list['age']); ?>" tabindex="1"  onFocus="this.value=''" title="请填写您的年龄"/>
						</div>
						<div class="sex">
							<img style="width:23px;height:23px;position:absolute;top:220px;left:31px;" src="/blog/Public/Image/sex.png" />
							<span>性别</span>
							<?php if($list['sex'] == 1): ?><label for="man">
									<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/man.png" />
									男士
								</label>
								<input type="radio" name="sex" value="1" id="man" checked="checked" tabindex="2" />
								<label for="women">
									<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/women.png" />
									女士
								</label>
								<input type="radio" name="sex" value="0" tabindex="3" id="women"  />
							<?php else: ?>
								<label for="man">
									<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/man.png" />
									男士
								</label>
								<input type="radio" name="sex" value="1" id="man"  tabindex="2" />
								<label for="women">
									<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/women.png" />
									女士
								</label>
								<input type="radio" name="sex" value="0" id="women" checked="checked" tabindex="3"  /><?php endif; ?>
						</div>
						<div class="birthday">
							<label for="birthday" class="lablesize birthdaypic" ></label>
							<input type="text" name="birthday" placeholder="生日" title="请选择您的生日" value="<?php echo ($list['birthday']); ?>" tabindex="4" />
						</div>
						<div class="mail">
							<label for="mail" class="lablesize mailpic" ></label>
							<input type="text" name="mail" placeholder="邮箱" title="请填写您的邮箱" value="<?php echo ($list['mail']); ?>" tabindex="5" />
						</div>
						<div class="phonenum">
							<label for="phonenum" class="lablesize phonepic" ></label>
							<input type="text" name="phonenum" placeholder="电话号码" title="请填写您的电话号码" value="<?php echo ($list['phonenum']); ?>" tabindex="6" />
						</div>
						<div class="btn-operation">
							<button type="button" tabindex="7" class="btn btn-modify">修改</button>
							<button type="button" tabindex="8" class="btn btn-cancle">取消</button>
						</div>
					</form>
				</div>
				
				
				<div id="usersign">
					<form action="/blog/index.php/Home/Userinfo/modifysign" method="POST" name="modifysign" />
						<div class="desclabel">
							<label for="desc" class="Lsize descpic" ></label>
							<span>个人描述</span>
						</div>
						<div class="userdesc">
							<textarea name="desc" placeholder="个人描述" title="介绍出真实的你(＾－＾)" maxlength="60" tabindex="1"><?php echo ($list['desc']); ?></textarea>
						</div>
						
						<div class="signlabel">
							<label for="sign" class="Lsize signpic" ></label>
							<span>个人签名</span>
						</div>
						<div class="sign">
							<textarea name="sign" placeholder="个人签名" title="写下你喜欢的话语(＾－＾)" maxlength="100" tabindex="2"><?php echo ($list['sign']); ?></textarea>
						</div>
						<div class="btn-operation">
							<button type="button" tabindex="3" class="btn btn-signmodify">修改</button>
							<button type="button" tabindex="4" class="btn btn-signcancle">取消</button>
						</div>
					</form>
				</div>
				
				
				<div id="Pic">
					<form action="/blog/index.php/Home/Userinfo/upload" method="POST" class="myform"  enctype="multipart/form-data">
						<div class="now-Pic">
							<label class="now-Pic-label"></label>
							<span><?php echo ($list['username']); ?></span>
							<img src="<?php echo ($list['pic']); ?>" />
						</div>	
						<div class="upload">
							<span>更改我的头像</span>
							<input type="file" name="pic" class="hidden" />
						</div>
						<input type="hidden" id="rx" name="rx" />
						<input type="hidden" id="ry" name="ry" />
						<input type="hidden" id="rx1" name="rx1" />
						<input type="hidden" id="ry1" name="ry1" />
						<div class="Pre-box">
							<span>预览</span>
							<img src=""  id="pre-pic" />
							<button type="button" class="submit" name="button">更新头像</button>
						</div>	
					</form>
				</div>
	
			</div>
			
		</div>
	</div>
	


</body>
</html>