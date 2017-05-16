// JavaScript Document
$(function(){
	$.ajax({
		type: 'POST',
		url: '/blog/index.php/Home/Message/Have_new',
		dataType: 'json',
		success:function(data){
			if(data.status==1){
				$('.navlabel').css({
					"display":"inline-block"
				});
			}
		}	
	});
});

	