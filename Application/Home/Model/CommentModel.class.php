<?php
namespace Home\Model;
use Think\Model\RelationModel;

class CommentModel extends RelationModel{
	protected $_validate = array(	
		array('comment','require','评论不能为空!'),
	);
	
	protected $_link = array(
		/*'reply'=>array(
			'mapping_type'=> self::HAS_MANY,
			'class_name'=>'reply',
			'foreign_key'=>'comment_id',
			'mapping_name'=>'Cmt_reply',
			'relation_deep' => true,
		),*/
		
		'user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'user',
			'foreign_key'=>'from_uid',
			'mapping_fields'=>'username,pic',
			'as_fields'=>'username:reply_name,pic:popic',
		),
		
	);
	
}

?>