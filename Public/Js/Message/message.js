$(function(){
	$('.six').css({
		"border-left": "#2F8A18 8px solid"
		});
		
	$('#tabs').tabs();	
	
	$('#handle').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	

	$('body').delegate('.Receive','click',function(){
		$this = $(this);
		var send_id = $(this).parent().parent().find('input:hidden[name="send_id"]').val();
		var receive_id = $('input:hidden[name="userid"]').val();
		$.ajax({
			type: "POST",
			url: "/blog/index.php/Home/Friend/addfriend", 
			dataType: "json",
			data : {
				"send_id" :send_id,
				"receive_id" :receive_id
			},
			beforeSend: function(){
			  $("#handle").dialog('open');
			},
			success:function(data){
				if(data.status==1){
					setTimeout(function(){
						$("#handle").dialog('close');
						alert('添加成功！<(￣︶￣)>');
						$this.parent().parent().fadeOut();
					},2000);
				}else if(data.status==2){
					setTimeout(function(){
						$("#handle").dialog('close');
						alert('对方已经是你的好友了！<(￣︶￣)>');
						$this.parent().parent().fadeOut();
					},2000);
				}else{
					$("#handle").dialog('close');
					alert('添加失败！(；′⌒`)');
				}
			}
		});
	});

	$('#confirm').dialog({
		buttons : {
			'确定' : function(){
				
			},
			'取消' : function(){
				$('#confirm').dialog('close');
			}
		},
		autoOpen : false,
		modal : true,
		draggable : false,
		resizable : false,
		modal : true,
		closeText : '关闭'		
	}).parent().find('.ui-widget-header').hide();
	
	$('body').delegate('.Refuse','click',function(){
		var $this = $(this);
		var send_id = $(this).parent().parent().find('input:hidden[name="send_id"]').val();
		var receive_id = $('input:hidden[name="userid"]').val();
		$('#confirm').dialog('open');
		$('#confirm').parent().find('button').eq(1).click(function(){
			$.ajax({
				type: "POST",
				url: "/blog/index.php/Home/Friend/Refriend", 
				dataType: "json",
				data : {
					"send_id" :send_id,
					"receive_id" :receive_id
				},
				beforeSend: function(){
					$("#confirm").dialog('close');
					$("#handle").dialog('open');
				},
				success:function(data){
					if(data.status==1){
						$("#handle").dialog('close');
						$this.parent().parent().fadeOut();
					}else{
						alert('发生错误，请稍后再操作！(；′⌒`)');
					}
				}
			});
		});
	});
	
	
	$('body').delegate('.Iknow','click',function(){
		var send_id = $('input:hidden[name="userid"]').val();
		var receive_id = $(this).parent().parent().find('input:hidden[name="receive_id"]').val();
		var state = $(this).parent().parent().find('input:hidden[name="state"]').val();
		var $this = $(this);
		$.ajax({
			type: 'POST',
			url: '/blog/index.php/Home/Message/deleteMess',
			dataType: 'json',
			data: {
				"send_id" :send_id,
				"receive_id" :receive_id,
				"state" :state
			},
			beforeSend: function(){
				$("#handle").dialog('open');
			},
			success:function(data){
				if(data.status==1){
					$("#handle").dialog('close');
					$this.parent().parent().fadeOut();
				}else{
					alert('发生错误，请稍后再操作！(；′⌒`)');
				}
			}
		});
	});
	
	
	$('body').delegate('.Tosee','click',function(){
		var uid = $('input:hidden[name="userid"]').val();
		var Lid = $(this).parent().parent().find('input:hidden[name="Lid"]').val();
		var $this = $(this);
		$.ajax({
			type: 'POST',
			url: '/blog/index.php/Home/Message/Haveread',
			dataType: 'json',
			data: {
				"uid" :uid,
				"Lid" :Lid
			},
			beforeSend: function(){
				window.open("/blog/index.php/Home/Index/index?id="+Lid);
			},
			success:function(data){
				if(data.status==1){
					setTimeout(function(){
						$this.parent().parent().fadeOut();
					},2000);
				}else{
					alert('发生一点小问题(；′⌒`)');
				}
			}
		});
	});
	
	
	
	var messnum1 = $('#Addmessage div').length;
	var messnum2 = $('#Result div').length;
	var messnum3 = $('#LoveMess div').length;
	if(messnum1>0){
		$('.remindlabel').css({
			"display":"inline-block"
		});
	}
	if(messnum2>0){
		$('.remindlabel2').css({
			"display":"inline-block"
		});
	}
	if(messnum3>0){
		$('.remindlabel3').css({
			"display":"inline-block"
		});
	}
	
	
	
	
});