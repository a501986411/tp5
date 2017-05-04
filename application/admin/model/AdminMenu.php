<?php
/**
 *
 * 菜单模型
 * User: knight
 * Date: 2017/5/3
 * Time: 10:41
 */
namespace app\admin\model;
use think\Model;

class AdminMenu extends Model
{
	protected $_status_one = ['id' => 1, 'name' => '启用'];
	protected $_status_two = ['id' => 2, 'name' => '停用'];
	public $order = ['id'=>'asc'];
	protected function initialize($order=['id'=>'asc'])
	{
		parent::initialize($order);
	}



	/**
	 * 菜单状态获取器 自动调用
	 * @access public
	 * @param $value
	 * @return string
	 * @author knight
	 */
	public function getStatusAttr($value){
		switch($value){
			case $this->_status_one['id']:
				return $this->_status_one['name'];
			break;
			case $this->_status_two['id']:
				return $this->_status_two['name'];
				break;
			default :
				break;
		}
	}

	/**
	 * 上级菜单名称获取器 自动调用
	 * @access public
	 * @param $value
	 * @return mixed|string
	 * @author knight
	 */
	public function getPidAttr($value)
	{
		if($value){
			$adminMenu = $this->field('name')->find($value);
			if($adminMenu){
				return $adminMenu->getAttr('name');
			}
		}
	}

	/**
	 * 获取启用状态数据
	 * @access public
	 * @param $query
	 * @return void
	 * @author knight
	 */
	public function scopeStatusOne($query){
		$query->where('status',$this->_status_one['id']);
	}

}