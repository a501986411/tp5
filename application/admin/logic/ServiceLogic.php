<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 10:01
 */

namespace app\admin\logic;


use app\admin\model\RouteService;
use org\RouterosApi;
use think\image\Exception;
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

    public function getRosStatusList(){
        $list = $this->model->select();
        $rosApi = new RouterosApi();
        foreach ($list as $k=>&$v){
            $rosInfo = $this->getRosCpuInfo($rosApi,$v['domain'],$v['port'],$v['username'],$v['password']);
            $list[$k]->status = $rosInfo['status'];
            if($list[$k]->status){
                $list[$k]->uptime = str_replace(['w','d','h','m','s'],['周','天','小时','分','秒'],$rosInfo['uptime']);//运行时间
                $list[$k]->version = $rosInfo['version'];//ROS系统版本
                $list[$k]->memory_ratio = round((100-($rosInfo['free-memory']/$rosInfo['total-memory']) * 100),1)."%" ;//内存占用率
                $list[$k]->cpu_ratio = $rosInfo['cpu-load'].'%';
                $list[$k]->free_hdd_space = round($rosInfo['free-hdd-space']/(1024*1024),1);
                $list[$k]->active_num = $this->getPppInfo($rosApi,$v['domain'],$v['port'],$v['username'],$v['password']);
                $list[$k]->now_time = $this->getNowTime($rosApi,$v['domain'],$v['port'],$v['username'],$v['password']);
            }
        }
        return $list;
    }

    private function getRosCpuInfo($rosApi,$domain,$port,$username,$password)
    {
        $domain .= ':'.$port;
        if($rosApi->connect($domain,$username,$password)) {
            $rosApi->write('/system/resource/getall');
            $rosInfo = $rosApi->read(true);
            $rosApi->disconnect();
            $rosInfo[0]['status'] = true;
        } else {
            $rosInfo[0]['status'] = false;
        }
        return $rosInfo[0];
    }

    public function getPppInfo($rosApi,$domain,$port,$username,$password)
    {
        $domain .= ':'.$port;
        if($rosApi->connect($domain,$username,$password)) {
            $rosApi->write('/ppp/active/getall');
            $aUserInfo = $rosApi->read(true);
            $rosApi->disconnect();
            return count($aUserInfo);
        }
        return 0;
    }
    public function getNowTime($rosApi,$domain,$port,$username,$password)
    {
        $domain .= ':'.$port;
        if($rosApi->connect($domain,$username,$password)) {
            $rosApi->write('/system/clock/getall');
            $date = $rosApi->read(true);
            $rosApi->disconnect();
            return $date[0]['date'].' '.$date[0]['time'];
        }
        return '';
    }
}