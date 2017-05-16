<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>好友列表</title>
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/Friend/friend.css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/Page/page.css" />
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/modernizr.js"></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/leftnav.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Friend/friend.js"></script>
<script type="text/javascript" src="/blog/Public/Js/Friend/chat.js"></script>

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

	
	<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
	<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" />
	
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
		<img src="<?php echo ($result['pic']); ?>" />
		
		<div id="frinedlist">
			<div class="friend">			
					<h3>全部好友</h3>
					<div class="allfriend">
						<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "暂无好友(￣︶￣)" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" name="popic" value="<?php echo ($vo['pic']); ?>"  />
							<div class="member">
								<div class="head-pic">
									<img src="<?php echo ($vo['friendpic']); ?>" />
								</div>
								<div class="info">
									<span class="user" name="<?php echo ($vo['friendname']); ?>"><?php echo ($vo['friendname']); ?></span>
									<p><a href="/blog/index.php/Home/Index/index?id=<?php echo ($vo['fid']); ?>" target="_blank" >访问博客</a><span class="Dltfriend" >[删除]</span></p>							
								</div>
								<input type="hidden" name="fid" value="<?php echo ($vo['fid']); ?>" />
							</div><?php endforeach; endif; else: echo "暂无好友(￣︶￣)" ;endif; ?>
					</div>
					
					
					<h3>在线</h3>
					<div class="online">
						<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['f_online'] == 1 ): ?><div class="member">
									<div class="head-pic">
										<img src="<?php echo ($vo[friendpic]); ?>" />
									</div>
									<div class="info">
										<span class="user" name="<?php echo ($vo['friendname']); ?>"><?php echo ($vo['friendname']); ?></span>
										<p><a href="/blog/index.php/Home/Index/index?id=<?php echo ($vo['fid']); ?>" target="_blank" >访问博客</a><span class="Dltfriend" >[删除]</span></p>							
									</div>
									<input type="hidden" name="fid" value="<?php echo ($vo['fid']); ?>" />
								</div>
							<?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
					
					<h3>离线</h3>
					<div class="outline">
						<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['f_online'] == 0 ): ?><div class="member">
									<div class="head-pic">
										<img src="<?php echo ($vo['friendpic']); ?>" />
									</div>
									<div class="info">
										<span class="user" name="<?php echo ($vo['friendname']); ?>"><?php echo ($vo['friendname']); ?></span>
										<p><a href="/blog/index.php/Home/Index/index?id=<?php echo ($vo['fid']); ?>" target="_blank"  >访问博客</a><span class="Dltfriend" >[删除]</span></p>							
									</div>
									<input type="hidden" name="fid" value="<?php echo ($vo['fid']); ?>" />
								</div>
							<?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
			</div>
			
			<div class="chatlist">
				<div class="mess">
					<p></p>
				</div>
				
				<div id="chat-content">
						

				</div>
			
			
				<div id="chat-box">
						<div class="Inputbox">
							<textarea name="content" class="comment-text" placeholder="请输入..."></textarea>
						</div>
						<input type="hidden" name="sender" value="<?php echo $_SESSION['username'] ?>" />	<!-- 代表当前用户的username -->
						<input type="hidden" name="receiver" value="" /> 	<!-- 代表与之聊天的用户的username -->
						<div class="toolsbox">
							<div class="operator-box-btn"><span class="face-icon" >😚</span></div>
							<div class="submit-btn"><input type="button" name="button" value="发送" /></div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	<div>
		
	</div>
	
</body>
<!--
<div class="left-content">
						<div class="Lsender-head">
							<img src="/blog/Public/Image/Pic/head-face.jpg" />
							<p>admin</p>
						</div>
						<div class="Lcontent">
							<p class="cmt-box" style="padding-left:10px;letter-spacing:1px;">我们结婚吧我们结婚吧我们结婚吧我们结婚吧我们结婚吧</p>
						</div>
					</div>
					
					<div class="right-content">
						<div class="Rsender-head">
							<img src="" />
							<p>Charlotte</p>
						</div>
						<div class="Rcontent">
							<p class="cmt-box" style="padding-left:10px;letter-spacing:1px;">我们结婚吧我们结婚吧我们结婚吧我们结婚吧我们结婚吧</p>
						</div>
					</div>
-->


</html>