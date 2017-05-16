<?php
namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller {
	public function reg(){
		$this->display();
	}
	
	public function checkName(){
		$where['username']=$_POST['username'];
		$user=D('User');
		$arr = $user->where($where)->find();
		if($arr){
			$result['status'] = 1;
			$this->ajaxReturn($result,'JSON');
		}else{
			$result['status'] = 0;
			$this->ajaxReturn($result,'JSON');
		}
	}
	
	public function register(){
		$user=D("User");
		$data['username'] = $_POST['username'];		
		$data['password'] = md5($_POST['password']);
		$data['sex'] = $_POST['sex'];
		$data['birthday'] = $_POST['date'];
		$data['pic'] = "/blog/Public/Image/first-head.png";
		$verify =$_POST['verify'];
		if((!$this->check_verify($verify))){
			$this->error("验证码错误！");
		}
		if($user->add($data)){
			$this->success('注册成功︿(￣︶￣)︿！',U('Login/login'));
		}else{
			$this->error('注册失败！ค(TㅅT)');
		}
	}
	
	function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
	
	
}
?>