$(function(){
	
	$('body').delegate('.emoji','click',function(){
		if(! $('#sinaEmotion').is(':visible')){
			$(this).sinaEmotion();
			event.stopPropagation();
		}	
	});
	
	$('body').delegate('.pic-box','click', function(){
		$('body').delegate('.pic-box input','change',function(){
			var objUrl = getObjectURL(this.files[0]); //获取图片的路径，该路径不是图片在本地的路径
			if (objUrl){
				$(this).parent().css({
					"background" : "url("+objUrl+")",
					"background-size" : "80px 80px"
				});
			}
		});
	});
	
	$('#mmt-send').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*提交中dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	
	$('body').delegate('.send','click',function(){
		var content = $('textarea[name="contents"]').val();
		$('textarea[name="contents"]').html(content).parseEmotion();
		var contents = $('textarea[name="contents"]').html();
		$('textarea[name="contents"]').val(contents);
		$("#mmt-send").dialog('open');
		setTimeout(function(){
			$('form[name="mymoment"]').submit();
		});
	});

	
});


function getObjectURL(file) {
	 var url = null ;
	 if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	 }else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	 }else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	 }
	 return url ;
 }