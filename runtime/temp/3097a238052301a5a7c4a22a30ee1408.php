<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"E:\project\tp5\public/../application/index\view\index\index.html";i:1492680200;s:66:"E:\project\tp5\public/../application/index\view\layout\layout.html";i:1493003869;}*/ ?>
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
            <ul class="nav navbar-nav fr menu-font-color">
                <li><a href="#" class="menu-font-color">电商中心</a></li>
                <li><a href="#" class="menu-font-color">OA系统</a></li>
                <li><a href="#" class="menu-font-color">消息中心</a></li>
                <li><a href="#" class="menu-font-color">帮助中心</a></li>
                <li><a href="" class="menu-font-color">安全退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar no-bd-tp no-mg-bt no-bd-bt no-bd-lf no-bd-rt">
    <div class="container-fluid no-pd-lf no-pd-rt no-mg-rt">
        <div id="navbarTop2" class="navbar-collapse collapse extend-width no-pd-lf no-pd-rt first-menu-bg-color">
            <ul class="nav navbar-nav navbar-left">
                <li class="first-menu" data-class = 'kc'><a href="#" class="menu-font-color">卡车业务</a></li>
                <li class="first-menu" data-class = 'pj'><a href="#" class="menu-font-color">配件业务</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">维修业务</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">综合业务</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">外勤中心</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">优惠中心</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">商品管理</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">财务管理</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">报表中心</a></li>
                <li class="first-menu"><a href="#" class="menu-font-color">设置中心</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-1 sidebar no-pd-lf no-pd-rt">
            <!--卡车业务-->
            <ul class="nav nav-sidebar hidden kc">
                <li class="active second-menu"><a href="#">卡车投放<span class="caret-up"></span></a></li>
                <ul class="nav hidden">
                    <li><a href="#">投放申请</a></li>
                    <li><a href="#">投放审批</a></li>
                    <li><a href="#">投放执行</a></li>
                </ul>

            </ul>
            <ul class="nav nav-sidebar hidden kc">
                <li class="active second-menu"><a href="#">卡车回收<span class="caret-up"></span></a></li>
            </ul>
            <!--配件业务-->
            <ul class="nav nav-sidebar hidden pj">
                <li class="active second-menu"><a href="#">配件采购<span class="caret-up"></span></a></li>
                <ul class="nav hidden">
                    <li><a href="#">采购申请</a></li>
                    <li><a href="#">采购审批</a></li>
                    <li><a href="#">厂家发货</a></li>
                    <li><a href="#">配件入库</a></li>
                    <li><a href="#">采购列表</a></li>
                </ul>
            </ul>
            <ul class="nav nav-sidebar hidden pj">
                <li class="active second-menu"><a href="#">配件销售<span class="caret-up"></span></a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-2 main">
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/bootstrap.min.js"></script>
<script>
    $('.first-menu').click(function(){
        var secondClass = $(this).data('class');
        var oldClass = $('.'+secondClass).hasClass('hidden');
        if(oldClass){
            $('.second-menu').parent('ul').addClass('hidden');
            $('.'+secondClass).removeClass('hidden');
        }
    });

    $('.second-menu').click(function(){
        var oldClass = $(this).next('ul').hasClass('hidden');
        $('.second-menu').next('ul').addClass('hidden');
        $('.second-menu').find('a').find('span').prop('class','caret-up');
        if(!oldClass){
            $(this).next('ul').addClass('hidden');
            $('.second-menu').find('a').find('span').prop('class','caret-up');
        } else{
            $(this).next('ul').removeClass('hidden');
            $('.second-menu').find('a').find('span').prop('class','caret');
        }

    });
</script>
</html>