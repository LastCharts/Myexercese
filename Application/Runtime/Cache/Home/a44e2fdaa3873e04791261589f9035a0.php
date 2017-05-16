<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的评论</title>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Page/page.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Mycomment/mycomment.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/leftnav.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Mycomment/mycomment.js" ></script>
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
			
		<div id="list">
			<ul>
				<li><a href="#mycomment">我的评论</a></li>
				<li><a href="#myreply">我的回复</a></li>
			</ul>
		
			<div id="mycomment">
				<div class="commentlist">
					<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "你还没有发表过评论哦(￣︶￣)" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="info-show">
							<input type="hidden" name="comment-id" value="<?php echo ($vo['id']); ?>" />
							<input type="hidden" name="article_id" value="<?php echo ($vo['article_id']); ?>" />
							<div id="comment-author">
								<img src="<?php echo ($vo['pic']); ?>" />
								<p class="username"><?php echo ($vo['username']); ?></p>
							</div>
							<div id="comment-body">
								<span>内容：</span>
								<p class="comment-content"><?php echo ($vo['cmt_content']); ?></p>
								<div class="comment-footer">
									<span class="Oh">#1　</span>
									<span class="time">发表时间：<?php echo ($vo['time']); ?></span>
									<button class="Go cmt-go">去源文章</button>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "你还没有发表过评论哦(￣︶￣)" ;endif; ?>
				</div>	
				<div class="pagination"><?php echo ($page); ?></div>
			</div>
			
			<div id="myreply">
				<div class="commentlist">
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "你还没有回复过别人呢(￣︶￣)" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><div id="info-show">
							<input type="hidden" name="comment-id" value="<?php echo ($vo['id']); ?>" />
							<input type="hidden" name="article_id" value="<?php echo ($vo['article_id']); ?>" />
							<div id="comment-author">
								<img src="<?php echo ($ro['reply_pic']); ?>" />
								<p class="username"><?php echo ($ro['replyname']); ?></p>
							</div>
							<div id="comment-body">
								<span>内容：</span>
								<p class="comment-content">
									回复<img class='be_replypic' src="<?php echo ($ro['be_replypic']); ?>" /><?php echo ($ro['be_replyname']); ?>
									: <?php echo ($ro['content']); ?>
								</p>
								<div class="comment-footer">
									<span class="Oh">#1　</span>
									<span class="time">发表时间：<?php echo ($ro['time']); ?></span>
									<input type="hidden" value="<?php echo ($ro['comment_id']); ?>" />
									<button class="Go reply_go">去源文章</button>
								</div>
							</div>
						</div><?php endforeach; endif; else: echo "你还没有回复过别人呢(￣︶￣)" ;endif; ?>
				</div>	
				<div class="pagination"><?php echo ($pagelist); ?></div>
			</div>
		</div>

		<div id="going">
			跳转中...
		</div>
		<div id="default-go">
			跳转失败(；′⌒`)
		</div>
	</div>
		
</body>
</html>