<?php
   namespace app\admin\logic;
   use app\admin\logic\MenuLogic;
   use app\admin\model\AdminMenu;

   /**
	 * 菜单处理逻辑类
	 * User: knight
	 * Date: 2017/5/4
	 * Time: 17:49
	 */
	class AdminMenuLogic extends MenuLogic
	{
		public function __construct(AdminMenu $model)
		{
			parent::__construct();
			$this->model = $model;
		}
	}