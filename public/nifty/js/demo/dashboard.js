
// Dashboard.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function() {

    // NETWORK CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var dwData = [[1, 24], [2, 34], [3, 33], [4, 22], [5, 28], [6, 60], [7, 60], [8, 70], [9, 67], [10, 86], [11, 86], [12, 113], [13, 130], [14, 114], [15, 80], [16, 109], [17, 100], [18, 105], [19, 110], [20, 102], [21, 107], [22, 60], [23, 67], [24, 76], [25, 73], [26, 94], [27, 135], [28, 154], [29, 120], [30, 100], [31, 130], [32, 100], [33, 60], [34, 70], [35, 67], [36, 86], [37, 86], [38, 113], [39, 130], [40, 114], [41, 80], [42, 109], [43, 100], [44, 105], [45, 110], [46, 102], [47, 107], [48, 60], [49, 67], [50, 76], [51, 73], [52, 94], [53, 79]],
        upData = [[1, 2], [2, 22], [3, 7], [4, 6], [5, 17], [6, 15], [7, 17], [8, 7], [9, 18], [10, 18], [11, 18], [12, 29], [13, 23], [14, 10], [15, 22], [16, 7], [17, 6], [18, 17], [19, 15], [20, 17], [21, 7], [22, 18], [23, 18], [24, 18], [25, 29], [26, 13], [27, 2], [28, 22], [29, 7], [30, 6], [31, 17], [32, 15], [33, 17], [34, 7], [35, 18], [36, 18], [37, 18], [38, 29], [39, 23], [40, 10], [41, 22], [42, 7], [43, 6], [44, 17], [45, 15], [46, 17], [47, 7], [48, 18], [49, 18], [50, 18], [51, 29], [52, 13], [53, 24]];

    var plot = $.plot('#demo-chart-network', [
        {
            label: 'Download Speed',
            data: dwData,
            lines: {
                show: true,
                lineWidth: 0,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.2
                    }, {
                        opacity: 0.2
                    }]
                }
            },
            points: {
                show: false
            }
        },
        {
            label: 'Upload Speed',
            data: upData,
            lines: {
                show: true,
                lineWidth: 0,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.9
                    }, {
                        opacity: 0.9
                    }]
                }
            },
            points: {
                show: false
            }
        }
        ], {
        series: {
            lines: {
                show: true
            },
            points: {
                show: true
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#b5bfc5','#25476a'],
        legend: {
            show: true,
            position: 'nw',
            margin: [0, 0]
        },
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            show: false,
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            show: true,
            ticks: 10,
            tickColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: "<div class='flot-tooltip text-center'><h5 class='text-main'>%s</h5>%y.0 Mbps</div>"
        }
    });






    // HDD USAGE - SPARKLINE LINE AREA CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var hddSparkline = function() {
        $("#demo-sparkline-area").sparkline([57,69,70,62,73,79,76,77,73,52,57,50,60,55,70,68,57,62,53,69,59,67,69,58,50,47,65], {
            type: 'line',
            width: '100%',
            height: '60',
            spotRadius: 4,
            lineWidth: 2,
            lineColor:'rgba(255,255,255,.85)',
            fillColor: 'rgba(0,0,0,0.1)',
            spotColor: 'rgba(255,255,255,.5)',
            minSpotColor: 'rgba(255,255,255,.5)',
            maxSpotColor: 'rgba(255,255,255,.5)',
            highlightLineColor : '#ffffff',
            highlightSpotColor: '#ffffff',
            tooltipChartTitle: 'Usage',
            tooltipSuffix:' %'

        });
    }



    // EARNING - SPARKLINE LINE CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var earningSparkline = function(){
        $("#demo-sparkline-line").sparkline([945, 754, 805, 855, 678, 987, 1026, 885, 878, 922, 875, ], {
            type: 'line',
            width: '100%',
            height: '60',
            spotRadius: 0,
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
    }



    // SALES - SPARKLINE BAR CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================

    var barEl = $("#demo-sparkline-bar");
    var barValues = [40,32,65,53,62,55,24,67,45,70,45,56,34,67,76,32,65,53,62,55,24,67,45,70,45,56,70,45,56,34,67,76,32,65,53];
    var barValueCount = barValues.length;
    var barSpacing = 1;
    var salesSparkline = function(){
         barEl.sparkline(barValues, {
            type: 'bar',
            height: 78,
            barWidth: Math.round((barEl.parent().width() - ( barValueCount - 1 ) * barSpacing ) / barValueCount),
            barSpacing: barSpacing,
            zeroAxis: false,
            tooltipChartTitle: 'Daily Sales',
            tooltipSuffix: ' Sales',
            barColor: 'rgba(0,0,0,.15)'
        });
    }


    $(window).on('resizeEnd', function(){
        hddSparkline();
        earningSparkline();
        salesSparkline();
    })
    hddSparkline();
    earningSparkline();
    salesSparkline();





    // PANEL OVERLAY
    // =================================================================
    // Require Nifty js
    // -----------------------------------------------------------------
    // http://www.themeon.net
    // =================================================================
    $('#demo-panel-network-refresh').niftyOverlay({
        iconClass : 'demo-psi-repeat-2 spin-anim icon-2x'
    }).on('click', function(){
        var $el = $(this), relTime;

        $el.niftyOverlay('show');


        relTime = setInterval(function(){
            $el.niftyOverlay('hide');
            clearInterval(relTime);
        },2000);
    });

	
	$(function(){
    //菜单点击
    $(".J_menuItem").on('click',function(){
        var url = $(this).attr('href');
		//alert("aaaaaaaa");
      //  $("#J_iframe").attr('src',url);
        return false;
    });
});

});
