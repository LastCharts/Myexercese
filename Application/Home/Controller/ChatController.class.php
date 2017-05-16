<?php
namespace Home\Controller;
use Think\Controller;

class ChatController extends Controller{
	public function chat(){
		set_time_limit(0);
		$where['receiver'] = $_POST['receiver'];
		$where['sender'] = $_POST['sender'];
		$where['receiverRead'] = '0';     					
		while(true){
			$chat = D('ChatView');
			$result = $chat->where($where)->limit(1)->find();
			if($result){
				$chang['receiverRead'] = '1';
				M('message')->where($where)->save($chang);
				$result['status']=1;
				$this->ajaxReturn($result,'JSON');
			}
			$result1['receiver'] = $where['receiver'];
			$result1['sender'] = $where['sender'];
			$result1['status']=0;
			$this->ajaxReturn($result1,'JSON');
			usleep(1000);	
		}	
	}
	
		
}


?>
