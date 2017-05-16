<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/16
 * Time: 20:35
 */

namespace app\admin\validate;


use think\Validate;

class AdminUserValidate extends Validate
{
    protected $rule = [
        'username|用户名'=>'require|length:4,10',
        'password_hash|密码'=>'require|length:4,10'
    ];
    protected $msg = [
        'username.require' =>'用户名不能为空',
        'username.length' =>'用户名长度在4到10',
        'password_hash.require' =>'密码不能为空',
        'password_hash.length' =>'密码长度在4到10',
    ];
}