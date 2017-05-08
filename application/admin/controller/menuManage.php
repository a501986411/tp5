<?php
/**
 * 菜单管理
 * User: knight
 * Date: 2017/5/3
 * Time: 13:48
 */
namespace app\admin\controller;
use app\admin\Model\AdminMenu;
use think\Db;
use think\image\Exception;
use \app\admin\logic\AdminMenuLogic;

class MenuManage extends App
{

	public function __construct()
	{
		parent::__construct();
	}
	/**
	 * 菜单管理列表
	 * @access public
	 * @return \think\response\View
	 * @author knight
	 */
	public function index()
	{
		return view();
	}

	/**
	 * 菜单管理列表
	 * @access public
	 * @return false|\PDOStatement|string|\think\Collection
	 * @author knight
	 */
	public function getList(){
		$adminMenu = new AdminMenu(['id'=>'desc']);
		$list = $adminMenu->select();
		return $list;
	}

	/**
	 * 改变财当状态
	 * @access public
	 * @return void
	 * @author knight
	 */
	public function operateStatus()
	{
		if(input('?post.pkArr') && input('?post.status') ){
			$pkArr = json_decode(input('pkArr'),true);
			$status = input('status');
			Db::startTrans();
			try{
				$logic = new AdminMenuLogic(new AdminMenu());
				foreach($pkArr as $v){
					if(false === $logic->changeStatus($v,$status)){
						throw new Exception(lang('error server'));
					}
				}
				Db::commit();
				return ['success'=>true,'msg'=>lang('success options')];
			}catch (Exception $e){
				Db::rollback();
				return ['success'=>false,'msg'=>$e->getMessage()];
			}
		} else {
			throw new Exception(lang('error param'));
		}
	}
}