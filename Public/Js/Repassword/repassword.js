$(function(){
	$('.seven').css({
		"border-left": "#2F8A18 8px solid"
		});
		
	$('body').delegate('button[name="ensure"]','click',function(){
		var Newpassword = $('input[name="Npassword"]').val();
		var Newpassword2 = $('input[name="Npassword2"]').val();
		if(Newpassword==Newpassword2){
			$('form[name="myform"]').submit();
		}else{
			alert('2次输入的密码不相同！(；′⌒`)');
			$('input[name="Npassword"]').val('');
			$('input[name="Npassword2"]').val('');
			$('input[name="Npassword"]')[0].focus();
		}
	});
	
	$('body').delegate('button[name="cancle"]','click',function(){
		$('form[name="myform"]')[0].reset();
	})
	
	
	$('body').delegate('.Rebody input:password','focus',function(){
		$(this).parent().css({
			"border":"1px #33c9d8 solid",
			"box-shadow":"0 0 5px #0f6d28"
		});
	});
	$('body').delegate('.Rebody input:password','blur',function(){
		$(this).parent().css({
			"box-shadow":"none"
		});
	});
	
	$('.Rebody input').tooltip({
		show: {
			effect: "slideDown",
			delay: 50
		},
		position : {
			my : 'left+15 center',
			at : 'right center'
		},
	});
	
});