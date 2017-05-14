<?php
/**
 * 服务器管理
 * User: Administrator
 * Date: 2017/5/12
 * Time: 21:22
 */

namespace app\admin\controller;


use app\admin\logic\ServiceLogic;
use org\RouterosApi;
use think\Request;
use app\admin\Model\RouteService as Service;
class RouteService extends App
{

    public function index()
    {
//        $rosApi = new RouterosApi();
//        if($rosApi->connect('home.webok.me','api','api')){
//            $rosApi->write('/interface/wireless/registration-table/print',false);
//            $rosApi->write('=stats=');
//            $read = $rosApi->read(true);
//            echo '<pre>';
//            print_r($read);
//            echo '</pre>';die;
//            $rosApi->disconnect();
//        } else {
//            echo '失败';
//        }
//        die;
        return view();
    }

    /**
     * 获取列表
     */
    public function getList()
    {
        $logic = new ServiceLogic(new Service());
        $data = $logic->getList();
        return $data;
    }

    /**
     * 保存信息操作
     * @return array
     */
    public function save()
    {
        if(Request::instance()->isPost()){
            $data = input();
            $result = $this->validate($data,'ServiceInfo');
            if($result !== true){
                return ['success'=>false,'msg'=>$result];
            }
            $logic = new ServiceLogic(new Service());
            $result = $logic->saveLogic($data);
            if($result){
                return ['success'=>true,'msg'=>lang('success options')];
            }
            return ['success'=>false,'msg'=>lang('error server')];
        } else {
            throw new Exception(lang('error param'));
        }
    }

    /**
     * 删除操作
     * @return array
     */
    public function delData()
    {
        if(Request::instance()->has('pkArr')){
            $delPk = json_decode(input('post.pkArr'),true);
            $logic = new ServiceLogic(new Service());
            return $logic->delData($delPk);
        } else {
            throw new Exception(lang('error param'));
        }
    }
}