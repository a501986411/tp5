<?php
	/**
	 *Action基类
	 * User: knight
	 * Date: 2017/4/24
	 * Time: 13:39
	 */
	namespace app\admin\controller;
	use app\admin\logic\LoginLogic;
    use app\admin\model\AdminUser;
    use think\Request;
    use think\Controller;
	class App extends Controller
	{
		private $menuId;
		protected $beforeActionList = [
		    'interceptor' ,//拦截器
        ];

		public function __construct()
		{
		    parent::__construct();
		}
        /**
         * 访问拦截器
         */
        protected function interceptor(){
            $logic = new LoginLogic(new AdminUser());
            if(!$logic->checkLoginStatus()){
                cookie('is_expire',200);
                $this->error(lang('login timeout'),url('/Login/index'));
            } else {
                cookie('user',cookie('user'));
            }
        }

		/**
		 * 空操作默认方法
		 * @access public
		 * @return string
		 * @author knight
		 */
		public function _empty()
		{
			return lang('error url');
		}

	}