<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\project\tp5\public/../application/index\view\index\createindex.html";i:1492677102;s:66:"E:\project\tp5\public/../application/index\view\layout\layout.html";i:1492678010;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>后台开发模板</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>css/common.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>css/menu.css">
</head>
<body>
<!--顶部导航条-->
<nav class="navbar best-top-menu">
    <div class="container-fluid">
        <div class="navbar-collapse collapse extend-width no-pd-lf no-pd-rt">
            <ul class="nav navbar-nav fr">
                <li><a href="#">电商中心</a></li>
                <li><a href="#">OA系统</a></li>
                <li><a href="#">消息中心</a></li>
                <li><a href="#">帮助中心</a></li>
                <li><a href="../../../../../vue/html">安全退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar no-bd-tp no-mg-bt">
    <div class="container-fluid no-pd-lf no-pd-rt no-mg-rt">
        <div id="navbarTop2" class="navbar-collapse collapse extend-width no-pd-lf no-pd-rt first-menu-bg-color">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">卡车业务</a></li>
                <li><a href="#">配件业务</a></li>
                <li><a href="#">维修业务</a></li>
                <li><a href="#">综合业务</a></li>
                <li><a href="#">外勤中心</a></li>
                <li><a href="#">优惠中心</a></li>
                <li><a href="#">商品管理</a></li>
                <li><a href="#">财务管理</a></li>
                <li><a href="#">报表中心</a></li>
                <li><a href="#">设置中心</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid no-pd-lf no-pd-rt no-mg">
    <div class="row no-mg" style="height:300px;">
        <div class="col-lg-1 no-pd-lf no-pd-rt">
            <nav class="navbar">
                <div class="container-fluid no-pd-lf no-pd-rt no-mg-rt">
                    <div class="navbar-collapse collapse no-pd-lf no-pd-rt extend-width">
                        <ul class="nav nav-divider">
                            <li class="dropdown">
                                <a href="#" role="button" class="second_menu">卡车采购<span class="caret"></span></a>
                                <ul class="navbar-nav hidden">
                                    <li class="third-menu-li"><a href="#">采购订单</a></li>
                                    <li class="third-menu-li"><a href="#">订单审批</a></li>
                                    <li class="third-menu-li"><a href="#">厂家排产</a></li>
                                    <li class="third-menu-li"><a href="#">底盘上线</a></li>
                                    <li class="third-menu-li"><a href="#">底盘下线</a></li>
                                    <li class="third-menu-li"><a href="#">在途改装长</a></li>
                                    <li class="third-menu-li"><a href="#">改装待上线</a></li>
                                    <li class="third-menu-li"><a href="#">上装申请</a></li>
                                    <li class="third-menu-li"><a href="#">上装审批</a></li>
                                    <li class="third-menu-li"><a href="#">改装上线</a></li>
                                    <li class="third-menu-li"><a href="#">改装下线</a></li>
                                    <li class="third-menu-li"><a href="#">在途中转库</a></li>
                                    <li class="third-menu-li"><a href="#">中转库待发车</a></li>
                                    <li class="third-menu-li"><a href="#">在途经销商</a></li>
                                    <li class="third-menu-li"><a href="#">验收入库</a></li>
                                    <li class="third-menu-li"><a href="#">采购列表</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-divider">
                            <li class="dropdown">
                                <a href="#" role="button" class="second_menu">卡车投放<span class="caret"></span></a>
                                <ul class="navbar-nav hidden">
                                    <li class="third-menu-li"><a href="#">投放申请</a></li>
                                    <li class="third-menu-li"><a href="#">投放审批</a></li>
                                    <li class="third-menu-li"><a href="#">投放执行</a></li>
                                    <li class="third-menu-li"><a href="#">投放列表</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-11 bg-info">
        createIndex
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/bootstrap.min.js"></script>
<script>
    $('.second_menu').click(function(){
        var oldClass = $(this).next('ul').hasClass('hidden');
        $('.second_menu').next('ul').addClass('hidden');
        if(!oldClass){
            $(this).next('ul').addClass('hidden');
        } else{
            $(this).next('ul').removeClass('hidden');
        }

    });
</script>
</html>