<?php
namespace Home\Model;
use Think\Model\ViewModel;

class ReplyViewModel extends ViewModel{
	
	public $viewFields = array(
		'reply'=>array(
			'*','_type'=>'LEFT'
		),
		'user'=>array(
			'username'=>'replyname','pic'=>'reply_pic','_on'=>'user.id=reply.from_uid','_type'=>'LEFT'
		),
		'user1'=>array(
			'username'=>'be_replyname','pic'=>'be_replypic','_table'=> 'thinkphp_user','_as' => 'user1','_on'=>'user1.id=reply.to_uid'
		),
   );
	
}

?>