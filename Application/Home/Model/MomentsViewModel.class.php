<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MomentsViewModel extends ViewModel{
	public $viewFields = array(
		'moments'=>array('id','content','picture','time','_type'=>'LEFT'),
		'mmtlove'=>array('Lover','_on'=>'moments.id=mmtlove.Cid'),
		'user'=>array('username'=>'poname','pic','_on'=>'moments.authod_id=user.id'),
		'friend'=>array('uid','_on'=>'moments.authod_id=friend.fid'),
		
   );
}

?>