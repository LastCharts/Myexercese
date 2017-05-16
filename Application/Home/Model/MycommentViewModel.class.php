<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MycommentViewModel extends ViewModel{
	public $viewFields = array(
		'comment'=>array(
			'id'=>'cmt_id','article_id','content'=>'cmt_content','time','_type'=>'LEFT'
		),
		'user'=>array(
			'id','username','pic','_on'=>'comment.from_uid=user.id'
		),
	);
}

?>