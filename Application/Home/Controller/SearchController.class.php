<?php
namespace Home\Controller;
use Think\Controller;

class SearchController extends Controller{
	public function search(){
		$data = $_POST['search'];
		$result = D(MyarticleView);
		$where['title'] = array('like',"%$data%");
		$count = $result->where($where)->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$result = $result->where($where)->order('release_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('result',$result);
		$this->assign('page',$show);
		$this->display();
	}
}

?>