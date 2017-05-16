$(function(){
	
	$('#c_success').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#c_default').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论失败dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#c_submit').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#c_command').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('body').delegate(".submit-btn input[name='button']","click",function(){
		var $this = $(this);
		var from_uid = $("input:hidden[name='id']").val();
		var content = $('.comment-text').val()
		var newcomment;
		
		if(content==''){
			$('#c_command').dialog('open');
			setTimeout(function(){
				$('#c_command').dialog('close');
			},2000);
		}else{
			$('.exchange').html(content).parseEmotion();
			var newcontent = $('.exchange').html();
			if($("input:hidden[name='is_reply']").val()=='1'){		//是回复评论的话
				var article_id = $("input:hidden[name='article_id']").val();					//用于评论后刷新跳转用的id值		
				var comment_id = $this.parent().parent().parent().parent().parent().find("input:hidden[name='comment_id']").val();
				var to_uid = $this.parent().parent().parent().parent().parent().find("input:hidden[name='from_uid']").val();
				var count = $this.parent().parent().parent().parent().parent().parent().find("input:hidden[name='comment_type']").length;
				if(count>0){
					var reply_id = '0';
				}else{
					var reply_id = $this.parent().parent().parent().parent().prev().val();
				}
				$.ajax({
					type: "POST", 
					url: "/blog/index.php/Home/Article/addreply", 
					dataType: "json",
					data : {
						"comment_id" :comment_id,
						"from_uid" :from_uid,
						"to_uid" :to_uid,
						"content" :newcontent,
						"reply_id" :reply_id
					},
					beforeSend: function(){
					  $("#c_submit").dialog('open');
					}, 
					success: function(json){
						if(json.status==1){
							$('.comment-text').val("");
							$("#c_submit").dialog('close');
							$("#c_success").dialog('open');
							setTimeout(function(){
								$("#c_success").dialog('close');
								window.location.href = "/blog/index.php/Home/Article/article?id="+article_id;
							},2000);
						}else{
							$("#c_submit").dialog('close');
							$("#c_default").dialog('open');
							setTimeout(function(){
								$('.comment-text').val("");
								$('.exchange').html("");
								$("#c_default").dialog('close');
							},2000);
						}
					}
				});
			}else{
				var article_id = $("input:hidden[name='article_id']").val();	
				$.ajax({
					type: "POST", 
					url: "/blog/index.php/Home/Article/addcomment", 
					dataType: "json",
					data : {
						"article_id" :article_id,
						"content" :newcontent,
						"from_uid" :from_uid
					},
					beforeSend: function(){
					  $("#c_submit").dialog('open');
					}, 
					success: function(json){
						if(json.status==1){
							$("#c_submit").dialog('close');
							$("#c_success").dialog('open');
							setTimeout(function(){
								$("#c_success").dialog('close');
								window.location.href = "/blog/index.php/Home/Article/article?id="+article_id;
							},2000);
						}else{
							$("#c_submit").dialog('close');
							$("#c_default").dialog('open');
							setTimeout(function(){
								$('.comment-text').val("");
								$('.exchange').html("");
								$("#c_default").dialog('close');
							},2000);
						}
					}
				});
			}
		}
		
	});
	
	$('body').delegate('.comment-response','click',function(){
		var num = $(this).parent().parent().parent().find('.reply-box').length;
		if(num>0){
			$(this).parent().next().next('.reply-box').remove();
			$('#comment-box').fadeIn();
		}else{
			$('#comment-box').fadeOut();
			$(this).parent().next().after('<div class="reply-box"><div id="comment-box"><div class="Inputbox"><textarea name="comment" class="comment-text" placeholder="请输入..."></textarea><p style="display:none" name="exchange" ></p></div><input type="hidden" name="is_reply" value="1" /><div class="toolsbox"><div class="operator-box-btn"><span class="face-icon" >😚</span></div><div class="submit-btn"><input type="button" name="button" value="提交评论" /></div></div></div></div>');
		}
	});
	
	
	$('body').delegate('.face-icon','click',function(){
		if(! $('#sinaEmotion').is(':visible')){
                    $(this).sinaEmotion();
                    event.stopPropagation();
                }
		
	});
	
	
	$('#f_success').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('body').delegate('.favorite','click',function(){				//关注用户
		var author_id = $('input:hidden[name="author_id"]').val();
		var uid = $("input:hidden[name='id']").val();
		if(uid!='' || uid!=0){
			if(author_id==uid){
				$("#c_submit").dialog('open');
				setTimeout(function(){
					$("#c_submit").dialog('close');
					alert('别自恋关注自己啦');
				},2000);
			}else{
				$.ajax({
					type : 'POST',
					url : '/blog/index.php/Home/Favorite/addfavorite',
					dataType : 'Json',
					data : {
						'uid' : uid,
						'Lid' : author_id
					},
					beforeSend: function(){
						  $("#c_submit").dialog('open');
					},
					success :function(json){
						if(json.status==1){
							$("#c_submit").dialog('close');
							$("#f_success").dialog('open');
							setTimeout(function(){
								$("#f_success").dialog('close');
							},2000);
						}else if(json.status==2){
							$("#c_submit").dialog('close');
							alert('你已经是Ta的小粉丝了哦！<(￣︶￣)>');
						}else{
							$("#c_submit").dialog('close');
							alert('发生错误，请稍后再操作！(；′⌒`)');
						}
					}
				});
			}
		}else{
			alert('请先登录哦(╯3╰)');
			window.location.href="/blog/index.php/Home/Login/login";
		}		
	});
	
	$('#friendrequest').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('body').delegate('.friend','click',function(){					//发送好友申请
		var receive_id = $('input:hidden[name="author_id"]').val();
		var send_id = $("input:hidden[name='id']").val();
		if(send_id!='' || send_id!=0){
			if(receive_id==send_id){
				$("#c_submit").dialog('open');
				setTimeout(function(){
					$("#c_submit").dialog('close');
					alert('已经孤独到要添加自己为好友了吗？/(ㄒoㄒ)/');
				},2000);
			}else{
				$.ajax({
					type : 'POST',
					url : '/blog/index.php/Home/Friend/sendaddrequest',
					dataType : 'Json',
					data : {
						'send_id' : send_id,
						'receive_id' : receive_id
					},
					beforeSend: function(){
						  $("#c_submit").dialog('open');
					},
					success :function(json){
						if(json.status==1){
							$("#c_submit").dialog('close');
							$("#friendrequest").dialog('open');
							setTimeout(function(){
								$("#friendrequest").dialog('close');
							},2000);
						}else if(json.status==2){
							$("#c_submit").dialog('close');
							alert('他已经是你好友了哦！<(￣︶￣)>');
						}else if(json.status==3){
							$("#c_submit").dialog('close');
							alert('请不要重复发送申请哦！<(￣︶￣)>');
						}else{
							$("#c_submit").dialog('close');
							alert('出了点小问题/(ㄒoㄒ)/~~');
						}
					}
				});
			}
		}else{
			alert('请先登录哦(╯3╰)');
			window.location.href="/blog/index.php/Home/Login/login";
		}	
	});
	
	
});