<?php
	/**
	 *Action基类
	 * User: knight
	 * Date: 2017/4/24
	 * Time: 13:39
	 */
	namespace app\admin\controller;
	use think\Request;

	class App
	{
		private $menuId;

		public function __construct()
		{
			if(Request::instance()->has('menuId')){
				$this->menuId = input('param.menuId');
				if($this->menuId){
					cookie('menuId',$this->menuId);
				}
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