$(function(){
	
	$('body').delegate('.btn-modify','click',function(){
		$('form[name="modifyinfo"]').submit();
	});
	$('body').delegate('.btn-signmodify','click',function(){
		$('form[name="modifysign"]').submit();
	});
	
	
	$('#show').tabs();
	$('.sex input[type=radio]').button();
	$('input:text[name="birthday"]').datepicker({
		dateFormat : 'yy-mm-dd',
		showOtherMonths : true,
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		closeText : '关闭',
		currenText : '今天',
	});
	$('#userinfo input').tooltip({
		show: {
			effect: "slideDown",
			delay: 50
		},
		position : {
			my : 'left+15 center',
			at : 'right center'
		},
	});
	$('#usersign textarea').tooltip({
		show: {
			effect: "slideDown",
			delay: 50
		},
		position : {
			my : 'left+15 center',
			at : 'right center'
		},
	});
	
	$('body').delegate('#userinfo input:text','focus',function(){
		$(this).parent().css({
			"border":"1px green solid",
			"box-shadow":"0 0 8px #0f6d28"
		});
	});
	$('body').delegate('#userinfo input:text','blur',function(){
		$(this).parent().css({
			"box-shadow":"none"
		});
	});
	
	
	
	
	$('.first').css({
		"border-left": "#2F8A18 8px solid",
		});
	$('.submit').click(function(){
		$('.myform').submit();
	});
	$('.Pre-box').hide();
	
	
	$('.hidden').on('click', function(){
		$(".hidden").on("change",function(){
			$(".Pre-box img").css("height","");
			var objUrl = getObjectURL(this.files[0]); //获取图片的路径，该路径不是图片在本地的路径
			if (objUrl){
				$(".Pre-box img").attr("src", objUrl); //将图片路径存入src中，显示出图片
				$(".now-Pic img").attr("src", objUrl);
				$('.Pre-box').show();
				$('#pre-pic').Jcrop({
					aspectRatio:1,
					onChange:showCoords, //当选择区域变化的时候，执行对应的回调函数 
					onSelect:showCoords //当选中区域的时候，执行对应的回调函数 
				},function(){
						var bounds = this.getBounds();
						boundx = bounds[0];
						boundy = bounds[1];
						jcrop_api = this;
				});
				window.URL.revokeObjectURL(url);
			}
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
function showCoords(c){
	var rx = c.w / boundx;		//页面中缩小图和选中域的宽的比例
	var ry = c.h / boundy;		//页面中缩小图和选中域的高的比例
	var rx1 = c.x / boundx;		//页面中选中域相对于缩小图的左上角的x轴比例
	var ry1 = c.y / boundy;		//页面中选中域相对于缩小图的左上角的y轴比例
	
	$("#rx").val(rx); 		//把宽高比例传到隐藏域
	$("#ry").val(ry); 
	$("#rx1").val(rx1); 	//把开始位置的比例传到隐藏域
	$("#ry1").val(ry1); 
}
/*if($(this).files.length == 0){
			return;
		}else{
			var reader = new FileReader();
			
		}*/