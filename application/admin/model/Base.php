<?php
/**
 * 数据模型基类
 * User: Administrator
 * Date: 2017/6/16
 * Time: 16:01
 */

namespace app\admin\model;
use think\Model;

class Base extends Model
{
    protected function initialize()
    {
        parent::initialize();
    }

    /**
     * 获取table数据
     * @param $get
     * @return mixed
     */
    public function getTableList($get)
    {
        if(isset($get['order'])){ //排序
            $order = [];
            foreach($get['order'] as $k=>$v){
                $order[$get['columns'][$v['column']]['name']] = $v['dir'];
            }
            $this->order($order);
        }
        if(isset($get['search']['value'])){//条件
            $where = '';
            foreach ($get['columns'] as $k=>$v){
                if($v['searchable'] === "true" && !empty($get['search']['value'])){
                    $where = empty($where) ? $v['name'] : $where.'|'.$v['name'];
                }
            }
            if(!empty($where)){
                $this->where($where,'like','%'.$get['search']['value'].'%');
            }
        }
        $data['data'] = $this->limit($get['start'],$get['length'])->select(); //查询
        $data['recordsFiltered'] = !empty($where) ? $this->where($where,'like','%'.$get['search']['value'].'%')->count('id') : $this->count('id');//符合条件的记录数
        $data['recordsTotal'] = $data['recordsFiltered']; //总记录数
        $data['draw'] = $get['draw'];
        return $data;
    }
}