// Nifty-demo.js
// ====================================================================
// Set user options for current page.
// This file is only used for demonstration purposes.
// ====================================================================
// - ThemeOn.net -


$(document).on('nifty.ready', function () {


    // SETTINGS WINDOW
    // =================================================================
    var contentIndi = '<div id="demo-settings-load" class="demo-settings-load"><i class="text-main demo-pli-repeat-2 icon-3x fa-spin"></i><br><h4 id="demo-get-status" class="text-bold text-uppercase">Loading...</h4><p id="demo-get-status-text">Please wait while the content is loaded</p></div>';
    var settingsComp = '<div id="demo-nifty-settings" class="demo-nifty-settings"><button id="demo-set-btn" class="btn"><i class="demo-psi-gear"></i></button><div id="demo-set-content" class="demo-set-content"></div></div>';

    $("body").append(settingsComp);

    $('#demo-set-btn').one('click', function(){
        $("#demo-nifty-settings").addClass("in");
        $("#demo-set-content").append(contentIndi);
        $.get("settings.html", function( data ) {
            $("#demo-set-content").empty().append(data);
            settingsInit();
        }).fail(function(e) {
            $("#demo-get-status").html(e.status);
            $("#demo-get-status-text").html(e.statusText);
        });
    });


    //Offcanvas initialize
    var nav_mode = function(){
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == "offcanvas"){return pair[1];}
        }
        return(false);
    }();
    if(nav_mode == "push" || nav_mode == "slide" ||nav_mode == "reveal"){
        $('.mainnav-toggle').removeClass('push slide reveal').addClass(nav_mode);
        $('#container').removeClass('mainnav-lg mainnav-sm').addClass('mainnav-out '+nav_mode);
    }


    var settingsInit = function(){
        var demoSet             = $('#demo-nifty-settings'),
            niftyContainer      = $('#container'),
            niftyMainNav        = $('#mainnav-container'),
            niftyAside          = $('#aside-container'),
            demoSetBtn          = $('#demo-set-btn');

        // BOXED LAYOUT
        // =================================================================
        var boxedLayoutCheckbox     = document.getElementById('demo-box-lay'),
            boxedLayoutImgBtn       = document.getElementById('demo-box-img'),
            boxedLayoutImgBox       = $('#demo-bg-boxed'),
            boxedLayoutBtnClose     = document.getElementById('demo-close-boxed-img'),
            blurredBgList           = $('#demo-blurred-bg'),
            polygonBgList           = $('#demo-polygon-bg'),
            abstractBgList          = $('#demo-abstract-bg');


        // Initialize
        // =================================================================
        $("#demo-set-tooltip").tooltip();

        if(niftyContainer.hasClass('boxed-layout')){
            boxedLayoutCheckbox.checked = true;
            boxedLayoutImgBtn.disabled = false;
        }else{
            boxedLayoutCheckbox.checked = false;
            boxedLayoutImgBtn.disabled = true;
        }

        if (boxedLayoutImgBox.hasClass('open')) {
            boxedLayoutImgBtn.checked = true;
        }else{
            boxedLayoutImgBtn.checked = false;
        }

        function bg_thumb_template(cat){
            var list = '';
            for (var i = 1; i < 17; i++) {
                list += '<a href="#" class="thumbnail box-inline"><img class="img-responsive" src="./premium/boxed-bg/'+cat+'/thumbs/'+i+'.jpg" alt="Background Image"></a>';
            }
            return list;
        }
        function add_bg_thumbs(){
            blurredBgList.append(bg_thumb_template('blurred'));
            polygonBgList.append(bg_thumb_template('polygon'));
            abstractBgList.append(bg_thumb_template('abstract'));

            var boxedBgthumb = boxedLayoutImgBox.find('.thumbnail');
            boxedBgthumb.on('click', function(){
                boxedBgthumb.removeClass('selected');
                var url = $(this).children('img').prop('src').replace('thumbs','bg');
                $(this).addClass('selected');
                niftyContainer.css({
                    'background-image': 'url('+url+')',
                    'background-repeat': 'no-repeat',
                    'background-size': 'cover',
                    'background-attachment': 'fixed'
                })
            });
        }



        // Boxed Layout Checkbox
        // =================================================================
        boxedLayoutCheckbox.onchange = function(){
            if (boxedLayoutCheckbox.checked) {
                niftyContainer.addClass('boxed-layout');
                boxedLayoutImgBtn.disabled = false;
            } else {
                niftyContainer.removeClass('boxed-layout').removeAttr( 'style' );
                boxedLayoutImgBtn.checked = false;
                boxedLayoutImgBtn.disabled = true;
                boxedLayoutImgBox.removeClass('open').find('.thumbnail').removeClass('selected');
            }
            $(window).trigger('resize');
        };

        // Image Buttons
        // =================================================================
        boxedLayoutImgBtn.onchange = function(){
            if (boxedLayoutImgBtn.checked) {
                boxedLayoutImgBox.addClass('open');
                if(!demoSet.hasClass('hasbgthumbs')){
                    add_bg_thumbs();
                    demoSet.addClass('hasbgthumbs')
                }
            } else {
                boxedLayoutImgBox.removeClass('open');
            }
        };

        // Close Button
        // =================================================================
        boxedLayoutBtnClose.onclick = function(){
            boxedLayoutImgBox.removeClass('open');
            boxedLayoutImgBtn.disabled = false;
            boxedLayoutImgBtn.checked = false;
        }






        // TRANSITION EFFECTS
        // =================================================================
        // =================================================================
        var effectList = 'easeInQuart easeOutQuart easeInBack easeOutBack easeInOutBack steps jumping rubber',
            animCheckbox = document.getElementById('demo-anim'),
            transitionVal = document.getElementById('demo-ease');


        // Initialize
        // =================================================================
        if(niftyContainer.hasClass('effect')){
            animCheckbox.checked = true;
            transitionVal.disabled = false;
        }else{
            animCheckbox.checked = false;
            transitionVal.disabled = true;
        }

        // Animations checkbox
        animCheckbox.onchange = function(){
            if (animCheckbox.checked) {
                niftyContainer.addClass('effect');
                transitionVal.disabled = false;
                transitionVal.value = 'effect';
            } else {
                niftyContainer.removeClass('effect ' + effectList);
                transitionVal.disabled = true;
            }
        };


        // Transition selectbox
        var effectArray = effectList.split(" ");
        for (i = 0; i < effectArray.length; i++) {
            if (niftyContainer.hasClass(effectArray[i])){
                transitionVal.value = effectArray[i];
                break;
            }
        }
        transitionVal.onchange = function(){
            var optionSelected = $("option:selected", this);
            var valueSelected = this.options[this.selectedIndex].value;
            if (valueSelected) {
                niftyContainer.removeClass(effectList).addClass(valueSelected);
            }
        };





        // NAVBAR
        // =================================================================
        // =================================================================
        var navbarFixedCheckbox = document.getElementById('demo-navbar-fixed');

        // Initialize
        // =================================================================
        if(niftyContainer.hasClass('navbar-fixed')){
            navbarFixedCheckbox.checked = true;
        }else{
            navbarFixedCheckbox.checked = false;
        }

        // Fixed Position
        // =================================================================
        navbarFixedCheckbox.onchange = function(){
            if (navbarFixedCheckbox.checked) {
                niftyContainer.addClass('navbar-fixed');
            } else {
                niftyContainer.removeClass('navbar-fixed');
            }

            // Refresh the aside, to enable or disable the "Bootstrap Affix" when the navbar in a "static position".
            niftyMainNav.niftyAffix('update');
            niftyAside.niftyAffix('update');
        };



        // FOOTER
        // =================================================================
        // =================================================================
        var footerFixedCheckbox = document.getElementById('demo-footer-fixed');


        // Initialize
        // =================================================================
        if(niftyContainer.hasClass('footer-fixed')){
            footerFixedCheckbox.checked = true;
        }else{
            footerFixedCheckbox.checked = false;
        }

        // Fixed Position
        // =================================================================
        footerFixedCheckbox.onchange = function(){
            if (footerFixedCheckbox.checked) {
                niftyContainer.addClass('footer-fixed');
            } else {
                niftyContainer.removeClass('footer-fixed');
            }
        };




        // NAVIGATION
        // =================================================================
        // =================================================================
        var collapsedCheckbox   = document.getElementById('demo-nav-coll'),
            navFixedCheckbox    = document.getElementById('demo-nav-fixed'),
            navProfileCheckbox  = document.getElementById('demo-nav-profile'),
            navShortcutCheckbox = document.getElementById('demo-nav-shortcut'),
            navOffcanvasSB      = document.getElementById('demo-nav-offcanvas'),
            navProfile          = $('#mainnav-profile'),
            navShortcut         = $('#mainnav-shortcut');



        // Initialize
        // =================================================================
        if(niftyContainer.hasClass('mainnav-fixed')){
            navFixedCheckbox.checked = true;
        }else{
            navFixedCheckbox.checked = false;
        }


        // Fixed Position
        // =================================================================
        if(niftyContainer.hasClass('mainnav-fixed')){
            navFixedCheckbox.checked = true;
        } else{
            navFixedCheckbox.checked = false;
        }
        navFixedCheckbox.onchange = function(){
            if (navFixedCheckbox.checked) {
                $.niftyNav('fixedPosition');
            } else {
                $.niftyNav('staticPosition');
            }
        };


        // Profile
        // =================================================================
        if(navProfile.hasClass('hidden')){
            navProfileCheckbox.checked = false;
        } else{
            navProfileCheckbox.checked = true;
        }
        navProfileCheckbox.onchange = function(){
            navProfile.toggleClass('hidden');
        };



        // Shortcut Buttons
        // =================================================================
        if(navShortcut.hasClass('hidden')){
            navShortcutCheckbox.checked = false;
        } else{
            navShortcutCheckbox.checked = true;
        }
        navShortcutCheckbox.onchange = function(){
            navShortcut.toggleClass('hidden');
        };



        // Collapsing/Expanding Navigation
        // =================================================================
        if(niftyContainer.hasClass('mainnav-sm')){
            collapsedCheckbox.checked = true;
        }else{
            collapsedCheckbox.checked = false;
        }
        collapsedCheckbox.onchange = function(){
            if (collapsedCheckbox.checked) {
                if(navOffcanvasSB.value != 'none'){
                    navOffcanvasSB.value = 'none';
                    location.href = location.protocol + '//' + location.host + location.pathname;
                }
                $.niftyNav('collapse');
            } else {
                $.niftyNav('expand');
            }
        };



        // Offcanvas Navigation
        // =================================================================
        navOffcanvasSB.onchange = function(){
            if (collapsedCheckbox.checked) {
                collapsedCheckbox.checked = false;
            }
            demoSet.removeClass('in');

            location.href = location.protocol + '//' + location.host + location.pathname + '?&offcanvas=' + this.options[this.selectedIndex].value;
        };

        if(nav_mode == "push" || nav_mode == "slide" ||nav_mode == "reveal"){
            $('.mainnav-toggle').removeClass('push slide reveal').addClass(nav_mode);
            navOffcanvasSB.value = nav_mode;
        }else{
            if(niftyContainer.hasClass('mainnav-sm')){
                collapsedCheckbox.checked = true;
            }else{
                collapsedCheckbox.checked = false;
            }
        }







        // ASIDE
        // =================================================================
        // =================================================================
        var asdVisCheckbox      = document.getElementById('demo-asd-vis'),
            asdFixedCheckbox    = document.getElementById('demo-asd-fixed'),
            asdFloatCheckbox    = document.getElementById('demo-asd-float'),
            asdPosCheckbox      = document.getElementById('demo-asd-align'),
            asdThemeCheckbox    = document.getElementById('demo-asd-themes');





        // Visible
        // =================================================================
        if(niftyContainer.hasClass('aside-in')){
            asdVisCheckbox.checked = true;
        } else{
            asdVisCheckbox.checked = false;
        }
        asdVisCheckbox.onchange = function() {
            if (asdVisCheckbox.checked) {
                $.niftyAside('show');
            } else {
                $.niftyAside('hide');
            }
        };



        // Fixed Position
        // =================================================================
        if(niftyContainer.hasClass('aside-fixed')){
            asdFixedCheckbox.checked = true;
        } else{
            asdFixedCheckbox.checked = false;
        }
        asdFixedCheckbox.onchange = function() {
            if (asdFixedCheckbox.checked) {
                $.niftyAside('fixedPosition');
            } else {
                $.niftyAside('staticPosition');
            };
        };


        // Floating Aside
        // =================================================================
        if(niftyContainer.hasClass('aside-float')){
            asdFloatCheckbox.checked = true;
        } else{
            asdFloatCheckbox.checked = false;
        }
        asdFloatCheckbox.onchange = function() {
            if (asdFloatCheckbox.checked) {
                niftyContainer.addClass('aside-float');
            } else {
                niftyContainer.removeClass('aside-float');
            };
            $(window).trigger('resize');
        };


        // Align
        // =================================================================
        if(niftyContainer.hasClass('aside-left')){
            asdPosCheckbox.checked = true;
        } else{
            asdPosCheckbox.checked = false;
        }
        asdPosCheckbox.onchange = function() {
            if (asdPosCheckbox.checked) {
                $.niftyAside('alignLeft');
            } else {
                $.niftyAside('alignRight');
            };
        };


        // Themes
        // =================================================================
        if(niftyContainer.hasClass('aside-bright')){
            asdThemeCheckbox.checked = false;
        } else{
            asdThemeCheckbox.checked = true;
        }
        asdThemeCheckbox.onchange = function() {
            if (asdThemeCheckbox.checked) {
                $.niftyAside('darkTheme');
            } else {
                $.niftyAside('brightTheme');
            };
        };



        // COLOR SCHEMES
        // =================================================================
        var themeBtn = $('.demo-theme'),
        changeTheme = function (themeName, type) {
            var themeCSS = $('#theme'),
                fileext = '.min.css',
                filename = 'css/themes/type-' + type + '/' + themeName + fileext;

            if (themeCSS.length) {
                themeCSS.prop('href', filename);
            } else {
                themeCSS = '<link id="theme" href="' + filename + '" rel="stylesheet">';
                $('head').append(themeCSS);
            }
        };

        $('#demo-theme').on('click', '.demo-theme', function (e) {
            e.preventDefault();
            var el = $(this);
            if (el.hasClass('disabled') || el.hasClass('active')) {
                return false;
            }
            changeTheme(el.attr('data-theme'), el.attr('data-type'));
            themeBtn.removeClass('active');
            el.addClass('active').tooltip('hide');
            return false;
        });


        demoSet.on('click', function(e){
            if (demoSet.hasClass('in')){
                if ($(e.target).is(demoSet)) demoSet.removeClass('in');
            }
        });

        demoSetBtn.on('click', function(){
            demoSet.toggleClass('in');
            return false;
        });
        $('#demo-btn-close-settings').on('click', function () {
            demoSetBtn.trigger('click')
        });
    };
});
