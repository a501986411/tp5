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

		/**
		 * 获取菜单下拉列表字段（id,name）
		 * @access public
		 * @return false|\PDOStatement|string|\think\Collection
		 * @author knight
		 */
		public function getMenuSelect()
		{
			$list = $this->model
					->field(['id','name'])
					->where('pid',0)
					->select();
			return $list;
		}
	}