<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	protected $_validate = array(	
		array('username','require','用户名必须填写！'),
		array('password','require','密码必须填写！'),
		array('date','require','生日必须填写！'),
		array('sex','require','性别必须填写！'),
		array('repassword','password','两次密码不相同！',0,'confirm'),
		array('verify','require','验证码必须填写！'),
		array('verify','CheckCode','验证码错误！',0,'callback',1),    //callback对应本类下的一个方法
		array('username','','用户已存在！',0,'unique',1),
	);
	protected function CheckCode($verify){
		if(md5($verify)!=$_SESSION['verify']){
			return false;
		}else{
			return true;
		}
	}
	
	/*protected $_link = array(
		'user'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Moments',
			'foreign_key'=>'authod_id',
			
		),
		
   );*/
}

?>