<?php
namespace Home\Controller;
use Think\Controller;

class UserinfoController extends IsloginController{
	public function userinfo(){
		$id = $_SESSION['id'];
		$list = D('User')->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
	}
	
	public function modifysign(){
		$id = $_SESSION['id'];
		$modify['desc'] = $_POST['desc'];
		$modify['sign'] = $_POST['sign'];
		$usersign = D('user');
		if($usersign->where('id='.$id)->save($modify)){
			$this->success('修改成功！<(￣︶￣)>');
		}else{
			$this->error('修改失败！(；′⌒`)');
		}
	}
	
	public function modifyinfo(){
		$id = $_SESSION['id'];
		$data['birthday'] = $_POST['birthday'];
		$data['age'] = $_POST['age'];
		$data['sex'] = $_POST['sex'];
		$data['mail'] = $_POST['mail'];
		$data['phonenum'] = $_POST['phonenum'];
		$userinfo = D('user');
		if($userinfo->where('id='.$id)->save($data)){
			$this->success('修改成功！<(￣︶￣)>');
		}else{
			$this->error('修改失败！(；′⌒`)');
		}
	}
	
	
	Public function upload(){
		$rx = $_POST['rx'];
		$ry = $_POST['ry'];
		$rx1 = $_POST['rx1'];
		$ry1 = $_POST['ry1'];
		if($_FILES['pic']['tmp_name']!=''){
			$upload = new \Think\Upload();								// 实例化上传类
			$upload->maxSize  = 3145728 ;								// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');	// 设置附件上传类型
			$upload->savePath =  '/blog/Public/Image/Pic/'.$_SESSION['username'].'/';					// 设置附件上传目录
			$upload->rootPath =  '../';
			if(!($info = $upload->uploadOne($_FILES['pic']))){			// 上传错误提示错误信息W
				$this->error($upload->getError());
			}else{														// 上传成功 获取上传文件信息			
				$path = $info['savepath'].$info['savename'];			//文件上传成功后所在的地址，包含图片名
				$size = getimagesize('../'.$path);
				$Rwdith = ceil($size[0] * $rx);							//获得传过来的比例，处理得到截图的真正宽度
				$Rheight = ceil($size[1] * $ry);						//获得传过来的比例，处理得到截图的真正高度
				$startX = ceil($size[0] * $rx1);						//获得传过来的比例，处理得到截图的开始位置的X坐标
				$startY = ceil($size[1] * $ry1);						//获得传过来的比例，处理得到截图的开始位置的Y坐标
				$image = new \Think\Image();
				$image->open('../'.$path);
				$image->crop($Rwdith,$Rheight,$startX,$startY)->save('../'.$path);
				$where['id'] = $_SESSION['id'];
				$data['pic'] = $path;										//$path是存进数据库的相对路径
				$user = D("user"); 											// 实例化User对象
				if($user->where($where)->setField($data)){
					$this->success('数据保存成功！');
				}else{
					$this->error('数据保存失败！');
				}
			}
		}
		
																	// 保存表单数据 包括附件数据

	}

}


?>
