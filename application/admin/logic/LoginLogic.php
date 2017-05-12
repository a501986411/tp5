<?php
	/**
	 *
	 * Created by PhpStorm.
	 * User: knight
	 * Date: 2017/5/11
	 * Time: 13:50
	 */
	namespace app\admin\logic;

	use app\admin\model\AdminUser;
	use think\Model;

	class LoginLogic extends Model
	{
		protected  $model;
		public function __construct(AdminUser $model)
		{
			parent::__construct();
			$this->model = $model;
		}


		/**
		 * @access public
		 * @param $username
		 * @param $password
		 * @return bool
		 * @author knight
		 */
		public function login($username,$password)
		{
			$userInfo = $this->model->where('username',$username)->field(['password_hash','username','id'])->find();
			if($this->checkPassword($password,$userInfo['password_hash'])){
				//密码验证成功 写cookie
				cookie('user',json_encode($userInfo,JSON_UNESCAPED_UNICODE));
				return true;
			}
			return false;
		}

		/**
		 * 验证密码
		 * 成功返回true,失败返回false
		 * @access public
		 * @param $password
		 * @param $passwordHash
		 * @return bool
		 * @author knight
		 */
		private function checkPassword($password,$passwordHash)
		{
			return password_verify($password,$passwordHash);
		}
	}