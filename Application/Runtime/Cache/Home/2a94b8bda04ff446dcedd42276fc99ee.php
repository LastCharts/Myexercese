<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/jquery-validate.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Index/index.js"></script>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Index/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/blog/Public/Css/Page/page.css" />


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
	
	<div id="mainbody">
		<div id="part1">
			<div id="Pic">
				<ul class="shoufengqin">
					<li><a href="#" ><img src="/blog/Public/Image/art.JPG" /></a></li>
					<li><img src="/blog/Public/Image/bg.JPG" /></li>
					<li><img src="/blog/Public/Image/text1.JPG" /></li>
					<li><img src="/blog/Public/Image/art.JPG" /></li>
				</ul>	
			</div>
			<div id=info>
				<h1>关于博主</h1>
				<p>Id：<?php echo ($po['username']); ?></P>
				<input type="hidden" name="blogerid" value="<?php echo ($po['id']); ?>" />
				<p>文章类别：LOL</p>
				<p>邮箱：<?php echo ($po['mail']); ?></p>
				<p>电话：<?php echo ($po['phonenum']); ?></p>
				<p>签名：<?php echo ($po['desc']); ?></p>
				<ul class="linkmore">
					<li><a href="javascript:void(0)" class="friend" title="添加好友"></a></li>
					<li><a href="javascript:void(0)" class="talk" title="私信"></a></li>
					<li><a href="javascript:void(0)" class="heart" title="关注"></a></li>
				</ul>
			</div>
		</div>
		<div id="part2">
			<div id="bloglist">
				<ul class="blogContent">
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "该博主还没有发表过任何文章哦(￣︶￣)" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<div class="blogone">
								<div class="ti"></div>
								<div class="ci"></div>
								<h2 class="title"><a href="/blog/index.php/Home/Article/article?id=<?php echo ($vo['id']); ?>" target="_blank"><?php echo ($vo['title']); ?></a></h2>
								<div class="Alt">
									<a href="/blog/index.php/Home/Article/article?id=<?php echo ($vo['id']); ?>">
										<?php if($vo['picture'] == ''): ?><img src="/blog/Public/Image/s1.JPG">
										<?php else: ?>
											<img src="<?php echo ($vo['picture']); ?>"><?php endif; ?>	
									</a>
									<p> <?php echo ($vo['desc']); ?></p>
								</div>
								<ul class="details">
									<li class="likes"><a href="#">10</a></li>
									<li class="comments"><a href="#">34</a></li>
									<li class="icon-time"><a href="#"><?php echo ($vo['release_time']); ?></a></li>
								</ul>
							</div>
						</li><?php endforeach; endif; else: echo "该博主还没有发表过任何文章哦(￣︶￣)" ;endif; ?>
				</ul>
				<div class="pagination"><?php echo ($page); ?></div>
			</div>
			<div class="right">
				<div class="tuijian">
					<h2>最新发表</h2>
					<ol>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><li><span><strong><?php echo ($key+1); ?>.</strong></span><a href="/blog/index.php/Home/Article/article?id=<?php echo ($art['id']); ?>" target="_blank"><?php echo ($art['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ol>
				</div>
				<div class="search">
					<form action="/blog/index.php/Home/Search/search" method="post" class="searchform">
						<input type="text" name="search" value="请输入要查询的文章标题" onFocus="this.value=''" maxlength="15" />
						<img src="/blog/Public/Image/search2.png" class="searchsubmit" />
					</form>
				</div>
				<div class="favorite">
					<h2>最热博主</h2>
					<img class="hot" src="/blog/Public/Image/hot.png" />
					<ol>
						<li>
							<div class="most-hot">
								<img class="no1" src="/blog/Public/Image/no1.png" />
								<div class="host-po-pic">
									<img src="/blog/Public/Image/head-face.jpg" />
								</div>
								<div class="mess">
									<p class="po-name"><a href="/blog/index.php/Home/Index/index?id=2" target="_blank">Charlotte</a></p>
									<p class="fan"> 粉丝：<span>100</span></p>
									<p class="desc"> 描述：<span>热爱运动的幻想家</span></p>
								</div>
							</div>
						</li>
						<li>
							<div class="most-hot">
								<img class="no2" src="/blog/Public/Image/no2.png" />
								<div class="host-po-pic">
									<img src="/blog/Public/Image/head-face.jpg" />
								</div>
								<div class="mess">
									<p class="po-name"><a href="/blog/index.php/Home/Index/index?id=2" target="_blank">admin</a></p>
									<p class="fan"> 粉丝：<span>100</span></p>
									<p class="desc"> 描述：<span>情感丰富的写手</span></p>
								</div>
							</div>
						</li>
						<li>
							<div class="most-hot">
								<img class="no3" src="/blog/Public/Image/no3.png" />
								<div class="host-po-pic">
									<img src="/blog/Public/Image/head-face.jpg" />
								</div>
								<div class="mess">
									<p class="po-name"><a href="/blog/index.php/Home/Index/index?id=2" target="_blank">Chalotte</a></p>
									<p class="fan"> 粉丝：<span>89</span></p>
									<p class="desc"> 描述：<span>热爱生活的散文家</span></p>
								</div>
							</div>
						</li>
					  
					</ol>
				</div>
				<div class="music">
					<dl>
						<dt class="art"><img src="/blog/Public/Image/artwork.png" alt="专辑"></dt>
						<dd class="songname"><span></span>半岛铁盒</dd>
						<dd class="singer"><span></span>歌手：周杰伦</dd>
						<dd class="bgm">
							<audio src="/blog/Public/Music/bgm.mp3" controls="controls"></audio>
						</dd>	
					</dl>	
				</div>
			</div>
		</div>
		
		
		
		
		<div id="f_success">
			关注成功...
		</div>
		<div id="requesting">
			发送请求中...
		</div>
		<div id="friendrequest">
			申请已发送...
		</div>
		
		
	</div>
	
	<div id="footer">
		<ul class="footermess">
			<a href="#">帮助中心</a><a href="#">空间客服</a><a href="#">投诉中心</a><a href="#">空间协议</a>
		</ul>
		<p class="footer1">Design by Charlotte</p>
		<p class="footer1">3113002438 黎相奕</p>
	<div>
	
	
</body>
</html>