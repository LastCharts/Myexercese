$(function(){
	$('.four').css({
		"border-left": "#2F8A18 8px solid"
		});
		
	$('#tabs').tabs();
	$('input[name="kind"],input[name="re-kind"]').button();
	
	
	
	$('.Pre-box').hide();
	$('.Pre-see').hide();
	
	$('body').delegate('input[name="upload"]','click', function(){
		$('body').delegate('input[name="upload"]','change',function(){
			$(".Pre-box img").css("height","");
			var objUrl = getObjectURL(this.files[0]); //获取图片的路径，该路径不是图片在本地的路径
			if (objUrl){
				$(".Pre-box img").attr("src", objUrl); //将图片路径存入src中，显示出图片
				$('.Pre-see').show();
				$('.Pre-box').show();
			}
		});
	});
	
	$('body').delegate('.ensure','click',function(){
		var title = $('input[name="title"]').val();
		var desc = $('textarea[name="desc"]').val();
		var ue = UE.getEditor('content');
		var content = ue.getContent();
		
		if( title==''){
			$('input[name="title"]').after('<p class="Artmessage" style="margin-left:10px;display:inline-block;color:red;font-size:15px;">请输入文章标题！</p>');
			alert('请输入文章标题！');
			$('input[name="title"]')[0].focus();
		}else{
			$('.Artmessage').remove();
			if(desc==''){
			$('textarea[name="desc"]').after('<p class="Artmessage" style="margin-left:10px;display:inline-block;color:red;font-size:15px;">请输入文章简述！</p>');
			alert('请输入文章简述！');
			$('textarea[name="desc"]')[0].focus();
			}else{
				$('.Artmessage').remove();
				if(content==''){
					alert('请输入文章内容！');
					ue.focus();
				}else{
					$('.myform').submit();
				}
			}
		}
			
	});
	
	$('body').delegate('.reset','click',function(){
		var ue = UE.getEditor('content');
		ue.setContent('');
		$('.myform')[0].reset();
		alert('已清空表单内容！');
	});
	
	$('.change').hide();
	
	$('body').delegate('input[name="re-upload"]','click', function(){
		$('body').delegate('input[name="re-upload"]','change',function(){
			$(".Pre-box img").css("height","");
			var objUrl = getObjectURL(this.files[0]); //获取图片的路径，该路径不是图片在本地的路径
			if (objUrl){
				$("img[name='re-pic']").attr("src", objUrl); //将图片路径存入src中，显示出图片
			}
		});
	});
	
	$('#waiting').dialog({
		autoOpen : false,
		modal : true,
		closeOnEscape : false,
		resizable : false,
		draggable : false,
		width : 80,
		height : 50,			/*评论成功dialog：本来80是刚刚好的，但是最终按登录按钮时，弹出来的dialog会自动加上
									30px，所以要在一开始就减去30px；*/	
	}).parent().find('.ui-widget-header').hide();
	
	$('body').delegate('.modify','click',function(){
		$("#waiting").dialog('open');
		$('.change').css({
			"display":"inline-block"
		});
		var id = $(this).parent().parent().prev().val();
		var ae = UE.getEditor('content2');
		$.ajax({
			type :"POST",
			dataType :"json",
			url :"/blog/index.php/Home/Myarticle/show",
			data : {
				"id" :id
			},
			success:function(data){
				if(data.status==1){
					$("#waiting").dialog('close');
					$('#tabs').tabs("option","active", 2);
					$('#changeart').find('input[name="re-title"]').val(data.title);
					$('#changeart').find('textarea[name="re-desc"]').val(data.desc);
					$('#changeart').find('input[name="modifyid"]').val(data.id);
					$('#changeart').find('img[name="re-pic"]').attr("src", data.picture);
					$('.Pre-see').show();
					$('.Pre-box').show();
					ae.setContent(data.content);
				}else{
					alert('出了点小毛病，稍后再试！');
					window.location.reload();
				}
			}
		});
	});
	
	$('body').delegate('.update','click',function(){
		$('.upform').submit();
	});
	
	$('body').delegate('.cancle','click',function(){
		var ue = UE.getEditor('content2');
		ue.setContent('');
		$('.myform')[0].reset();
		$('.change').css({
			"display":"none"
		});
		$('#tabs').tabs("option","active", 0);
	});
	
	
	$('body').delegate('.delete','click',function(){
		if(confirm('确定删除改文章吗？<(＾－＾)>')){
			var id = $(this).parent().parent().prev().val();
			window.location.href = "/blog/index.php/Home/Myarticle/Delarticle?id="+id;
		}	
	})
	
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