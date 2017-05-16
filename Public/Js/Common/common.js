// JavaScript Document
$(function(){
	$.ajax({
			type: "POST", 
			url: "/blog/index.php/Home/Common/common", 
			dataType: "json",
			success: function(session){
				if(session.status==1){
					$('#member,#logout').show();
					$('#login_a,#reg').hide();
					$('#member').html('欢迎您：'+session.data);
				}else{
					$('#login_a,#reg').show();
					$('#member,#logout').hide();
				}
			}
	});
	
	$('#quit').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*成功退出dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#default-quit').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*成功退出dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#logout,.quit').click(function(){
		$.ajax({
			type: "POST", 
			url: "/blog/index.php/Home/Login/logout", 
			dataType: "json",
			success: function(session){
				if(session.status==1){
					$('#quit').dialog('open');
					setTimeout(function(){
						$("#quit").dialog('close');
						$('#login_a,#reg').show();
						$('#member,#logout').hide();
					},2000);
					location.reload();
				}else{
					$('#default-quit').dialog('open');
					setTimeout(function(){
						$("#default-quit").dialog('close');
					},2000);
				}
			}
		});
	});
		
});