<?php
namespace Home\Controller;
use Think\Controller;

class MessageController extends IsloginController{
	public function message(){
		$id = $_SESSION['id'];
		$addmessage = D('MessageView');
		$where['receive_id'] = $id;
		$where['state'] = '0';
		$result = $addmessage->where($where)->select();
		if($result){
			$this->assign('result',$result);	
		}
		$this->MessResult();	
		$this->FavoriteMess();
		$this->display();
	}
	
	public function Have_new(){
		$id = $_SESSION['id'];
		$have_new = D('MessageView');
		$where['receive_id'] = $id;
		$where['state'] = array('eq','0');
		if($have_new->where($where)->find()){		//判断“新的朋友”里有没新的信息
			$data['status'] = 1;
			$this->ajaxReturn($data,'JSON');
		}else{
			$have_new1 = D('MessageView');
			$which['send_id'] = $id;
			$which['state'] = array('neq','0');
			if($have_new1->where($which)->find()){	//判断“申请结果”里有没新的信息
				$data['status'] = 1;
				$this->ajaxReturn($data,'JSON');
			}else{
				$artmess = D('MessageView3');
				$what['uid'] = $id;
				$what['is_update'] = '1';
				if($artmess->where($what)->find()){	//判断“关注消息”里有没新的信息
					$data['status'] = 1;
					$this->ajaxReturn($data,'JSON');
				}else{
					$data['status'] = 0;
					$this->ajaxReturn($data,'JSON');
				}
			}	
		}
	}
	
	public function MessResult(){		//把信息显示到模板
		$id = $_SESSION['id'];
		$addmessage = D('MessageView2');
		$result1 = $addmessage->where('send_id='.$id.' AND state>0')->select();
		if($result1){
			$this->assign('result1',$result1);
		}
	}
	

	public function FavoriteMess(){		//获取关注者更新文章的信息
		$id = $_SESSION['id'];
		$updateMess = D('MessageView3');
		$where['uid'] = $id;
		$where['is_update'] = '1';
		$result = $updateMess->where($where)->select();
		if($result){
			$this->assign('result2',$result);
		}
	}
	
	
	public function deleteMess(){			//添加成功后或对方拒绝后删除添加申请信息
		$delmessage = D('addfriend');
		$where['send_id'] = $_POST['send_id'];
		$where['receive_id'] = $_POST['receive_id'];
		$where['state'] = $_POST['state'];
		if($delmessage->where($where)->delete()){
			$data['status'] = '1';
			$this->ajaxReturn($data);
		}else{
			$data['status'] = '0';
			$this->ajaxReturn($data);
		}
		
	}
	
	public function Haveread(){				//收到关注者更新后删除关注更新信息
		$updatestate = M('favorite');
		$where['uid'] = $_POST['uid'];
		$where['Lid'] = $_POST['Lid'];
		$result = $updatestate->where($where)->find();
		if($result){
			$updatestate->is_update = '0';
			$updatestate->article_id = '0';
			$updatestate->save();
			$data['status'] = '1';
			$this->ajaxReturn($data);
		}else{
			$data['status'] = '0';
			$this->ajaxReturn($data);
		}
	}
	
	
}

?>
