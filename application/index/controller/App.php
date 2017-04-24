<?php
	/**
	 *Action基类
	 * User: knight
	 * Date: 2017/4/24
	 * Time: 13:39
	 */
	namespace app\index\controller;
	use think\Request;
	use think\View;
	class App
	{
		protected $menuId;
		protected $view;
		public function __construct()
		{
			$this->view = new View();
			if(Request::instance()->has('menuId','get')){
				$this->menuId = input('get.menuId');
				$this->view->assign('menuId',$this->menuId);
			}
		}
	}