<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
		if($_GET['id']){
			$id = $_GET['id'];
		}else if($_SESSION['id']){
			$id = $_SESSION['id'];
		}else{
			$this->error('请先登录(～￣▽￣)～',U('Login/login'));
		}
		$article = M('article');
		
		$class = new \Think\Cache\Driver\Memcache();
		$data = $class->get('key');
		$show = $class->get('key1');
		$po = $class->get('key2');
		if(!$data){
			$count = $article->where('author_id='.$id)->count();
			$Page = new \Think\Page($count,5);
			$show = $Page->show();
			$data = $article->where('author_id='.$id)->order('release_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$class->set('key',$data);
			$class->set('key1',$show);
		}
		if(!$po){
			$po = M('user')->where('id='.$id)->find();
			$class->set('key2',$po);
		}
		$this->assign('data',$data);
		$this->assign('page',$show);
		$this->assign('po',$po);
		$this->newpublic();
		$this->display();
    }
	
	public function newpublic(){
		$newpublic = M('article');
		$list = $newpublic->where(1)->order('release_time desc')->limit(10)->select();
		$this->assign('list',$list);
	}
	
}

?>