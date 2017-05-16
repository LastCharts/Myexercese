<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜寻结果</title>
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/jquery-validate.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Search/search.js"></script>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Search/search.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Page/page.css" rel="stylesheet" type="text/css" />


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
		<table class="searched" >
			<tr>
				<th width=10%>编号</th>
				<th width=45%>文章标题</th>
				<th width=10%>作者</th>
				<th width=10%>类型</th>
				<th width=15%>发布时间</th>
				<th width=10%>操作</th>
			</tr>
			<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><input type="hidden" name="article_id" value="<?php echo ($ro['id']); ?>" />
				<tr>
					<td><?php echo ($i); ?>.</td>
					<td><a href="/blog/index.php/Home/Article/article?id=<?php echo ($ro['id']); ?>" class="Goto"><?php echo ($ro['title']); ?></a></td>
					<td><a href="/blog/index.php/Home/Index/index?id=<?php echo ($ro['userid']); ?>" class="Goto"><?php echo ($ro['username']); ?></a></td>
					<td>
						<?php if($ro['kind'] == 1): ?>情感人生							
						<?php elseif($ro['kind'] == 2): ?>
							励志哲理
						<?php elseif($ro['kind'] == 3): ?>
							经典美文
						<?php else: ?>
							伤感日记<?php endif; ?>
					</td>
					<td><?php echo ($ro['release_time']); ?></td>
					<td>
						<a href="/blog/index.php/Home/Article/article?id=<?php echo ($ro['id']); ?>"><button class="read">查看</button></a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		
		<div class="pagination"><?php echo ($page); ?></div>
	</div>
	
</body>
</html>