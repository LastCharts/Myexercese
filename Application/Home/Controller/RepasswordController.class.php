<?php
namespace Home\Controller;
use Think\Controller;

class RepasswordController extends IsloginController {
	public function repasswored(){
		$this->display;
	}
	
	public function modify(){
		$id = $_SESSION['id'];
		$Npassword = $_POST['Npassword'];
		$Npassword2 = $_POST['Npassword2'];
		if($Npassword==$Npassword2 && $Npassword!='' && $Npassword2!=''){
			$data['password'] = $_POST['Npassword'];
			$user = M('User');
			if($user->where('id = '.$id)->save($data)){
				$this->success('修改成功！<(￣︶￣)>');
			}else{
				$this->error('修改失败！(；′⌒`)');
			}
		}else{
			$this->error('2次输入的密码不相同！(；′⌒`)');
		}
		
	}
}
?>