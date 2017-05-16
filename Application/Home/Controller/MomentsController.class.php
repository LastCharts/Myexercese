<?php
namespace Home\Controller;
use Think\Controller;

class MomentsController extends IsloginController{
	public function moments(){	
		$moments = D('Moments');
		$id = $_SESSION['id'];
		$friend = M('friend');
		$friend = $friend->where('uid='.$id)->field('fid')->select();
		$list[0] = $id;
		foreach($friend as $value){		
			$list[] = $value['fid'];				//把$friend这个二维数组转化成只包含fid的一维数组
		}
		$where['authod_id']= array('in',implode(',',$list));
		$count = $moments->where($where)->count();
		$Page = new \Think\Page($count,5);
		$show = $Page->show();
		$result = $moments->where($where)->relation(true)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($result as $key => $value){
			$result[$key]['picture'] = explode('&&&',$value['picture']);
			/*foreach($result as $k => $val){
				if($val['picture']['k']!='0' ||$val['picture']['k']!=''){	
					$result[$k]['picture'][$k] = explode('',$val['picture']['k']);
				}
			}*/
		}
		
		/*foreach($result as $key=>$value){		
			foreach($value['Loverlist'] as $ke=>$val){
				$result[$key]['Loverlist'][$ke] = $val['lover'];
			}			
		}*/
		
		if($result){
			$this->assign('info',$result);
			$this->assign('page',$show);
			$this->poinfo();
			$this->display();
		}else{
			$this->display();
		}
	}
	
	public function addgood(){
		$data['Cid'] = $_POST['Cid'];
		$data['Lover'] = $_POST['Lover'];
		$mmtlove = D('mmtlove');
		$result = $mmtlove->where($data)->count();
		if($result==0){
			if($mmtlove->create()){
				$mmtlove->add($data);
				$json['status']=1;
				$this->ajaxReturn($json,'JSON');
			}else{
				$json['status']=0;
				$this->ajaxReturn($json,'JSON');
			}
		}else{
			$json['num']=$result;
			$json['status']=2;
			$this->ajaxReturn($json,'JSON');
		}
		
	}
	
	public function addcomment(){
		$addcomment = D('mmtmess');
		$mess['Cid'] = $_POST['Cid'];
		$mess['from_name'] = $_POST['from_name'];
		$mess['comments'] = nl2br($_POST['comments']);
		$mess['reply_name'] = $_POST['reply_name'];
		$mess['is_reply'] = $_POST['is_reply'];
		if($mess['is_reply']!= 0 || $mess['is_reply']!= ''){
			$mess['comments'] = ltrim($mess['comments'],':');
		}
		if($addcomment->add($mess)){
			$data['status'] = 1;
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status'] = 0;
			$this->ajaxReturn($data,'JSON');
		}
	}
	
	public function poinfo(){
		$id = $_SESSION['id'];
		$info = M('user');
		$result = $info->where('id = '.$id)->find();
		$this->assign('result',$result);
	}
	
}
?>