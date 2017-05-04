<?php
   namespace app\admin\logic;
   use app\admin\model\AdminMenu;
   use think\Model;
	/**
	 * 菜单处理逻辑类
	 * User: knight
	 * Date: 2017/5/4
	 * Time: 17:49
	 */
	class AdminMenuLogic extends Model
	{
		public function __construct()
		{
			 parent::__construct();
		}

		public function changeStatus($id,$status)
		{
			$model = new AdminMenu();
			$menu = $model->find($id);
			$menu->status = $status;
			if($menu->save() === false){
				return false;
			}
		}


		/**
		 * 检查是否存在子节点
		 * @access public
		 * @param $id
		 * @return bool
		 * @author knight
		 */
		protected function isHasChildNode($id){
			$model = new AdminMenu();
			$menu = $model->field(['id'])->where(['pid'=>$id])->find();
			if($menu->id){
				return true;
			}
			return false;
		}
	}