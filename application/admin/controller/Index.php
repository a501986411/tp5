<?php
    namespace app\admin\controller;
    use app\admin\logic\ShowMenuLogic;
    use app\admin\model\AdminMenu;

    class Index extends App
    {

        /**
         * 主页面
         * @access public
         * @return \think\response\View
         * @author knight
         */
        public function index()
        {
            //不需要模板布局
            $this->view->engine->layout(false);
            $logic = new ShowMenuLogic(new AdminMenu());
            $menuList = $logic->getTreeMenuList();
            return view('',['menuList'=>$menuList,'userInfo'=>json_decode(cookie('user'),true)]);
        }

        /**
         * 默认显示页面
         * @access public
         * @return \think\response\View
         * @author knight
         */
        public function showIndex()
        {
            $this->view->engine->layout(false);
            return view();
        }


        public function createIndex()
        {
            return view();
        }

    }
