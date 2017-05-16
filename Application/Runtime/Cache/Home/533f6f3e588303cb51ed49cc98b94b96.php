<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>朋友圈</title>

<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Page/page.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Moments/moments.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/jquery.sinaEmotion.css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/jquery.sinaEmotion.js"></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Moments/moments.js"></script>
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
	<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
	
	
	<div id="header">
		<img id="bg" src="/blog/Public/Image/bg.jpg" />
		<p id="Poname"><?php echo ($result['username']); ?></p>
		<img id="head-face" src="<?php echo ($result['pic']); ?>" />
	</div>
	
	<div id="mainbody">
		<div id="momentslist">
			<ul>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><li>
						<div class="pic">
							<img src="<?php echo ($ro['popic']); ?>" />
						</div>
						<div class="cmtbody">
							<div class="po-cnt">
								<p><span class="friendname"><?php echo ($ro['poname']); ?></span></p>
								<div class="content">
									<p style="padding-left:10px;"><?php echo htmlspecialchars_decode($ro['content']); ?></p>
									<?php if($ro['picture'][0] == '0' || $ro['picture'][0] == ''): else: ?>
										<?php if(is_array($ro['picture'])): $i = 0; $__LIST__ = $ro['picture'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pi): $mod = ($i % 2 );++$i;?><p class="imgbox">
												<img class="listimg" src="<?php echo ($pi); ?>" />
											</p><?php endforeach; endif; else: echo "" ;endif; endif; ?>
								</div>
								<p class="time"><?php echo ($ro['time']); ?><p/>
								<img class="c-icon" src="/blog/Public/Image/c.png" />
								<div class="chose">
									<div class="D1">
										<img src="/blog/Public/Image/good.png" /><span>赞</span>
									</div>
									<div class="D2">
										<img src="/blog/Public/Image/comments.png" /><span>评论</span>
									</div>
								</div>
								<input type="hidden" name="mmtsid" value="<?php echo ($ro['id']); ?>" />
							</div>
							<div class="r"></div>
							<div class="comment">
								<div class="like">
									<?php if(empty($ro['Loverlist'])): ?><input type="hidden" name="is" value="0" />
										<img style="display:none;" src="/blog/Public/Image/l.png">
									<?php else: ?>							
										<input type="hidden" name="is" value="1" />
										<img src="/blog/Public/Image/l.png">
										<?php if(is_array($ro['Loverlist'])): $k = 0; $__LIST__ = $ro['Loverlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k == '1' ): echo ($vo['lover']); ?>
											<?php else: ?>
												,<?php echo ($vo['lover']); endif; endforeach; endif; else: echo "" ;endif; endif; ?>
								</div>
								<div class="cmtlist">
									<?php if(is_array($ro['commentlist'])): $i = 0; $__LIST__ = $ro['commentlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xo): $mod = ($i % 2 );++$i; if($xo['is_reply'] == '1' ): ?><div>
												<span class="cmt-user" style="float:left;margin-top:0px;"><?php echo ($xo['from_name']); ?></span>
														<span style="float:left;margin-top:0px;color:black;">
															&nbsp回复&nbsp
														</span>
														<span style="float:left;margin-top:0px;">
															<?php echo ($xo['reply_name']); ?>
														</span>
														<span style="float:left;margin-top:0px;color:black;">
															：
														</span>
												<p><?php echo ($xo['comments']); ?></p>
											</div>
										<?php else: ?>
											<div>
												<span class="cmt-user" style="float:left;margin-top:0px;"><?php echo ($xo['from_name']); ?></span>
												<span style="float:left;margin-top:0px;color:black;">
													：
												</span>
												<p><?php echo ($xo['comments']); ?></p>
											</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
									<!-- 
									<div class="cmtbox">
										<input type="hidden" name="is_reply" value="0" />
										<textarea name="comment" class="comment"  placeholder="限制60字..." contenteditable="true" maxlength="60"></textarea>
										<div class="toolsbox">
											<span class="emoji">😚</span>
											<input type="button" name="button" class="cmt-btn" value="评论" />
											<p style="display:none;"></p>
										</div>
									</div>
									-->
								</div>
							</div>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>	
			</ul>
		</div>
		
		<div id="command">
			请输入内容...
		</div>
		<div id="sending">
			发表中...
		</div>
		<div id="success-send">
			发表成功！
		</div>
		
		<div class="pagination"><?php echo ($page); ?></div>
	</div>
	
	<div id="New">
		<img src="/blog/Public/Image/New.png" title="发表朋友圈" />
	<div>
	


</body>
</html>