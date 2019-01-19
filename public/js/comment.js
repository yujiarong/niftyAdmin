function notify(type, title, message )
{
	$.niftyNoty({
        type: type,
        container: 'floating',
        title: title,
        message: message,
        closeBtn : true,
        timer: 3000,
        floating: {
            position: "top-right",
            animationIn: 'zoomIn',
            animationOut: 'rollOut'
        },
    });
}

function niftydelete(id,url)
{
    bootbox.dialog({
        message: "您确定要删除此信息吗",
        title: "Delete",
        buttons: {
            success: {
                    label: "Cancel",
                    className: "btn-default",
            },
            danger: {
                    label: "Confirm!",
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            type        : 'post',
                            url         : url,
                            headers     : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data        : {'id':id},
                            async       : false, 
                            success     : function(e){
                                if(e.code  == 200){
                                    notify('success','success','您选中的信息已经删除了');
                                    setTimeout("window.location.reload()",2000);
                                }else{
                                    notify('warning',e.msg);
                                }
                            },
                            error    : function(e) {
                                notify('danger','出错了！请联系管理人员');
                            }
                        });
                    }
            }
        },
        nimateIn: 'zoomInDown',
        animateOut : 'zoomOutUp'
    });

}