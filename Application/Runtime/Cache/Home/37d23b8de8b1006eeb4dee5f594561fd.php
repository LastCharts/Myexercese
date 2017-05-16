<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章页面</title>
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/jquery.sinaEmotion.css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/Article/Article.css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/Page/page.css" />
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Article/jquery.sinaEmotion.js"></script>
<script type="text/javascript" src="/blog/Public/Js/Common/modernizr.js"></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Article/article.js"></script>

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
			<div class="head">
				<a href="/blog/index.php/Home/Index/index?id=<?php echo ($article['author_id']); ?>" target="_blank" >
					<img src="<?php echo ($article['pic']); ?>" />
					<span><?php echo ($article['username']); ?></span>
				</a>
			</div>
			<section class="userinfo">
				<h1>他的签名：</h1>
				<p><?php echo ($article['sign']); ?></p>
			</section>
			<div class="fan">
				<p class="num"> 粉丝：<span><?php echo ($num); ?></span></p>
				<p class="btns"><span class="favorite">关注</span><span class="friend">申请好友</span></p>
			</div>
			<div class="Recommend">
				<h2>博主最新文章</h2>
				<ol>
					<?php if(is_array($artlist)): $i = 0; $__LIST__ = $artlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wo): $mod = ($i % 2 );++$i;?><li><span><strong><?php echo ($key+1); ?>.</strong></span><a href="/blog/index.php/Home/Article/article?id=<?php echo ($wo['id']); ?>" ><?php echo ($wo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>	
				</ol>
			</div>
			<section class="taglist">
				<h2>全部类型</h2>
				<ul>
					<li><a href="/">青空</a></li>
					<li><a href="/">情感聊吧</a></li>
					<li><a href="/">study</a></li>
					<li><a href="/">青青唠叨</a></li>
				</ul>
			</section>
		</aside>


		<div class="BlogAlt">
			<article>
				<input type="hidden" name="article_id" value="<?php echo ($article['id']); ?>" />
				<input type="hidden" name="author_id" value="<?php echo ($article['author_id']); ?>" />
				<h2 class="title"><a href="/"><?php echo ($article['title']); ?></a></h2>
				    <ul class="text">
						<p class="textimg"><img src="<?php echo ($article['picture']); ?>"></p>
						<p><?php echo htmlspecialchars_decode($article['content']); ?></p>
					</ul>	
			</article>
		</div>
		
		<div id="comment">
			<div class="sign">
					<h2>评论区:</h2>
			</div>
			<div id="commentlist">
				<ul>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<div id="info-show">
								<div id="comment-author">
									<img src="<?php echo ($vo['popic']); ?>" />
								</div>
								<div id="comment-body">
									<input type="hidden" name="from_uid" value=<?php echo ($vo['from_uid']); ?> />
									<input type="hidden" name="comment_id" value=<?php echo ($vo['id']); ?> />
									<a href="/blog/index.php/Home/Index/index?id=<?php echo ($vo['from_uid']); ?>" target=_blank ><p class="username"><?php echo ($vo['reply_name']); ?></p></a>
									<p class="comment-content"><?php echo ($vo['content']); ?></p>
									<div class="comment-footer">
										<span>#1　</span>
										<span><?php echo ($vo['time']); ?>　</span>
										<span class="comment-response">回复</span>
									</div>
									<p style="display:none;"></p>
								</div>
								<input type="hidden" name="comment_type" value="comment" />
							</div>
							<?php if(is_array($vo['replylist'])): $i = 0; $__LIST__ = $vo['replylist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i; if($ro['level'] == 1): ?><div style="float:right;width:95%" id="info-show">
										<div id="comment-author">
											<img src="<?php echo ($ro['reply_pic']); ?>" />
										</div>
										<div id="comment-body">
											<input type="hidden" name="comment_id" value=<?php echo ($ro['comment_id']); ?> />
											<input type="hidden" name="from_uid" value=<?php echo ($ro['from_uid']); ?> />
											<a href="/blog/index.php/Home/Index/index?id=<?php echo ($ro['from_uid']); ?>" target=_blank ><p class="username"><?php echo ($ro['replyname']); ?></p></a>
											<p class="comment-content">回复@<?php echo ($ro['be_replyname']); ?>：<?php echo ($ro['content']); ?></p>
											<div class="comment-footer">
												<span>#1　</span>
												<span><?php echo ($ro['time']); ?>　</span>
												<span class="comment-response">回复</span>
											</div>
											<input type="hidden" name="reply_id" value=<?php echo ($ro['id']); ?> />
										</div>
									</div>
								<?php elseif($ro['level'] == 2): ?>
									<div style="float:right;width:90%" id="info-show">
										<div id="comment-author">
											<img src="<?php echo ($ro['reply_pic']); ?>" />
										</div>
										<div id="comment-body">
											<input type="hidden" name="comment_id" value=<?php echo ($ro['comment_id']); ?> />
											<input type="hidden" name="from_uid" value=<?php echo ($ro['from_uid']); ?> />
											<a href="/blog/index.php/Home/Index/index?id=<?php echo ($ro['from_uid']); ?>" target=_blank ><p class="username"><?php echo ($ro['replyname']); ?></p></a>
											<p class="comment-content">回复@<?php echo ($ro['be_replyname']); ?>：<?php echo ($ro['content']); ?></p>
											<div class="comment-footer">
												<span>#1　</span>
												<span><?php echo ($ro['time']); ?>　</span>
												<span class="comment-response">回复</span>
											</div>
											<input type="hidden" name="reply_id" value=<?php echo ($ro['id']); ?> />
										</div>
									</div>
								<?php elseif($ro['level'] == 3): ?>
									<div style="float:right;width:85%" id="info-show">
										<div id="comment-author">
											<img src="<?php echo ($ro['reply_pic']); ?>" />
										</div>
										<div id="comment-body">
											<input type="hidden" name="comment_id" value=<?php echo ($ro['comment_id']); ?> />
											<input type="hidden" name="from_uid" value=<?php echo ($ro['from_uid']); ?> />
											<a href="/blog/index.php/Home/Index/index?id=<?php echo ($ro['from_uid']); ?>" target=_blank ><p class="username"><?php echo ($ro['replyname']); ?></p></a>
											<p class="comment-content">回复@<?php echo ($ro['be_replyname']); ?>：<?php echo ($ro['content']); ?></p>
											<div class="comment-footer">
												<span>#1　</span>
												<span><?php echo ($ro['time']); ?>　</span>
												<span class="comment-response">回复</span>
											</div>
											<input type="hidden" name="reply_id" value=<?php echo ($ro['id']); ?> />
										</div>
									</div>	
								<?php else: ?>	
									<div style="float:right;width:80%" id="info-show">
										<div id="comment-author">
											<img src="<?php echo ($ro['reply_pic']); ?>" />
										</div>
										<div id="comment-body">
											<input type="hidden" name="comment_id" value=<?php echo ($ro['comment_id']); ?> />
											<input type="hidden" name="from_uid" value=<?php echo ($ro['from_uid']); ?> />
											<a href="/blog/index.php/Home/Index/index?id=<?php echo ($ro['from_uid']); ?>" target=_blank ><p class="username"><?php echo ($ro['replyname']); ?></p></a>
											<p class="comment-content">回复@<?php echo ($ro['be_replyname']); ?>：<?php echo ($ro['content']); ?></p>
											<div class="comment-footer">
												<span>#1　</span>
												<span><?php echo ($ro['time']); ?>　</span>
												<span class="comment-response">回复</span>
											</div>
											<input type="hidden" name="reply_id" value=<?php echo ($ro['id']); ?> />
										</div>
									</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>				
				</ul>
			</div>
			
			
			
			<div class="pagination"><?php echo ($page); ?></div>
			
			<div id="comment-box">
				<div class="sign">
					<h2>发表评论:</h2>
				</div>
				<div style="margin-left:30px;">	
					<div class="Inputbox">
						<textarea name="comment" class="comment-text" placeholder="请输入..."></textarea>
						<p style="display:none" name="exchange" class="exchange" ></p>
					</div>
					<input type="hidden" name="article_id" value="<?php echo ($article['id']); ?>" />	
					<div class="toolsbox">
						<div class="operator-box-btn"><span class="face-icon" >😚</span></div>
						<div class="submit-btn"><input type="button" name="button" value="提交评论" /></div>
					</div>
				</div>
			</div>
			<div id="c_command">
				请输入内容...
			</div>
			<div id="c_default">
				评论失败！...
			</div>
			<div id="c_success">
				评论成功！...
			</div>
			<div id="c_submit">
				提交中...
			</div>
			<div id="f_success">
				关注成功...
			</div>
			<div id="friendrequest">
				申请已发送...
			</div>
		</div>
		
	</div>

	<footer>
		<div class="author-head">
			<img src="/blog/Public/Image/photo.jpg" /> 
			<ul class="author-mesage">
				<p class="fname"><?php echo ($article['username']); ?></p>
				<p>性别：
					<?php if($article['sex'] == 1): ?>男
					<?php else: ?>
						女<?php endif; ?>
				</p>
				<p>年龄：<?php echo ($article['age']); ?></p>
				<p>个人描述：<?php echo ($article['userdesc']); ?></p>
			</ul>
		</div>
		<section class="visitor">
			<h2>最近评论</h2>
			<ul>
				<?php if(is_array($visitor)): $i = 0; $__LIST__ = $visitor;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><li><a href="/blog/index.php/Home/Index/index?id=<?php echo ($vi['uid']); ?>"><img src="<?php echo ($vi['pic']); ?>"></a></li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
			</ul>	
		</section>
		<div class="footmesage">
			<ul>
				<a href="#">帮助中心</a><a href="#">空间客服</a><a href="#">投诉中心</a><a href="#">空间协议</a>
			</ul>
			<p>Design by Charlotte</p>
			<p>3113002438 黎相奕</p>
		</div>
	</footer>

</body>



</html>