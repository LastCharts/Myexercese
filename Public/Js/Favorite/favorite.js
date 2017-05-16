$(function(){
	$('.five').css({
		"border-left": "#2F8A18 8px solid"
		});
	$('body').delegate('.sign span','mouseover',function(e){
		var _text = $(this).text();
		var _tooltip = "<div id='tooltip'>个人签名："+_text+"</div>";
		$('body').append(_tooltip);
		$('#tooltip').fadeIn();
		$("#tooltip").css({
			"top": (e.pageY+10) + "px",
			"left":  (e.pageX +10) + "px"
		}).fadeIn('fast');		
	});
	
	$('body').delegate('.sign','mouseout',function(e){
		$('#tooltip').fadeOut();
		$('#tooltip').remove();
	});
	
	$('body').delegate('.sign span','mousemove',function(e){
		$('#tooltip').css({
			"top": (e.pageY+10 ) + "px",
			"left":  (e.pageX+10)  + "px"
		}).show();
	});
	
	
	$('body').delegate('.goTosee','click',function(){
		$Iid = $(this).next('input:hidden[name="targetid"]').val();
		window.open("/blog/index.php/Home/Index/index?id="+$Iid);
		
	});
});