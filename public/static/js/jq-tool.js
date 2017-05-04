/**
 * jq 工具函数 插件
 * 0 也返回true
 * Created by knight on 2017/5/4.
 */
;(function(){
    $.extend({
        is_null : function(data) {
            return (data == "" || data == undefined || data == null || data == 0 || data == {} || data==[]) ? true : false;
        }
    });
})(jQuery,window,document);