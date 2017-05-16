<?php
namespace Home\Controller;
use Think\Controller;

class FavoriteController extends IsloginController{
	public function favorite(){
		$favorite = D('FavoriteView');
		$where['uid'] = $_SESSION['id'];
		$count = $favorite->where($where)->count();
		$Page = new \Think\Page($count,6);
		$show = $Page->show();
		$list = $favorite->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function addfavorite(){		//添加到关注列表
		$data['uid'] = $_POST['uid'];
		$data['Lid'] = $_POST['Lid'];
		$addfavorite = M('favorite');
		if($addfavorite->where($data)->find()){
			$json['status'] = 2;
			$this->ajaxReturn($json,'JSON');
		}else{
			if($addfavorite->add($data)){
				$json['status'] = 1;
				$this->ajaxReturn($json,'JSON');
				exit();
			}else{
				$json['status'] = 0;
				$this->ajaxReturn($json,'JSON');
				exit();
			}
		}	
	}
}

?>
