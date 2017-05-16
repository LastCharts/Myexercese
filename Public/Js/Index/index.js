// JavaScript Document
$(function(){
	
	$('#nav ul').find('li').children().eq(0).css({
		"background-color":"#eee",
		"color":"black",
		"border-radius":"6px"
	});
	
	$('body').delegate('.searchsubmit','click',function(){
		$('.searchform').submit();
	});
	
	
	$('#requesting').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
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
		var receive_id = $('input:hidden[name="blogerid"]').val();
		var send_id = $("input:hidden[name='id']").val();
		if(send_id!='' || send_id!=0){
			if(receive_id==send_id){
				$("#requesting").dialog('open');
				setTimeout(function(){
					$("#requesting").dialog('close');
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
						  $("#requesting").dialog('open');
					},
					success :function(json){
						if(json.status==1){
							$("#requesting").dialog('close');
							$("#friendrequest").dialog('open');
							setTimeout(function(){
								$("#friendrequest").dialog('close');
							},2000);
						}else if(json.status==2){
							$("#requesting").dialog('close');
							alert('他已经是你好友了哦！<(￣︶￣)>');
						}else if(json.status==3){
							$("#requesting").dialog('close');
							alert('请不要重复发送申请哦！<(￣︶￣)>');
						}else{
							$("#requesting").dialog('close');
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
	
	
	$('body').delegate('.heart','click',function(){				//关注用户
		var author_id = $('input:hidden[name="blogerid"]').val();
		var uid = $("input:hidden[name='id']").val();
		if(uid!='' || uid!=0){
			if(author_id==uid){
				$("#requesting").dialog('open');
				setTimeout(function(){
					$("#requesting").dialog('close');
					alert('别自恋关注自己啦<(￣︶￣)>');
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
						  $("#requesting").dialog('open');
					},
					success :function(json){
						if(json.status==1){
							$("#requesting").dialog('close');
							$("#f_success").dialog('open');
							setTimeout(function(){
								$("#f_success").dialog('close');
							},2000);
						}else if(json.status==2){
							$("#requesting").dialog('close');
							alert('你已经是Ta的小粉丝了哦！<(￣︶￣)>');
						}else{
							$("#requesting").dialog('close');
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
	
	
	$('body').delegate('.talk','click',function(){
		var userid = $("input:hidden[name='id']").val();
		var talkid = $('input:hidden[name="blogerid"]').val();
		if(userid!='' || userid!=0){
			if(userid==talkid){
				alert('请不要自言自语(╯3╰)');
			}else{
				window.open("/blog/index.php/Home/Friend/friend");
			}
		}else{
			alert('请先登录哦(╯3╰)');
			window.location.href="/blog/index.php/Home/Login/login";
		}		
	});
	
	
	/*var timer = null;						//没办法实现，想死
	var iNow = 0;
	var count = $('.shoufengqin li').length;
	timer = setInterval(function(){
		if(iNow>count){
			iNow = 0;
		}
		$('.shoufengqin li').css({
			"width":"50px"
		});
		$('.shoufengqin li').eq(iNow).css({
			"width":"500px"
		});
		iNow++;
	},2000);
	$('body').delegate('.shoufengqin','mouseover',function(){
		clearInterval(timer);
	});*/
	
});

	