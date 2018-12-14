// UI-Alerts.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function() {


    var alert_preview = $("#demo-preview-alert").children(".alert"),
        alert_thumb = $(".demo-thumb-alert"),
        select_layout = $("#demo-alert-layout"),
        select_style = $("#demo-alert-style"),
        select_animin = $("#demo-alert-animin"),
        select_animout = $("#demo-alert-animout"),
        input_sticky = $("#demo-sticky-alert"),
        input_xbtn = $("#demo-close-btn"),
        btn_alert = $("#demo-add-alert"),
        js_code = $("#demo-jsout"),
        alert_layout = select_layout.val(),
        alert_style = select_style.val(),
        sticky_alert = input_sticky.prop("checked"),
        closebtn_alert = input_xbtn.prop("checked"),
        alert_type = alert_thumb.filter(".selected").find(".hidden").text(),
        style_class = "alert-primary alert-success alert-info alert-warning alert-danger alert-purple alert-mint alert-pink alert-dark",
        alert_content = [{
                type: '<strong>Well done!</strong> You successfully read this important alert message.'
            }, {
                type: '<h4 class="alert-title">You have got 30 Messages</h4><p class="alert-message">30 newly unread messages in your <a href="#" class="alert-link text-bold">inbox</a></p>'
            }, {
                type: '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="demo-psi-gear icon-2x"></i></span></div><div class="media-body"><h4 class="alert-title">Server Load Limited</h4><p class="alert-message">Database server has reached its daily capicity</p></div>'
            }, {
                type: '<h4 class="alert-title">Oh snap! You got an error!</h4><p class="alert-message">Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p><div class="mar-top"><button class="btn btn-dark" type="button">Take this action</button> <button class="btn btn-default" type="button">Or do this</button></div>'
            }
        ],
        check_closebtn = function() {
            var btn_stat = input_xbtn.prop("checked")
            closebtn_alert = btn_stat;
            if (btn_stat) {
                alert_preview.prepend('<button class="close"><i class="pci-cross pci-circle"></i></button>');
            } else {
                alert_preview.find('.close').remove();
            }
        };


    alert_thumb.on("click", function(e) {
        e.preventDefault();
        alert_thumb.removeClass("selected");
        alert_type = $(this).find(".hidden").text();
        $(this).addClass("selected");

        if (alert_type == "floating") {
            select_animin.prop("disabled", false);
            select_animout.prop("disabled", false);
        } else {
            select_animin.prop("disabled", true);
            select_animout.prop("disabled", true);
        }

    });
    select_layout.on("change", function() {
        alert_layout = select_layout.val();
        alert_preview.html(alert_content[alert_layout].type);
        check_closebtn();
    });
    select_style.on("change", function() {
        alert_style = select_style.val();
        alert_preview.removeClass(style_class).addClass("alert-" + alert_style);
    });
    input_sticky.on("change", function() {
        sticky_alert = input_sticky.prop("checked");
    });
    input_xbtn.on("change", check_closebtn);
    check_closebtn();


    btn_alert.on("click", function(e) {
        e.preventDefault();
        $.niftyNoty({
            type: alert_style,
            container: alert_type,
            html: alert_content[alert_layout].type,
            closeBtn: closebtn_alert,
            floating: {
                position: "top-right",
                animationIn: select_animin.val(),
                animationOut: select_animout.val()
            },
            focus: true,
            timer: input_sticky.prop("checked") ? 2500 : 0
        });
    });



    var onshow = $("#demo-noty-onshow"),
        onshown = $("#demo-noty-onshown"),
        onhide = $("#demo-noty-onhide"),
        onhidden = $("#demo-noty-onhidden");

    onshow.on("click", function() {
        $.niftyNoty({
            type: 'purple',
            container: 'floating',
            title: 'onShow Callback',
            message: 'This event fires immediately when the show instance method is called.',
            closeBtn: false,
            timer: 1500,
            onShow: function() {
                alert("onShow Callback");
            }
        });
    });

    onshown.on("click", function() {
        $.niftyNoty({
            type: 'danger',
            container : 'floating',
            title : 'onShown Callback',
            message : 'This event is fired when the modal has been made visible to the user (will wait for CSS transitions to complete).',
            closeBtn : false,
            timer : 1500,
            onShown:function(){
                alert("onShown Callback");
            }
        });
    });

    onhide.on("click", function() {
        $.niftyNoty({
            type: 'warning',
            container : 'floating',
            title : 'onHide Callback',
            message : 'This event is fired immediately when the hide instance method has been called.',
            closeBtn : false,
            timer : 1500,
            onHide:function(){
                alert("onHide Callback");
            }
        });
    });

    onhidden.on("click", function() {
        $.niftyNoty({
            type: 'info',
            container : 'floating',
            title : 'onHidden Callback',
            message : 'This event is fired when the notification has finished being hidden from the user (will wait for CSS transitions to complete).',
            closeBtn : false,
            timer : 1500,
            onHidden:function(){
                alert("onHidden Callback");
            }
        });
    });

})
