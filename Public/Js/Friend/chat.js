$(function(){
	$('body').delegate('.user','click',function(){
		var receiver = $(this).html();
		var sender = $('input:hidden[name="username"]').val();
		$("input:hidden[name='receiver']").val(receiver);
		if($('.chatlist')){
			$('.chatlist').hide();
		}
		$('.mess p').html('正在与'+receiver+'聊天中....');
		$('.chatlist').fadeIn();
		$('.member').css({
			"background-color":"white",
			"border-radius":"0px"
		});
		$(this).parent().parent().css({
			"background-color":"#eee",
			"border-radius":"6px"
		});
		get_message_reply(sender,receiver);
	});
});


function get_message_reply(sender,receiver){
	var link = {
			type:"POST",
			async:true,
			url:"/blog/index.php/Home/Chat/chat",
			dataType:"json",
			data:{
				"receiver" :sender,
				"sender" :receiver
			},
			success:function (msg){
				if(msg.status==1){
					var htmls = null;
					htmls = '<div class="left-content">';
					htmls += '<div class="Lsender-head">';
					htmls += '<img src="'+msg.sender_pic+'" />';
					htmls += '<p>'+msg.sender+'</p>';
					htmls += '</div>';
					htmls += '<div class="Lcontent">';
					htmls += '<p style="padding-left:10px;letter-spacing:1px;">'+msg.content+'</p>';
					htmls += '</div>';
					htmls += '</div>';
					$('#chat-content').append(htmls);
					setTimeout(function(){
						get_message_reply(msg.receiver,msg.sender);
					},2000);
				}else{
					get_message_reply(msg.receiver,msg.sender);
				}
			}
	}
	$.ajax(link);
}