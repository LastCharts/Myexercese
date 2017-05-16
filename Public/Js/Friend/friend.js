$(function(){
	$('.second').css({
		"border-left": "#2F8A18 8px solid"
		});
		
    $(".friend" ).accordion();
	$('.chatlist').hide();
	
	
	$('body').delegate("input:button[name='button']","click",function(){
		var $this = $(this);
		var content = $(".comment-text").val();
		var sender = $("input:hidden[name='sender']").val();
		var receiver = $("input:hidden[name='receiver']").val();
		var popic = $("input:hidden[name='popic']").val();
		var receiverRead = '0';
		var html = null;
		$.ajax({
			type:"POST",
			async:true,
			url:"/blog/index.php/Home/Friend/addchat",
			dataType:"json",
			data:{
				"sender" :sender,
				"receiver" :receiver,
				"content" :content,
				"receiverRead" :receiverRead
			},
			success:function (data){
				if(data.status==1){
					html = '<div class="right-content">';
					html += '<div class="Rsender-head">';
					html += '<img src="'+popic+'" />';
					html += '<p>'+data.sender+'</p>';
					html += '</div>';
					html += '<div class="Rcontent">';
					html += '<p class="cmt-box" style="padding-left:10px;letter-spacing:1px;">'+data.content+'</p>';
					html += '</div>';
					html += '</div>';
					$this.parent().parent().parent().parent().find('#chat-content').append(html);
					$('#chat-content').scrollTop($('#chat-content')[0].scrollHeight);
					$('.comment-text').val('');
				}else{
					console.log('发送失败!！');
				}			
			}	
		});	
	});
	
	
	$('body').delegate('.Dltfriend','click',function(){
		if(confirm('确定删除Ta吗？<(＾－＾)>')){
			var fid = $(this).parent().parent().next().val();
			window.location.href = "/blog/index.php/Home/Friend/DeleteFriend?fid="+fid;
		}
	});
	
	
	
});
