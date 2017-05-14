<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 9:42
 */

namespace app\admin\validate;


use think\Validate;

class ServiceInfo extends Validate
{
    protected $rule = [
        'name'=>'require|string|length:30',
        'ip'=>'require|unique:route_service',
        'domain'=>'unique:route_service',
        'port'=>'require|integer|length:4',
        'username'=>'require',
        'password'=>'require'
    ];
}