<?php
   namespace app\admin\logic;
   use app\admin\logic\MenuLogic;
   use app\admin\model\AdminMenu;
   use think\Validate;

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

        /**
         * 获取菜单显示列表
         * @return false|\PDOStatement|string|\think\Collection
         */
		public function getList()
		{
			$list = $this->model->select();
			foreach($list as $k=>&$v){
				 $v->status_name = $v->status_name;
				 $v->pid_name = $v->pid_name;
				 $v = $v->toArray();
			}
			return $list;
		}

        /**
         * 获取table数据
         * @param $get
         * @return mixed
         */
		public function getTableList($get)
        {
            if(isset($get['order'])){ //排序
                $order = [];
                foreach($get['order'] as $k=>$v){
                    $order[$get['columns'][$v['column']]['name']] = $v['dir'];
                }
                $this->model->order($order);
            }
            $list = $this->model
                         ->limit($get['start'],$get['length'])
                         ->select();
            foreach($list as $k=>&$v){
                $v->status_name = $v->status_name;
                $v->pid_name = $v->pid_name;
                $v = $v->toArray();
            }
            $data['data'] = $list;
            $data['recordsFiltered'] = $this->model->count('id');
            $data['recordsTotal'] = $this->model->count('id');
            $data['draw'] = $get['draw'];
            return $data;
        }

		/**
		 * 修改或者保存菜单
		 * @access public
		 * @param array $data
		 * @return bool
		 * @author knight
		 */
		public function saveData($data)
		{
			$result = $this->model->allowField(true)->isUpdate($data['id']? true : false)->save($data);//保存
			if($result === false){
				return false;
			}
			return true;
		}
	}