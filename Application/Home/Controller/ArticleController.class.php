<?php
namespace Home\Controller;
use Think\Controller;


class ArticleController extends Controller{	
	
	public function article(){	
		if($_GET['id']){
			$id = $_GET['id'];
		}else{
			$id = "1";
		}
		$where['id'] = $id;
		
		$this->lastvisitor($id);
		
		$art = D('ArticleView');
		$article = $art->where($where)->find();
		$condition['Lid'] = $article['author_id'];
		$this->assign('article',$article);
		$favorite = M('favorite');
		$num = $favorite->where($condition)->count();
		$this->assign('num',$num);
		$artlist = $art->where('author_id='.$article['author_id'])->order('release_time desc')->limit(10)->select();
		$this->assign('artlist',$artlist);
		
		
		$comment = D('Comment'); 
		$what['article_id'] = $id;
		$count = $comment->where($what)->count();
		$Page  = new \Think\Page($count,8);
		$show  = $Page->show();		
		$list = $comment->where($what)->relation(true)->order('time asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$Tool = new \Org\Util\Tool();
			
		foreach($list as $key => $value){
			$check['comment_id'] = $value['id'];
			$reply = D('replyView');
			$result = $reply->where($check)->select();
			$re = $Tool->tree($result);
			foreach($re as $k => $val){
				if($value['id']==$val['comment_id'])
				$list[$key]['replylist'][] = $val;
			}
		}
		$this->assign('empty','<p class="empty">还没人评论过哦！(￣^￣)</p>');
		$this->assign('list',$list);
		$this->assign('page',$show);		
		$this->display();
		
	}
	
	public function lastvisitor($id){
		$Aid = $id;
		$lastvisitor = D('CommentView');
		$visitor = $lastvisitor->where('article_id='.$Aid)->order('time desc')->limit(8)->select();
		$this->assign('visitor',$visitor);
	}
	
	
	public function addreply(){
		$data['content'] = nl2br($_POST['content']);
		$data['from_uid'] = $_POST['from_uid'];
		$data['to_uid'] = $_POST['to_uid'];
		$data['comment_id'] = $_POST['comment_id'];
		$data['reply_id'] = $_POST['reply_id'];
		$data['time'] = date("Y-m-d H:i:s" ,time());
		$reply = M('reply');		
		if($reply->add($data)){
			$data['status']= 1;
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status']= 0;
			$this->ajaxReturn($data,'JSON');
		}	
	}
	
	public function addcomment(){
		$data['article_id'] = $_POST['article_id'];
		$data['from_uid'] = $_POST['from_uid'];
		$data['content'] = nl2br($_POST['content']);
		$data['time'] = date("Y-m-d H:i:s" ,time());
		$comment = M('comment');
		if($comment->add($data)){
			$data['status']= 1;
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status']= 0;
			$this->ajaxReturn($data,'JSON');
		}
	}
	
}


?>
