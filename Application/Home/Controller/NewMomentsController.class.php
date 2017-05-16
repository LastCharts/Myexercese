<?php
namespace Home\Controller;
use Think\Controller;

class NewMomentsController extends Controller{
	public function newmoments(){
		$this->display();
	}
	
	
	public function addmoments(){
		if($_FILES['pic']['tmp_name']!=''){
			$upload = new \Think\Upload();
			$upload->maxSize = 3145728;
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath = '/blog/Public/Image/Pic/';
			$upload->rootPath =  '../';
			$info = $upload->upload();
			if($info){
				foreach($info as $value){
					$picture .= $value['savepath'].$value['savename'];
					$picture = $picture.'&&&';
				}
			}
		}
		$picture = rtrim($picture,'&&&');
		$mmt['picture'] = $picture;
		$mmt['content'] = nl2br($_POST['contents']);
		$mmt['authod_id'] = $_POST['id'];
		$mmt['time'] = date('Y-m-d H:i:s',time());
		$moments = D('moments');
		$result = $moments->add($mmt);
		if($result){
			$this->success('发表成功啦~快去看看吧"づ｡◕‿‿◕｡)づ"',U('Moments/moments'));
		}else{
			$this->error('发表失败，可能出现了点小问题"ㄒoㄒ~~"');
		}
	}
}
?>