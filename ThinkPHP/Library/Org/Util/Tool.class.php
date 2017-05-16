<?php
namespace Org\Util;

	/*
	 * 无限级分类
	 * 调用方法：
	 * 数据库字段：id(当前记录ID),pid(上级目录ID),level(目录级别)
	 * $list = 分类信息数组
	 * $Tree = new \Org\Util\Tree;
	 * $list = $Tree->tree($list);
	 * $this->assign('arrList', $list);
	 */
	class Tool {
		static public $treeList = array(); //存放无限分类结果如果一页面有多个无限分类可以使用 Tree::$treeList = array(); 清空
		/**
		 * 无限级分类
		 * access public
		 * @param Array $data        //数据库里获取的结果集
		 * @param Int $pid
		 * @param Int $count        //第几级分类
		 * return Array $treeList
		 */
		static public function tree(&$data,$reply_id = 0, $count = 1) {
			foreach ($data as $key => $value){
				if($value['reply_id']==$reply_id ){
					$value['level'] = $count;
					//对标题进行格式化
					self::$treeList [] = $value;
					self::tree($data,$value['id'],$count + 1);
				}
			}
			return self::$treeList ;
		}

	}











?>