<?php
namespace Home\Model;
use Think\Model\ViewModel;

class ArticleViewModel extends ViewModel{
	public $viewFields = array(
		'article'=>array('id','title','content','author_id','picture','desc'=>'articledesc','release_time','_type'=>'LEFT'),
		'user'=>array('username','pic','sex','age','desc'=>'userdesc','sign','_on'=>'article.author_id=user.id'),
	);
}

?>