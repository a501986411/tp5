<?php
	/**
	 * 后台用户管理模型
	 * Created by PhpStorm.
	 * User: knight
	 * Date: 2017/5/11
	 * Time: 13:37
	 */

	namespace app\admin\model;
	use think\Model;
	class AdminUser extends Model
	{
		protected $_status_two = ['id' => 0, 'name' => '停用'];
		protected $_status_one = ['id' => 1, 'name' => '启用'];
		protected $insert = ['password_hash'];
		protected function initialize()
		{
			parent::initialize();
		}

		/**
		 * hash加密密码
		 * @access public
		 * @param $value
		 * @param $data
		 * @return bool|string
		 * @author knight
		 */
		public function setPasswordHashAttr($value,$data)
		{
			return password_hash($data['password'],PASSWORD_DEFAULT);
		}

	}