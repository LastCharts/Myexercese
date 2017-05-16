<?php
namespace Home\Controller;
use Think\Controller;

class MyarticleController extends IsloginController{
	public function myarticle(){
		$id = $_SESSION['id'];
		$myarticle = D('MyarticleView');
		
		
		$where['author_id'] = $id;
		$count = $myarticle->where($where)->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$result = $myarticle->where($where)->order('release_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		if($result){
			$this->assign('result',$result);
			$this->assign('page',$show);
		}
		$this->display();
	}
	
	public function newarticle(){
		if($_FILES['upload']['tmp_name']!=''){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath  =      '/blog/Public/Image/Article/'; // 设置附件上传目录
			$upload->rootPath =  '../';
			$info   =   $upload->uploadOne($_FILES['upload']);
			if(!$info) {				
				$pic = "/blog/Public/Image/Article/art.jpg";
			}else{
				$pic = $info['savepath'].$info['savename'];
			}
		}else{
			$pic = "/blog/Public/Image/Article/art.jpg";
		}
		$article = D('article');
		$data['title'] = $_POST['title'];
		$data['desc'] = $_POST['desc'];
		$data['kind'] = $_POST['kind'];
		$data['content'] = $_POST['content'];
		$data['release_time'] = date("Y-m-d H:i:s" ,time());
		$data['author_id'] = $_SESSION['id'];
		$data['picture'] = $pic;
		$Aid = $article->add($data);
		if($Aid){
			$this->updateFa($Aid);
			$this->success('发表成功！看去看看吧<(￣︶￣)>');
		}else{
			$this->error('发表失败，貌似出现了点小问题(；′⌒`)');
		}
	}
	
	public function Delarticle(){
		$id = $_GET['id'];
		$delarticle = D('article');
		if($delarticle->where('id ='.$id)->delete()){
			$this->success('删除文章成功！<(￣︶￣)>');
		}else{
			$this->error('删除失败，请稍后再试！(；′⌒`)');
		}
	}
	
	public function Modify(){
		if($_FILES['re-upload']['tmp_name']!=''){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath  =      '/blog/Public/Image/Article/'.$_SESSION['username'].'/'; // 设置附件上传目录
			$upload->rootPath =  '../';
			$info   =   $upload->uploadOne($_FILES['re-upload']);
			if(!$info) {				
				$pic = "/blog/Public/Image/Article/art.jpg";
			}else{
				$pic = $info['savepath'].$info['savename'];
			}
		}
		$article = D('article');
		$id = $_POST['modifyid'];
		$data['title'] = $_POST['re-title'];
		$data['desc'] = $_POST['re-desc'];
		$data['kind'] = $_POST['re-kind'];
		if(isset($pic)){
			$data['picture'] = $pic;
		}
		$data['content'] = $_POST['content2'];
		if($article->where('id='.$id)->save($data)){
			$this->success('更新成功！看去看看吧<(￣︶￣)>~');
		}else{
			$this->error('更新失败，貌似出现了点小问题(；′⌒`)');
		}
	}

	
	public function show(){
		$id = $_POST['id'];
		$show = D('article');
		$result = $show->where('id='.$id)->find();
		if($result){
			$result['content'] = htmlspecialchars_decode($result['content']);
			$result['status'] = 1;
			$this->ajaxReturn($result);
		}else{
			$result['status'] = 0;
			$this->ajaxReturn($result);
		}
	}
	
	public function updateFa($article_id){				//提醒关注者更信息
		$Aid = $article_id;
		$id = $_SESSION['id'];
		$updateFa = M('favorite');
		$list = $updateFa->where('Lid='.$id)->select();
		foreach($list as $value){
			$value['is_update'] = '1';
			$value['article_id'] = $Aid;
			$updateFa->save($value);
		}
	}
	
	
}


?>
