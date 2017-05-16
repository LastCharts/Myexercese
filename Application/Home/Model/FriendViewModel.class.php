<?php
namespace Home\Model;
use Think\Model\ViewModel;

class FriendViewModel extends ViewModel{
	public $viewFields = array(
		'friend'=>array(
			'id','uid','fid','_type'=>'LEFT'
		),
		'user'=>array(
			'username','pic','_on'=>'friend.uid=user.id','_type'=>'LEFT'
		),
		'user1'=>array(
			'username'=>'friendname','pic'=>'friendpic','online'=>'F_online','_table'=> 'thinkphp_user','_as' => 'user1','_on'=>'friend.fid=user1.id'
		),
   );
}

?>