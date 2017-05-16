<?php
namespace Home\Controller;
use Think\Controller;

class FriendController extends IsloginController{
	public function friend(){
		$id = $_SESSION['id'];
		$friend = D('FriendView');
		$where['uid'] = $id;
		$result = $friend->where($where)->select();
		if($result){
			$this->assign('result',$result);		
		}
		$this->display();
	}
	
	public function addchat(){		//添加发送的聊天语句
		$data['content'] = $_POST['content'];
		$data['sender'] = $_POST['sender'];
		$data['receiver'] = $_POST['receiver'];
		$data['receiverRead'] = $_POST['receiverRead'];
		$chat = M('message');
		if($chat->add($data)){
			$list['status']='1';
			$list['content'] = $data['content'];
			$list['sender'] = $data['sender'];
			$this->ajaxReturn($list,'JSON');
			exit();
		}else{
			$list['status']='0';
			$this->ajaxReturn($list,'JSON');
			exit();
		}
	}
	
	public function sendaddrequest(){		//发送添加好友请求
		$friend = M('friend');
		$where['uid'] = $_POST['send_id'];
		$where['fid'] = $_POST['receive_id'];
		$count = $friend->where($where)->count();
		if($count>0){
			$data['status']='2';			//已经是好友
			$this->ajaxReturn($data);
		}else{
			$result['send_id'] = $_POST['send_id'];
			$result['receive_id'] = $_POST['receive_id'];
			$friendRequest = M('addfriend');
			if($friendRequest->where($result)->find()){
				$data['status']='3';			//已发送过申请
				$this->ajaxReturn($data);
			}else{
				$result['state'] = 0;
				if($friendRequest->add($result)){
					$data['status']='1';		//还不是好友，写入好友申请
					$this->ajaxReturn($data);
				}else{
					$data['status']='0';
					$this->ajaxReturn($data);
				}
			}
		}
	}
	
	
	public function addfriend(){		//接受好友请求并添加好友
		$addfriend = M('friend');
		$result['uid'] = $_POST['receive_id'];
		$result['fid'] = $_POST['send_id'];
		if($addfriend->where($result)->find()){			//线判断对方是否已经是我的好友
			$deleteMess = D('addfriend');				//是则删除申请信息
			$where['send_id'] = $_POST['send_id'];
			$where['receive_id'] = $_POST['receive_id'];
			if($deleteMess->where($where)->delete()){
				$data['status'] = '2';
				$this->ajaxReturn($data);
			}	
		}else{
			if($addfriend->add($result)){
				$addfriend1 = M('friend');
				$result1['uid'] = $_POST['send_id'];
				$result1['fid'] = $_POST['receive_id'];		//两次为双方添加好友
				if($addfriend1->add($result1)){
					$addsuccess = D('addfriend');
					$where['send_id'] = $_POST['send_id'];
					$where['receive_id'] = $_POST['receive_id'];
					$success = $addsuccess->where($where)->find();
					if($success){
						$addsuccess->state = '1';			//添加好友成功修改状态为1
						$addsuccess->save();
						$data['status'] = '1';
						$this->ajaxReturn($data);
					}else{
						$data['status'] = '0';		//修改state失败处理
						$this->ajaxReturn($data);
					}
				}	
			}else{
				$data['status'] = '0';
				$this->ajaxReturn($data);
			}
		}
		
		
		
	}
	
	
	public function Refriend(){				//拒绝好友请求
		$Refriend = D('addfriend');
		$where['send_id'] = $_POST['send_id'];
		$where['receive_id'] = $_POST['receive_id'];
		$refuse = $Refriend->where($where)->find();
		if($refuse){
			$Refriend->state = '2';			//拒绝添加好友修改状态为2
			$Refriend->save();
			$data['status'] = '1';
			$this->ajaxReturn($data);
		}else{
			$data['status'] = '0';		//修改state失败处理
			$this->ajaxReturn($data);
		}	
	}
	
	
	public function DeleteFriend(){
		$fid = $_GET['fid'];
		$deletefriend = M('friend');
		if($deletefriend->where('fid='.$fid)->delete()){
			$deletefriend2 = M('friend');
			$deletefriend2->where('uid='.$fid)->delete();
			$this->success('删除好友成功！<(￣︶￣)>');
		}else{
			$this->error('删除失败，请稍后再试！(；′⌒`)');
		}
	}
	
}


?>
