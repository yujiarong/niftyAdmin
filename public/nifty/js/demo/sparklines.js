
// Sparklines.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function () {


    // SPARKLINES AREA CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var areaSparklines = function () {
        $('#demo-sparklines-area-1').sparkline([57, 69, 70, 62, 73, 79, 76, 77, 73, 52, 57, 50, 60, 55, 70, 68], {
            type: 'line',
            width: '100%',
            height: '70',
            spotRadius: 4,
            lineWidth: 0,
            lineColor: '#1abc9c',
            fillColor: '#1abc9c',
            spotColor: '#14a88b',
            minSpotColor: '#14a88b',
            maxSpotColor: '#14a88b',
            highlightLineColor: '#0e9d81',
            highlightSpotColor: '#0e9d81',
            tooltipChartTitle: 'Usage',
            tooltipSuffix: ' %'
        });
    };
    areaSparklines();

    var areaSparklines_2 = function () {
        $('#demo-sparklines-area-2').sparkline([57, 69, 70, 62, 73, 79, 76, 77, 73, 52, 57, 50, 60, 55, 70, 68], {
            type: 'line',
            width: '100%',
            height: '70',
            spotRadius: 4,
            lineWidth: 2,
            lineColor: 'rgba(255,255,255,.85)',
            fillColor: 'rgba(0,0,0,0.1)',
            spotColor: 'rgba(255,255,255,.8)',
            minSpotColor: 'rgba(255,255,255,.5)',
            maxSpotColor: 'rgba(255,255,255,.5)',
            highlightLineColor: '#ffffff',
            highlightSpotColor: '#ffffff',
            tooltipChartTitle: 'Usage',
            tooltipSuffix: ' %'
        });
    };
    areaSparklines_2();



    // SPARKLINES LINE CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var lineSparklines = function () {
        $('#demo-sparklines-line-1').sparkline([945, 754, 805, 855, 678, 987, 1026, 885, 878, 922, 875, ], {
            type: 'line',
            width: '100%',
            height: '70',
            spotRadius: 3,
            lineWidth: 2,
            lineColor: '#03a9f4',
            fillColor: false,
            minSpotColor: false,
            maxSpotColor: false,
            highlightLineColor: '#03a9f4',
            highlightSpotColor: '#03a9f4',
            tooltipChartTitle: 'Earning',
            tooltipPrefix: '$ ',
            spotColor: '#03a9f4',
            valueSpots: {
                '0:': '#03a9f4'
            }
        });
    };
    lineSparklines();


    var lineSparklines_2 = function () {
        $('#demo-sparklines-line-2').sparkline([945, 754, 805, 855, 678, 987, 1026, 885, 878, 922, 875, ], {
            type: 'line',
            width: '100%',
            height: '70',
            spotRadius: 3,
            lineWidth: 2,
            lineColor: '#ffffff',
            fillColor: false,
            minSpotColor: false,
            maxSpotColor: false,
            highlightLineColor: '#ffffff',
            highlightSpotColor: '#ffffff',
            tooltipChartTitle: 'Earning',
            tooltipPrefix: '$ ',
            spotColor: '#ffffff',
            valueSpots: {
                '0:': '#ffffff'
            }
        });
    };
    lineSparklines_2();



    // SPARKLINE BAR CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================

    var barEl = $('#demo-sparklines-bar-1');
    var barValues = [40, 32, 65, 53, 62, 55, 24, 67, 45, 70, 45, 56, 34, 67, 76, 32, 65, 53, 62, 55, 24, 67, 45, 70, 45, 56, 70, 45, 56, 34, 67, 76, 32, 65];
    var barValueCount = barValues.length;

    var barSpacing = 1;
    var barSparklines = function () {
        barEl.sparkline(barValues, {
            type: 'bar',
            height: 70,
            //barWidth: Math.round((barEl_2.parent().width() - ( barValueCount ) * barSpacing_2 ) / barValueCount),
            barWidth: Math.round((barEl.width() / barValueCount) - barSpacing),
            barSpacing: barSpacing,
            zeroAxis: false,
            tooltipChartTitle: 'Daily Sales',
            tooltipSuffix: ' Sales',
            barColor: '#9B59B6'
        });
    };
    barSparklines();



    var barEl_2 = $('#demo-sparklines-bar-2');
    var barSpacing_2 = 1;
    var barSparklines_2 = function () {
        barEl_2.sparkline(barValues, {
            type: 'bar',
            height: 70,
            barWidth: Math.round((barEl_2.width() / barValueCount) - barSpacing_2),
            barSpacing: barSpacing_2,
            zeroAxis: false,
            tooltipChartTitle: 'Daily Sales',
            tooltipSuffix: ' Sales',
            barColor: 'rgba(255,255,255,.7)'
        });
    };
    barSparklines_2();




    // SPARKLINE WITH RESPONSIVE LAYOUT
    // =================================================================
    $(window).on('resize', function () {
        areaSparklines();
        areaSparklines_2();
        lineSparklines();
        lineSparklines_2();
        barSparklines();
        barSparklines_2();
    });






    // =================================================================





    // Change the default settings as listed in the common options below
    $.fn.sparkline.defaults.common.lineColor = '#03a9f4';
    $.fn.sparkline.defaults.common.fillColor = 'rgba(0,0,0,0.1)';
    $.fn.sparkline.defaults.common.spotColor = '#14a88b';

    $.fn.sparkline.defaults.line.lineWidth = 1.5;
    $.fn.sparkline.defaults.common.width = '75';
    $.fn.sparkline.defaults.common.height = '29';

    $.fn.sparkline.defaults.bar.barWidth = '7';
    $.fn.sparkline.defaults.bar.barColor = '#7eaf55';
    $.fn.sparkline.defaults.bar.stackedBarColor = ['#7eaf55', '#ff4b4b'];
    $.fn.sparkline.defaults.bar.negBarColor = '#ff4b4b';


    /** Draw all the example sparklines on the index page **/

    // Line charts taking their values from the tag
    $('.demo-sparkline').sparkline();


    // Bar charts using inline values
    $('.demo-sparkbar').sparkline('html', {
        type: 'bar'
    });


    // Composite line charts, the second using values supplied via javascript
    $('#demo-compositeline').sparkline('html', {
        fillColor: false,
        changeRangeMin: 0,
        chartRangeMax: 10
    });
    $('#demo-compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
        composite: true,
        fillColor: false,
        lineColor: '#ff4b4b',
        changeRangeMin: 0,
        chartRangeMax: 10
    });


    // Line charts with normal range marker
    $('#demo-normalline').sparkline('html', {
        fillColor: false,
        normalRangeMin: -1,
        normalRangeMax: 8
    });


    // Bar + line composite charts
    $('#demo-compositebar').sparkline('html', {
        type: 'bar'
    });
    $('#demo-compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
        composite: true,
        fillColor: false,
        lineColor: '#ff4b4b'
    });


    // Discrete charts
    $('#demo-discrete1').sparkline('html', {
        type: 'discrete',
        xwidth: 18
    });
    $('#demo-discrete2').sparkline('html', {
        type: 'discrete',
        thresholdColor: '#ff4b4b',
        thresholdValue: 4
    });


    // Customized line chart
    $('#demo-linecustom').sparkline('html', {
        height: '1.5em',
        width: '8em',
        fillColor: '#eee',
        minSpotColor: false,
        maxSpotColor: false,
        spotColor: '#77f',
        spotRadius: 3
    });


    // Tri-state charts using inline values
    $('#demo-sparktristate').sparkline('html', {
        type: 'tristate'
    });
    $('#demo-sparktristatecols').sparkline('html', {
        type: 'tristate',
        colorMap: {
            '-2': '#fa7',
            '2': '#44f'
        }
    });


    // Pie charts
    $('.demo-sparkpie').sparkline('html', {
        type: 'pie',
        height: '50px',
        sliceColors: ['#03a9f4','#ff4b4b','#7eaf55']
    });



});
