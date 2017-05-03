<?php
/**
 * 菜单管理
 * User: knight
 * Date: 2017/5/3
 * Time: 13:48
 */
namespace app\admin\controller;
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
}