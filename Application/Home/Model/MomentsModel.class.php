<?php
namespace Home\Model;
use Think\Model\RelationModel;

class MomentsModel extends RelationModel{
	protected $_link = array(
		'mmtlove'=>array(
			'mapping_type'=> self::HAS_MANY,
			'class_name'=> 'mmtlove',
			'foreign_key'=>'Cid',
			'mapping_name'=>'Loverlist',
			'mapping_fields'=>'Lover',
		),
		'user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'user',
			'foreign_key'=>'authod_id',
			'mapping_fields'=>'username,pic',
			'as_fields'=>'username:poname,pic:popic',
		),
		'mmtmess'=>array(
			'mapping_type'=>self::HAS_MANY,
			'class_name'=>'mmtmess',
			'foreign_key'=>'Cid',
			'mapping_name'=>'commentlist',
			'mapping_fields'=>'from_name,comments,is_reply,reply_name',
		),
		
   );
}

?>