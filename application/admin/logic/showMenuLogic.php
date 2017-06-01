<?php
	/**
	 *
	 * Created by PhpStorm.
	 * User: knight
	 * Date: 2017/6/1
	 * Time: 10:33
	 */
	namespace app\admin\logic;
	use org\PhpTree;
	use app\admin\model\AdminMenu;
	class ShowMenuLogic extends MenuLogic
	{
		public function __construct(AdminMenu $model)
		{
			parent::__construct();
			$this->model = $model;
		}

		/**
		 * 获取树形结构菜单用于显示
		 * @access public
		 * @return void
		 * @author knight
		 */
		public function getTreeMenuList()
		{
			$treeList = $this->model
				->where('status',self::STATUS_ONE)
				->select();
			foreach($treeList as $key=>&$value){
				$value = $value->toArray();
			}
			$tree = new PhpTree();
			$treeList = $tree->makeTree($treeList);
			return $treeList;
		}
	}