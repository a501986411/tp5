<?php
/**
 *
 * 菜单模型
 * User: knight
 * Date: 2017/5/3
 * Time: 10:41
 */
namespace app\admin\Model;
use think\model;
class AdminMenu extends Model
{
	protected $_status_one = ['id'=>1,'name'=>'启用'];
	protected $_status_two = ['id'=>2,'name'=>'停用'];
	protected  function initialize(){
		parent::initialize();
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