<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MessageView3Model extends ViewModel{
	public $viewFields = array(			//关注消息的视图模型
		'favorite'=>array('id','Lid','is_update','_type'=>'LEFT'),
		'article'=>array('title','_on'=>'favorite.Lid=article.author_id','_on'=>'favorite.article_id=article.id','_type'=>'RIGHT'),
		'user'=>array('username','pic','_on'=>'article.author_id=user.id'),
   );
}

?>