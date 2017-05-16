<?php
namespace Home\Controller;
use Think\Controller;

class MycommentController extends IsloginController{
	public function mycomment(){
		$mycomment = D('MycommentView');
		$id = $_SESSION['id'];
		$count = $mycomment->where('from_uid='.$id)->count();
		$Page = new \Think\Page($count,5);
		$show = $Page->show();	
		$result = $mycomment->where('from_uid='.$id)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		if($result){
			$this->assign('page',$show);
			$this->assign('result',$result);
		}
		$this->myreply();
		$this->display();
	}
	
	public function myreply(){
		$replylist = D('ReplyView');
		$id = $_SESSION['id'];
		$count = $replylist->where('from_uid='.$id)->count();
		$Page = new \Think\Page($count,5);
		$show1 = $Page->show();	
		$data = $replylist->where('from_uid='.$id)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		if($data){
			$this->assign('pagelist',$show1);
			$this->assign('data',$data);
		}
	}
	
	public function toarticle(){
		$data['comment_id'] = $_POST['comment_id'];
		$comment = M('comment');
		$result = $comment->where($data)->find();
		if($result){
			$json['article_id'] = $result['article_id'];
			$json['status'] = 1;
			$this->ajaxReturn($json,'JSON');
		}else{
			$json['status'] = 0;
			$this->ajaxReturn($json,'JSON');
		}
	}
	
	
}
	

?>
