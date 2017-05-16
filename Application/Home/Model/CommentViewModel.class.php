<?php
namespace Home\Model;
use Think\Model\ViewModel;

class CommentViewModel extends ViewModel{
	public $viewFields = array(
		'comment'=>array('id','article_id','time','_type'=>'LEFT'),
		'user'=>array('id'=>'Uid','pic','_on'=>'comment.from_uid=user.id'),
	);
	
}

?>