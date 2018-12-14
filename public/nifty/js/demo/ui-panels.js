
// UI-Panels.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function() {


    // PANEL WITH BUTTONS - LOADING OVERLAY
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================
    $('.demo-panel-ref-btn').niftyOverlay({
        iconClass : 'demo-psi-repeat-2 spin-anim icon-2x'
    }).on('click', function(){
        var $el = $(this), relTime;
        $el.niftyOverlay('show');

        // Do something...



        relTime = setInterval(function(){
            // Hide the screen overlay
            $el.niftyOverlay('hide');

            clearInterval(relTime);
        },2000);
    });



    // PANEL WITH VARIETY OF COMPONENTS - DEMO AUTO CLOSE ALERTS
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================
    $('#demo-panel-alert').on('click', function(){
        $.niftyNoty({
            type: 'primary',
            container : '#demo-panel-w-alert',
            html : '<strong>Well done!</strong> You successfully read this important alert message.',
            focus: false,
            timer : 2000
        });
    });



    // PANEL WITH VARIETY OF COMPONENTS - DEMO STICKY ALERTS
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================
    $('#demo-panel-alert2').on('click', function(){
        $.niftyNoty({
            type: 'warning',
            container : '#demo-panel-w-alert',
            html : '<strong>Well done!</strong> You successfully read this important alert message.',
            focus: false
        });
    });



 });
