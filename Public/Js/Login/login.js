$(function(){
	$('body').delegate('#login .password input[name="password"]','focus',function(){
		$('#owl-login').addClass('trigger');
	});
	
	$('body').delegate('#login .password input[name="password"]','blur',function(){
		$('#owl-login').removeClass('trigger');
	});
	
	
	
	$('.input-box input').tooltip({
		position : {
			my : 'left+15 center',
			at : 'right center'
		},
	});
	$('input:text[name="verify"]').tooltip({
		position : {
			my : 'left+117 center',
			at : 'right center'
		},
	});
	
	
	
	$('body').delegate('.btn-noLogin','click',function(){
		$.ajax({
			type : "POST",
			url : "/blog/index.php/Home/Login/randomnum",
			dataType : 'json',
			success : function(data){
				if(data.status==1){
					window.location.href = '/blog/index.php/Home/Index/index?id='+data.num;
				}
			}
		});
		
	});
	
});