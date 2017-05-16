<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{				//获取当前有没登录。已登录获取登陆的用户名
	public function common(){
		if(!isset($_SESSION['username']) || $_SESSION['username']=='' ){
			$data['status'] = "0";
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status'] = "1";
			$data['data']=$_SESSION['username'];
			$this->ajaxReturn($data,'JSON');
		}
	}
}

?>