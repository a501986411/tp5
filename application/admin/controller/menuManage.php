<?php
/**
 * 菜单管理
 * User: knight
 * Date: 2017/5/3
 * Time: 13:48
 */
namespace app\admin\controller;
use app\admin\Model\AdminMenu;
use think\image\Exception;
use think\Request;
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

	public function operateStatus()
	{
		if(input('?post.pkArr') && input('?post.status') ){
			$pkArr = json_decode(input('pkArr'),true);
			$status = input('status');
			try{
				$logic = new AdminMenuLogic();
				foreach($pkArr as $v){
					$logic->changeStatus($v,$status);
				}
			}catch (Exception $e){
			}
		} else {
			throw new Exception(lang('error param'));
		}
	}
}