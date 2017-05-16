<?php
namespace Home\Controller;
use Think\Controller;

	class PublicController extends Controller{
		public function Verify(){
				$config = array( 
					'fontSize'    =>   19,    // 验证码字体大小    
					'length'      =>    4,     // 验证码位数    
					'useNoise'    =>    false, // 关闭验证码杂点

				);
				$Verify = new \Think\Verify($config);
				$Verify->codeSet = '0123456789';
				$Verify->entry();
			}
	}
?>