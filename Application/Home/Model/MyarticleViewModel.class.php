<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MyarticleViewModel extends ViewModel{
	public $viewFields = array(
		'article'=>array('id','title','kind','release_time','author_id','_type'=>'LEFT'),
		'user'=>array('id'=>'userid','username','_on'=>'article.author_id=user.id'),
	);
}

?>