<?php
/**
 * 服务器管理
 * User: Administrator
 * Date: 2017/5/12
 * Time: 21:22
 */

namespace app\admin\controller;


use org\RouterosApi;

class RouteService extends App
{
    public function index()
    {
        $rosApi = new RouterosApi();
        if($rosApi->connect('home.webok.me','api','api')){
            $rosApi->write('/interface/wireless/registration-table/print',false);
            $rosApi->write('=stats=');
            $read = $rosApi->read(true);
            echo '<pre>';
            print_r($read);
            echo '</pre>';die;
            $rosApi->disconnect();
        } else {
            echo '失败';
        }
        die;
        return view();
    }
}