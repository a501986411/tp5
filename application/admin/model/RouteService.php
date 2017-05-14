<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 10:04
 */

namespace app\admin\model;


use think\Model;

class RouteService extends Model
{
    protected $autoWriteTimestamp = true;//自动写入时间戳
    public function initialize()
    {
        parent::initialize();
    }

}