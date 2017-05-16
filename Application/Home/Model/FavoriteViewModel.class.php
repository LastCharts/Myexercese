<?php
namespace Home\Model;
use Think\Model\ViewModel;

class FavoriteViewModel extends ViewModel{
	public $viewFields = array(
		'favorite'=>array('id','uid','_type'=>'LEFT'),
		'user'=>array('id'=>'targetid','username','age','birthday','sex','pic','mail','phonenum','desc'=>'userdesc','sign','_on'=>'favorite.lid=user.id'),
   );
}

?>