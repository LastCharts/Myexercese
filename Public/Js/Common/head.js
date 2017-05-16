// JavaScript Document
$(function(){
	
	$('#login_div').dialog({
		title : '用户登录',
		buttons : {
			'登录' : function(){
				
			},
			'取消' : function(){
				$(this).dialog('close');
			}
		},
		autoOpen : false,
		modal : true,
		draggable : false,
		resizable : false,
		modal : true,
		closeText : '关闭'
	});
	
	$('#login_a').click(function(){
		$('#login_div').dialog('open');
	});
	
	$('#loading').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 180,
		height : 50,			/*登录中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#success').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*登录成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#default').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论失败dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('#login_div').parent().find('button').eq(1).click(function(){
		var username = $("#username").val(); 
		var password = $("#password").val(); 
		var verify = $("#verify").val();
		var model = 1;
		$.ajax({ 
			type: "POST", 
			url: "/blog/index.php/Home/Login/dologin", 
			dataType: "json",
			async : false,
			data: {
				"username" :username,
				"password" :password,
				"verify" :verify,
				"model" :model
			},
			beforeSend: function(){
			  $("#loading").dialog('open');
			}, 
			success: function(json){
				if(json.status==1){
					$("#success").dialog('open');
					$("#loading").dialog('close');
					setTimeout(function(){
						$("#success").dialog('close');
						$('#login_div').dialog('close');
						$('#member,#logout').show();
						$('#login_a,#reg').hide();
						$('#member').html('欢迎您：'+json.data);
						location.reload();
					},2000);
				}else{
					$("#default").dialog('open');
					$("#loading").dialog('close');
					setTimeout(function(){
						$("#default").dialog('close');
						$('#login_a,#reg').show();
						$('#member,#logout').hide();
					},2000); 
				}
			}
		}); 
	});
	
	$('#member,#logout').hide();
	
	
});

	