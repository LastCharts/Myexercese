<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MessageView2Model extends ViewModel{
	public $viewFields = array(			//我的好友申请结果的视图模型
		'addfriend'=>array('id','send_id','receive_id','state','_type'=>'LEFT'),
		'user'=>array('username','pic','_on'=>'addfriend.receive_id=user.id'),
   );
}

?>