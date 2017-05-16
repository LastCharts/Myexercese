$(function(){
	var error=new Array();
	
	$('body').delegate('#Register .password input[name="password"]','focus',function(){
		$('#owl-reg').addClass('trigger');
	});
	
	$('body').delegate('#Register .password input[name="password"]','blur',function(){
		$('#owl-reg').removeClass('trigger');
	});
	$('body').delegate('#Register .Repassword input[name="repassword"]','focus',function(){
		$('#owl-reg').addClass('trigger');
	});
	
	$('body').delegate('#Register .Repassword input[name="repassword"]','blur',function(){
		$('#owl-reg').removeClass('trigger');
	});
	
	
	$('.sex input[type=radio]').button();
	$('input:text[name="date"]').datepicker({
		dateFormat : 'yy-mm-dd',
		showOtherMonths : true,
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		closeText : '关闭',
		currenText : '今天',
	});
	
	$('body').delegate('input:text[name="username"]','blur',function(){
		var username = $(this).val();
		$.ajax({
			type : "POST",
			url : "/blog/index.php/Home/Register/checkName",
			dataType : "Json",
			data :{
				"username" : username
			},
			success :function(data){
				if(data.status==1){
					if($('#usermessage').length>0){
						$('#usermessage').remove();
					}
					$('.username').after('<p id="usermessage">该用户名已被注册</p>');
					error['username']=1;
				}else{
					$('#usermessage').remove();
					error['username']=0;
				}
			}
			
		});
	});
	
	$('body').delegate('input:password[name="repassword"]','blur',function(){
		var password = $('input:password[name="password"]').val();
		var repassword = $(this).val();
		if(password==repassword){
			error['password']=0;
		}else{
			error['password']=1;
		}
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
	
	$('body').delegate('.btn-toLogin','click',function(){
		window.location.href = "/blog/index.php/Home/Login/login";
	});
	
	$('body').delegate('.btn-reg','click',function(){
		if($('input:text[name="username"]').val()==''){
			alert('用户名不得为空');
		}else if($('input:password[name="password"]').val()==''){
			alert('密码不得为空');
		}else if($('input:password[name="repassword"]').val()==''){
			alert('确认密码不得为空');
		}else if($('input:text[name="date"]').val()==''){
			alert('生日不得为空');
		}else if($('input:text[name="verify"]').val()==''){
			alert('验证码不得为空');
		}else{
			if(error['password']==1||error['username']==1){
				return false;
			}else{
				$('.regform').submit();
			}
		}
	});
	
});
