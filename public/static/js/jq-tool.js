/**
 * jq 工具函数 插件
 * Created by knight on 2017/5/4.
 */
;(function(){
    $.extend({
        is_null : function(data) { //判断空
            return (data == "" || data == undefined || data == null || data == 0 || data == {} || data==[]) ? true : false;
        },
        reload:function(){
            window.location.reload();
        }
    });

    /**
     *  表单提交
     * @param options
     */
    $.fn.formSubmit = function(options){
        var defaults = {
            url:'',
            method:'post',
            async:true,
            params:{},
            onSubmit:function(){},
            success:function(){},
        }
        var setting = $.extend(defaults,options);
        var formData = {};
        $.each(this.serializeArray(), function (k,v) {
            if (v.name !== undefined) {
                formData[v.name] = v.value;
            }
        });
        setting.params = $.extend(setting.params,formData);
        $.ajax({
            url:setting.url,
            type:setting.method,
            async:setting.async,
            data:setting.params,
            beforeSend:function(){
                setting.onSubmit(formData);
            },
            success:function(result){
                setting.success(result);
            },
        });
    };

    /**
     *  form表单加载数据
     * @param data
     */
    $.fn.formLoad = function(data){
        $form = this;
        //input框
        $.each(data,function(k,v){
            var $obj = $form.find("[name="+k+"]");
            $obj.each(function(k1,v1){
                if($obj.prop('type') == 'radio'){
                    if($(this).val() == v){
                        $(this).prop('checked','checked');
                        return false;
                    }
                } else {
                    $(this).val(v);
                    return false;
                }
            });
        });
    }
})(jQuery,window,document);