<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 10:01
 */

namespace app\admin\logic;


use app\admin\model\RouteService;
use think\Model;

class ServiceLogic extends Model
{
    protected $model;
    public function __construct(RouteService $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * 保存
     * @param $data
     * @return bool
     */
    public function saveLogic($data)
    {
        $result = $this->model->isUpdate($data['id'] ? true : false)->save($data);
        if($result === false){
            return false;
        }
        return true;
    }

    /**
     * 获取列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getList()
    {
        $list = $this->model->select();
        return $list;
    }

    /**
     * 删除服务器信息
     * @param $delPk
     * @return array
     */
    public function delData($delPk)
    {
        $result = $this->model
            ->where('id','in',$delPk)
            ->delete();
        if($result===false){
            return ['success'=>false,'msg'=>lang('error server')];
        }
        return ['success'=>true,'msg'=>lang('success options')];
    }


}