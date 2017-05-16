<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/16
 * Time: 19:34
 */

namespace app\admin\controller;


use app\admin\logic\AdminUserLogic;
use think\Exception;
use think\Request;
class AdminUser extends App
{
    public function index()
    {
        return view();
    }

    /**
     *  获取管理员用户列表
     */
    public function getList()
    {
        $logic = new AdminUserLogic(new \app\admin\model\AdminUser());
        return $logic->getList();
    }

    /**
     * 保存
     * @return array
     */
    public function save()
    {
        if(Request::instance()->isPost()){
            $data['username'] = input('username');
            $data['password_hash'] = input('password_hash');
            $data['id']       = input('id');
            $result = $this->validate($data,'AdminUserValidate');
            if($result !== true){
                return ['success'=>false,'msg'=>$result];
            }
            $logic = new AdminUserLogic(new \app\admin\model\AdminUser());
            return $logic->saveUser($data);
        } else{
            throw new Exception(lang('error param'));
        }
    }

    /**
     * 重置密码
     * @return mixed
     */
    public function pwdReset()
    {
        if(Request::instance()->has('id')){
            $logic = new AdminUserLogic(new \app\admin\model\AdminUser());
            return $logic->pwdReset(input('post.id'));
        }else{
            throw new Exception(lang('error param'));
        }
    }

    /**
     * 操作状态
     * @return array
     * @throws Exception
     */
    public function operateStatus()
    {
        if(Request::instance()->isPost()){
            $logic = new AdminUserLogic(new \app\admin\model\AdminUser());
            return $logic->operateStatus(input('post.lab'),json_decode(input('post.id'),true));
        }else{
            throw new Exception(lang('error param'));
        }
    }
}