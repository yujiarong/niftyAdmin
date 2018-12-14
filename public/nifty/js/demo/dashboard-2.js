
// Dashboard-2.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function() {

    // FLOT CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var d1 = [[0, 520], [1, 370], [2, 820], [3, 209], [4, 495], [5, 170], [6, 185], [7, 273]],
        d2 = [[0, 85], [1, 45], [2, 58], [3, 35], [4, 95], [5, 25], [6, 65], [7, 12]],
        d3 = [[0, 50], [1, 30], [2, 80], [3, 29], [4, 95], [5, 70], [6, 15], [7, 73]];

    $.plot("#demo-bar-chart", [
        {
            label: "Students",
            data: d1
        },{
            label: "Parents",
            data: d2
        },{
            label: "Teachers",
            data: d3
        }],{
        series: {
            bars: {
                show: true,
                lineWidth: 0,
                barWidth: 0.25,
                align: "center",
                order: 1,
                fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
            }
        },
        colors: ['#03a9f4', '#ffb300', '#e3e8ee'],
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 4, tickColor: 'rgba(0,0,0,.02)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: "<div class='flot-tooltip text-center'><h5 class='text-main'>%s</h5>%y.0 </div>"
        }
    });


});
