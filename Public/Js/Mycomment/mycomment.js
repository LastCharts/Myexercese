$(function(){
	$('.three').css({
		"border-left": "#2F8A18 8px solid"
	});
	
	$('#list').tabs();
	
	
	$('body').delegate('.cmt-go','click',function(){
		var Aid = $(this).parent().parent().parent().find('input:hidden[name="article_id"]').val();
		window.open("/blog/index.php/Home/Article/article?id="+Aid);
	});
	
	
	$('#going').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('#default-go').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('body').delegate('.reply_go','click',function(){
		var comment_id = $(this).prev().val();
		$.ajax({
			type : 'POST',
			url : '/blog/index.php/Home/Mycomment/toarticle',
			dataType : 'Json',
			data : {
				"comment_id" : comment_id
			},
			beforeSend: function(){
			  $("#going").dialog('open');
			}, 
			success: function(json){
				if(json.status==1){
					$("#going").dialog('close');
					window.open("/blog/index.php/Home/Article/article?id="+json.article_id);
				}else{
					$("#going").dialog('close');
					$("#default-go").dialog('open');
					setTimeout(function(){
						$("#default-go").dialog('close');
					},2000);
				}
			}
		});
	});
	
	
});
