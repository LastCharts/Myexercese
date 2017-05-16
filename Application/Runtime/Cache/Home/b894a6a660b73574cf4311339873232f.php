<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息通知</title>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Message/message.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/leftnav.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Message/message.js" ></script>
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

	
	<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" />
	<input type="hidden" name="userid" value="<?php echo $_SESSION['id'] ?>" />
	
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
		
		<div id="tabs">
			
			<ul>
				<li><a href="#Addmessage">新的朋友</a></li>
				<label class="remindlabel labelsize"></label>
				<li><a href="#Result">申请结果</a></li>
				<label class="remindlabel2 labelsize"></label>
				<li><a href="#LoveMess">关注消息</a></li>
				<label class="remindlabel3 labelsize"></label>
			</ul>
		
			<div id="Addmessage">
				<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "暂时没有新的消息哦(￣︶￣)" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="Messbody">
						<input type="hidden" name="send_id" value="<?php echo ($vo['send_id']); ?>" />
						<div class="head">
							<img src="<?php echo ($vo['pic']); ?>" />
						</div>
						<div class="infobody">
							<span><?php echo ($vo['username']); ?></span>
							<p>对方请求添加你为好友...</p>
						</div>
						<div class="button">
							<button class="Receive">接受</button>
							<button class="Refuse">拒绝</button>
						</div>
					</div><?php endforeach; endif; else: echo "暂时没有新的消息哦(￣︶￣)" ;endif; ?>	
			</div>
			
			<div id="Result">
				<?php if(is_array($result1)): $i = 0; $__LIST__ = $result1;if( count($__LIST__)==0 ) : echo "暂时没有新的消息哦(￣︶￣)" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="RefuseMess">
						<input type="hidden" name="receive_id" value="<?php echo ($vo['receive_id']); ?>" />
						<input type="hidden" name="state" value="<?php echo ($vo['state']); ?>" />
						<div class="head2">
							<img src="<?php echo ($vo['pic']); ?>" />
						</div>
						<div class="infobody2">
							<span><?php echo ($vo['username']); ?></span>
							<?php if( $vo['state'] == 2): ?><p>对方拒绝了你的好友请求...</p>
							<?php else: ?>
								<p>对方添加你为好友啦...</p><?php endif; ?>
						</div>
						<div class="button2">
							<button class="Iknow">我知道了</button>
						</div>
					</div><?php endforeach; endif; else: echo "暂时没有新的消息哦(￣︶￣)" ;endif; ?>
			</div>
			
			<div id="LoveMess">
				<?php if(is_array($result2)): $i = 0; $__LIST__ = $result2;if( count($__LIST__)==0 ) : echo "关注的博主还没有新更新哦(￣︶￣)" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><div class="upload">
						<input type="hidden" name="Lid" value="<?php echo ($ro['lid']); ?>" />
						<div class="head3">
							<img src="<?php echo ($vo['pic']); ?>" />
						</div>
						<div class="infobody3">
							<span><?php echo ($ro['username']); ?></span>
							<p>更新了文章：<?php echo ($ro['title']); ?></p>
						</div>
						<div class="button3">
							<button class="Tosee">去他博客</button>
						</div>
					</div><?php endforeach; endif; else: echo "关注的博主还没有新更新哦(￣︶￣)" ;endif; ?>
			</div>
		
		</div>
		
		<div id="handle">
			处理中...
		</div>

		<div id="confirm">
			确定拒绝好友申请吗？
		</div>
		
	</div>
</body>
</html>