<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MessageViewModel extends ViewModel{
	public $viewFields = array(			//他人好友申请的视图模型
		'addfriend'=>array('id','send_id','receive_id','state','_type'=>'LEFT'),
		'user'=>array('username','pic','_on'=>'addfriend.send_id=user.id'),
   );
}

?>