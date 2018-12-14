// Easy Pie Charts.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -



$(document).on('nifty.ready', function () {


    // EASY PIE CHART
    // =================================================================
    // Require easyPieChart
    // -----------------------------------------------------------------
    // http://rendro.github.io/easy-pie-chart/
    // =================================================================
    $('#demo-pie-1').easyPieChart({
        barColor :'#68b828',
        scaleColor: false,
        trackColor : 'rgba(0,0,0,.1)',
        lineCap : 'round',
        lineWidth : 7
    });

    $('#demo-pie-2').easyPieChart({
        barColor :'#68b828',
        scaleColor: false,
        trackColor : 'rgba(0,0,0,.1)',
        lineCap : 'square',
        lineWidth : 7
    });

    $('#demo-pie-3').easyPieChart({
        barColor :'#03a9f4',
        scaleColor: false,
        trackColor : 'rgba(0,0,0,.1)',
        lineWidth : 2
    });

    $('#demo-pie-4').easyPieChart({
        barColor :'#03a9f4',
        scaleColor: false,
        trackColor : 'rgba(0,0,0,.1)',
        lineWidth : 12
    });


    $('#demo-pie-5').easyPieChart({
        barColor :'#8465d4',
        scaleColor: false,
        trackColor : 'rgba(0,0,0,.1)',
        lineWidth : 7,
        size : 200
    });


    $('#demo-pie-6').easyPieChart({
        barColor :'#8465d4',
        scaleColor: '#969696',
        trackColor : 'rgba(0,0,0,.1)',
        lineWidth : 7,
        size : 200
    });

    $('#demo-pie-7').easyPieChart({
        barColor :'#efb239',
        scaleColor: '#969696',
        trackColor : 'rgba(0,0,0,.1)',
        lineWidth : 7,
        size : 200,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie-8').easyPieChart({
        barColor :'#efb239',
        scaleColor: '#969696',
        trackColor : 'rgba(0,0,0,.1)',
        lineWidth : 7,
        size : 200,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(60*percent/100) + ' Minutes');
        }
    });

    $('#demo-update-interval').on('click', function(){
        $('.demo-pie').each(function(){
            var newVal = Math.floor(100*Math.random());
            $(this).data('easyPieChart').update(newVal);
        });
    });

});
