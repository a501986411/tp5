<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\project\tp5\public/../application/admin\view\menu_manage\index.html";i:1494237284;s:66:"E:\project\tp5\public/../application/admin\view\layout\layout.html";i:1494236173;}*/ ?>
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
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>bootstrap-table/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>css/bootstrap-dialog.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>css/common.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>css/menu.css">


    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo STATIC_PATH; ?>bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="<?php echo STATIC_PATH; ?>bootstrap-table/dist/locale/bootstrap-table-zh-CN.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/jqUnitCookie.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/jq-tool.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>js/bootstrap-dialog.min.js"></script>
</head>

<body>
<!--顶部导航条-->
<nav class="navbar best-top-menu">
    <div class="container-fluid">
        <div class="navbar-collapse collapse extend-width no-pd-lf no-pd-rt">
            <ul class="nav navbar-nav fr menu-font-color">
                <li><a href="" class="menu-font-color">安全退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
    use think\Db;
    use \PhpTree;
    $menuList = Db::query('select * from admin_menu where status=1');
    $tree = new PhpTree();
    $menuTree = $tree->makeTree($menuList);
?>
<nav class="navbar no-bd-tp no-mg-bt no-bd-bt no-bd-lf no-bd-rt">
    <div class="container-fluid no-pd-lf no-pd-rt no-mg-rt">
        <div id="navbarTop2" class="navbar-collapse collapse extend-width no-pd-lf no-pd-rt first-menu-bg-color">
            <ul class="nav navbar-nav navbar-left">
                <?php
                    foreach($menuTree as $k=>$value){
                        if($value['pid'] == 0){
                        echo '<li class="first-menu" data-id="'.$value['id'].'"><a href="javascript:void(0);" class="menu-font-color">'.$value['name'].'</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container no-mg-lf no-mg-rt extend-width">
    <div class="row">
        <div class="col-sm-3 col-md-1 sidebar no-pd-lf no-pd-rt">
            <?php foreach($menuTree as $k=>$v):?>
            <ul class="nav nav-sidebar hidden pid-<?php echo $v['id']; ?>">
                <?php if(isset($v['children']) && !empty($v['children'])):foreach($v['children'] as $k1=>$v1):?>
                    <li class="active second-menu "><a href="<?php echo url($v1['url'],['menuId'=>$v1['pid']]); ?>"><?php echo $v1['name']; ?></a></li>
                    <?php endforeach; endif;?>
            </ul>
            <?php endforeach;?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-2 main no-mg-lf no-pd-rt">
            <div class="panel">
                <div id="menu_table_btn">
    <button type="button" class="btn btn-success" id="add_menu">新增</button>
    <button type="button" class="btn btn-info" id="use_true">启用</button>
    <button type="button" class="btn btn-warning" id="use_false">停用</button>
</div>
<div class="table-responsive">
    <table id="menu_table">
    </table>
</div>
<script>
    (function(){
        var $table = $("#menu_table");
        var $addMenu = $('#add_menu');
        var $useTrue = $('#use_true');
        var $useFalse = $('#use_false');
        $table.bootstrapTable({
            url:"<?php echo url('/MenuManage/getList'); ?>",
            idField:'id',
            search:true,
            searchOnEnterKey:false,
            clickToSelect:true,
            striped:true,
            pagination:true,
            pageSize:15,
            toolbar:'#menu_table_btn',
            columns:[
                {field:'checked',title:'选择',checkbox:true},
                {field:'name',title:'名称'},
                {field:'pid',title:'上级菜单名称'},
                {field:'status',title:'状态'},
            ],
        });
        //新增操作
        $addMenu.click(function(){
            console.log(BootstrapDialog.getModal());
        });

        //停用操作
        $useFalse.click(function(){
            var selectRow = $table.bootstrapTable('getSelections');
            if($.is_null(selectRow)){
                return false;
            } else {
                var pkArr = [];
                $.each(selectRow,function(k,v){
                    pkArr.push(v.id);
                });
                $.post("<?php echo url('/MenuManage/operateStatus'); ?>",{pkArr:JSON.stringify(pkArr),status:2},function(result){

                    if(result.success){
                        $table.bootstrapTable('refresh',true);
                        BootstrapDialog.alert({
                            title:'提示',
                            message:result.msg,
                            type:BootstrapDialog.TYPE_SUCCESS,
                        });
                    } else {
                        BootstrapDialog.alert({
                            title:'提示',
                            message:result.msg,
                            type:BootstrapDialog.TYPE_WARNING,
                        });
                    }
                });
            }
        });
        //停用操作
        $useTrue.click(function(){
            var selectRow = $table.bootstrapTable('getSelections');
            if($.is_null(selectRow)){
                return false;
            } else {
                var pkArr = [];
                $.each(selectRow,function(k,v){
                    pkArr.push(v.id);
                });
                $.post("<?php echo url('/MenuManage/operateStatus'); ?>",{pkArr:JSON.stringify(pkArr),status:1},function(result){
                    if(result.success){
                        $table.bootstrapTable('refresh',true);
                        BootstrapDialog.alert({
                            title:'提示',
                            message:result.msg,
                            type:BootstrapDialog.TYPE_SUCCESS,
                        });
                    } else {
                        BootstrapDialog.alert({
                            title:'提示',
                            message:result.msg,
                            type:BootstrapDialog.TYPE_DANGER,
                        });
                    }
                });
            }
        });
    })(jQuery,window,document)

</script>



            </div>

        </div>
    </div>
</div>
</body>

<script>

    $('.first-menu').click(function(){
        var secondClass = $(this).data('id');
        var oldClass = $('.pid-'+secondClass).hasClass('hidden');
        if(oldClass){
            $('.second-menu').parent('ul').addClass('hidden');
            $('.pid-'+secondClass).removeClass('hidden');
        }
    });

    /**
     * 二级菜单联动
     */
    $(document).ready(function(){
        var menuId = $.cookie('adminmenuId');
        var oldClass = $('.pid-'+menuId).hasClass('hidden');
        if(oldClass){
            $('.second-menu').parent('ul').addClass('hidden');
            $('.pid-'+menuId).removeClass('hidden');
        }
        //展开对应三级菜单
        var bl = $('#second_menu_'+'<?php echo \think\Config::get('menuId'); ?>').parent('li').parent('ul').hasClass('hidden');
        if(bl){
            $('#second_menu_'+'<?php echo \think\Config::get('menuId'); ?>').parent('li').parent('ul').removeClass('hidden');
        }
    });
</script>
</html>