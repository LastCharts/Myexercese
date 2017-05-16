<?php
namespace Home\Model;
use Think\Model\ViewModel;

class ChatViewModel extends ViewModel{
	public $viewFields = array(			
		'message'=>array(
			'sender','receiver','content','receiverRead','_type'=>'LEFT'
		),
		'user'=>array(
			'pic'=>'sender_pic','_on'=>'message.sender=user.username'
		),
   );
}

?>