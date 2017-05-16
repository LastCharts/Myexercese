<?php
namespace Home\Model;
use Think\Model\ViewModel;

class MmtmessViewModel extends ViewModel{
	public $viewFields = array(
		'moments'=>array('id','authod_id','content','time','_type'=>'LEFT'),
		'mmtmess'=>array('id','Uid','comments','_on'=>'moments.id=mmtmess.Cid'),
   );
}

?>