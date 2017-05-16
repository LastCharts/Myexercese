<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的文章</title>
<link href="/blog/Public/Css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Page/page.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/Css/Myarticle/myarticle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/blog/Public/Js/jquery.js" ></script> 
<script type="text/javascript" src="/blog/Public/Js/jquery-ui.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/head.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/common.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Common/leftnav.js" ></script>
<script type="text/javascript" src="/blog/Public/Js/Myarticle/myarticle.js" ></script>
<script type="text/javascript" src="/blog/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/blog/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/blog/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
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
				<li><a href="#myarticle">我的文章</a></li>
				<li><a href="#newarticle">发表新文章</a></li>
				<li class="change" style=""><a href="#changeart">修改文章</a></li>
			</ul>
		
			<div id="myarticle">
				<table class="mytable" >
					<tr>
						<th width=8%>编号</th>
						<th width=35%>文章标题</th>
						<th width=10%>作者</th>
						<th width=12%>类型</th>
						<th width=15%>发布时间</th>
						<th width=20%>操作</th>
					</tr>
					<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "你还没有发表过文章哦(￣︶￣)" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><input type="hidden" name="article_id" value="<?php echo ($ro['id']); ?>" />
						<tr>
							<td><?php echo ($i); ?>.</td>
							<td><a href="/blog/index.php/Home/Article/article?id=<?php echo ($ro['id']); ?>" class="Goto"><?php echo ($ro['title']); ?></a></td>
							<td><?php echo ($ro['username']); ?></td>
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
								<button class="modify">修改</button>
								<button class="delete">删除</button>
							</td>
						</tr><?php endforeach; endif; else: echo "你还没有发表过文章哦(￣︶￣)" ;endif; ?>
				</table>
				
				<div class="pagination"><?php echo ($page); ?></div>
			</div>
			
			<div id="newarticle">
				<form action="/blog/index.php/Home/Myarticle/newarticle" method="post" class="myform"  enctype="multipart/form-data">
					<div class="Arttitle">
						<label>文章标题：</label><input type="text" name="title" tabindex="1"/>
					</div>
					<div class="Artdsesc">	
						<label>文章描述：</label><textarea name="desc" tabindex="2"></textarea>
					</div>
					<div class="kind">
						<span>文章类型：</span>
						<label for="emotion">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/emotion.png" />
							情感人生
						</label>
						<input type="radio" name="kind" value="1" id="emotion" checked="checked" tabindex="3" />
						<label for="philosophy">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/philosophy.png" />
							励志哲理
						</label>
						<input type="radio" name="kind" value="2" tabindex="4" id="philosophy"  />
						<label for="classic">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/classic.png" />
							经典美文
						</label>
						<input type="radio" name="kind" value="3" tabindex="5" id="classic"  />
						<label for="sad">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/sad.png" />
							伤感日记
						</label>
						<input type="radio" name="kind" value="4" tabindex="6" id="sad"  />
					</div>	
					<div class="Artpic">
						<label>上传图片：</label>
						<div class="hidden">
							<input type="file" name="upload" />
						</div>
						<label class="Pre-see">预览：</label>
						<div class="Pre-box">
							<img src="" name="Pre-pic" />
						</div>
					</div>
					<div class="Artcontent">
						<span>文章内容：</span><textarea name="content" id="content" tabindex="7"></textarea>
					</div>
					<div class="button">
						<button  type="button" class="ensure" tabindex="8">发表</button>
						<button  type="button" class="reset" tabindex="9">重置</button>
					</div>
				</form>	
			</div>
			
			
			<div id="changeart">
				<form action="/blog/index.php/Home/Myarticle/modify" method="post" class="upform"  enctype="multipart/form-data">
					<input type="hidden" name="modifyid" value="" />
					<div class="Arttitle">
						<label>文章标题：</label><input type="text" name="re-title" value="" tabindex="1" />
					</div>
					<div class="Artdsesc">	
						<label>文章描述：</label><textarea name="re-desc" tabindex="2" ></textarea>
					</div>
					<div class="kind">
						<span>文章类型：</span>
						<label for="r-emotion">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/emotion.png" />
							情感人生
						</label>
						<input type="radio" name="re-kind" value="1" id="r-emotion" checked="checked" tabindex="3" />
						<label for="r-philosophy">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/philosophy.png" />
							励志哲理
						</label>
						<input type="radio" name="re-kind" value="2" tabindex="4" id="r-philosophy"  />
						<label for="r-classic">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/classic.png" />
							经典美文
						</label>
						<input type="radio" name="re-kind" value="3" tabindex="5" id="r-classic"  />
						<label for="r-sad">
							<img style="width:20px;height:20px;position:absolute;top:5px;left:5px;" src="/blog/Public/Image/sad.png" />
							伤感日记
						</label>
						<input type="radio" name="re-kind" value="4" tabindex="6" id="r-sad"  />
					</div>
					<div class="Artpic">
						<label>上传图片：</label>
						<div class="hidden">
							<input type="file" name="re-upload" />
						</div>
						<label class="Pre-see">预览：</label>
						<div class="Pre-box">
							<img src="" name="re-pic" />
						</div>
					</div>
					<div class="Artcontent">
						<label>文章内容：</label><textarea name="content2" id="content2" ></textarea>
					</div>
					<div class="button">
						<button  type="button" class="update" tabindex="7">修改</button>
						<button  type="button" class="cancle" tabindex="8">取消</button>
					</div>
				</form>	
			</div>

		</div>
		
		<div id="waiting">
			加载中
		</div>
		
	</div>
	
	<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:400,});
    UE.getEditor('content2',{initialFrameWidth:900,initialFrameHeight:400,});
    


	</script>
</body>
</html>