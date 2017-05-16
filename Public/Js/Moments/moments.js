$(function(){
	
	$('.chose').hide();
	$('body').delegate('.c-icon','click',function(){
		$(this).parent().next().fadeToggle();
	});
	
	$('#New img').tooltip({
		show: {
			effect: "slideDown",
			delay: 50
		},
		position : {
			my : 'left+15 center',
			at : 'right center'
		},
	});
	
	
	$('body').delegate('#New img','click',function(){
		window.location.href = "/blog/index.php/Home/NewMoments/newmoments";
	});
	
	
	$('#command').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#sending').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#success-send').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('body').delegate('.D1','click',function(){
		$('.chose').fadeOut();
		var Cid = $(this).parent().next().val();
		var username = $('input:hidden[name="username"]').val();
		var is = $(this).parent().parent().next().next().find('input:hidden[name="is"]').val();
		var $this = $(this);
		var html;
		$.ajax({
			type :"POST",
			url: "/blog/index.php/Home/Moments/addgood",
			dataType :"json",
			data :{
				"Cid" :Cid,
				"Lover" :username
			},
			success: function(json){
				if(json.status==1){
					if(is == '1'){
						$this.parent().parent().next().next().find('.like img').after(username+',');
					}else{
						$this.parent().parent().next().next().find('.like img').css({
							"display":"inline-block"
						});
						$this.parent().parent().next().next().find('.like img').after(username);
					}
					alert('点赞成功！<(￣︶￣)>');
				}else if(json.status==2){
					alert('请不要重复点赞！︿(￣︶￣)︿');
				}else{
					alert('发生错误！(；′⌒`)');
				}
			}
		});
	});
	
	
	$('body').delegate('.D2','click',function(){
		$('.chose').fadeOut();
		if($('.cmtbox')){
			$('.cmtbox').remove();
		}
		var box = '<div class="cmtbox">';
		box += '<input type="hidden" name="is_reply" value="0" />';
		box += '<input type="hidden" name="reply_name" value="0" />';
		box += '<textarea name="comment" class="comment"  placeholder="限制60字..." contenteditable="true" maxlength="60"></textarea>';
		box += '<div class="toolsbox">';
		box += '<span class="emoji">😚</span>';
		box += '<input type="button" name="button" class="cmt-btn" value="评论" />';
		box += '<p style="display:none;"></p>';
		box += '</div>';
		box += '</div>';
		var count = $(this).parent().parent().next().next().find('.cmtlist div').length;
		if(count>0){
			$(this).parent().parent().next().next().find('.cmtlist div:last-child').after(box);
		}else{
			$(this).parent().parent().next().next().find('.cmtlist').after(box);
		}	
	});
	
	$('body').delegate('.cmt-user','click',function(){
		$('.chose').fadeOut();
		var answername = $(this).html();
		if($('.cmtbox')){
			$('.cmtbox').remove();
		}
		var box = '<div class="cmtbox">';
		box += '<input type="hidden" name="is_reply" value="1" />';
		box += '<input type="hidden" name="reply_name" value="'+answername+'" />';
		box += '<textarea name="comment" class="comment"   contenteditable="true" maxlength="60" placeholder="回复：@'+answername+':"></textarea>';
		box += '<div class="toolsbox">';
		box += '<span class="emoji">😚</span>';
		box += '<input type="button" name="button" class="cmt-btn" value="评论" />';
		box += '<p style="display:none;"></p>';
		box += '</div>';
		box += '</div>';
		$(this).parent().after(box);	
	});
	
	
	$('body').delegate('.emoji','click',function(){
		if(! $('#sinaEmotion').is(':visible')){
                    $(this).sinaEmotion();
                    event.stopPropagation();
                }
		
	});
	
	
	
	$('body').delegate('.cmt-btn','click',function(){
		var $this = $(this);
		var comment = $(this).parent().prev().val();
		$(this).next().html(comment).parseEmotion();
		var comments = $(this).next().html();
		var Cid = $(this).parent().parent().parent().parent().parent().find('.po-cnt').children('input:hidden[name="mmtsid"]').val();	//要判断是否已经有评论，不然会导致获取不到朋友圈的id值
		var User = $('input:hidden[name="username"]').val();
		var is_reply = $(this).parent().parent().find('input:hidden[name="is_reply"]').val();
		var reply_name = $(this).parent().parent().find('input:hidden[name="reply_name"]').val();
		if(comment==''){
			$('#command').dialog('open');
			setTimeout(function(){
				$('#command').dialog('close');
			},2000);
		}else{
			$.ajax({
				type :"POST",
				url :"/blog/index.php/Home/Moments/addcomment",
				dataType :"json",
				data :{
					"comments" : comments,
					"Cid" : Cid,
					"from_name" : User,
					"is_reply" : is_reply,
					"reply_name" : reply_name
				},
				beforeSend: function(){
					$("#sending").dialog('open');
				}, 
				success :function(data){
					if(data.status==1){
						$("#sending").dialog('close');
						$("#success-send").dialog('open');
						setTimeout(function(){
							$("#success-send").dialog('close');					
							/*  $this.parent().parent().prev().children('p').html(comment).parseEmotion();	 单单是在当前解释表情，前面还没保存进数据库		*/
							if($('.cmtbox')){
								$('.cmtbox').remove();
							}
							location.reload();
						},2000);
										
					}else{
						$("#sending").dialog('close');
						alert('出错了(；′⌒`)')
					}
				}
			});
		}
		
	});
	
	
	
});