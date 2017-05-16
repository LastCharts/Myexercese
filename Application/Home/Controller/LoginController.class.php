<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
	public function login(){
		$this->display();
	}
	public function dologin(){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$verify =$_POST['verify'];
		$model = $_POST['model'];
		if((!$this->check_verify($verify))){
			$this->error("验证码错误！");
		}
		$user=D('User');
		$where['username']=$username;
		$where['password']=$password;
		$arr=$user->where($where)->find();
		if($arr){
			$_SESSION['username']=$arr['username'];
			$_SESSION['id']=$arr['id'];
			$user->online='1';
			$user->save();
			/*$this->success('用户登录成功！',U('Index/index'));*/
			if($model=='1'){
				$data['status'] = "1";
				$data['id']=$_SESSION['id'];
				$data['data']=$_SESSION['username'];
				$this->ajaxReturn($data,'JSON');
			}else{
				$this->success('用户登录成功！',U('Index/index'));
			}				
		}else{
			if($model=='1'){
				$data['status'] = "2";
				$this->ajaxReturn($data,'JSON');
			}else{
				$this->error('该用户不存在或密码错误！');
			}
	
		}
	}
	public function logout(){
		$where['id'] = $_SESSION['id'];
		$user = D('User');
		if($user->where($where)->find()){
			$user->online='0';
			$user->save();
			session_destroy();
			$data['status'] = "1";
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status'] = "0";
			$this->ajaxReturn($data,'JSON');
		}
		
	}
	
	protected function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
	
	
	public function randomnum(){
		$user = D('User');
		$array = $user->field('id')->select();
		foreach($array as $value){
			$list[] = $value['id'];
		}
		$num = array_rand($list,1);
		$data['status'] = 1;
		$data['num'] = $num;
		$this->ajaxReturn($data,'JSON');
	}
}
?>