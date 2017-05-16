<?php
namespace Home\Controller;
use Think\Controller;

class IsloginController extends Controller{
	public function _initialize(){
        if(!isset($_SESSION['username']) || $_SESSION['username']=='' ){
			$this->error('请先登录(～￣▽￣)～',U('Login/login'));
		}
    }
}

?>