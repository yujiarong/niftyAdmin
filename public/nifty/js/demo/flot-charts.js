// Flot-Charts.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -



$(document).on('nifty.ready', function () {
    // FLOT AREA CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var pageviews = [[1, 1700], [2, 1500], [3, 1390], [4, 1550], [5, 1400], [6, 1350], [7, 1336], [8, 1245], [9, 1479], [10, 1595], [11, 1409], [12, 1500], [13, 1700], [14, 1920], [15, 1870], [16, 1650], [17, 1500], [18, 1650], [19, 1436], [20, 1395], [21, 1479], [22, 1595], [23, 1509], [24, 1550], [25, 1480], [26, 1390], [27, 1550], [28, 1400], [29, 1590], [30, 1436]],
        visitor = [[1, 856], [2, 889], [3, 854], [4, 958], [5, 994], [6, 1056], [7, 924], [8, 873], [9, 756], [10, 787], [11, 754], [12, 865], [13, 896], [14, 989], [15, 954], [16, 958], [17, 854], [18, 1056], [19, 1124], [20, 1183], [21, 1126], [22, 887], [23, 754], [24, 865], [25, 889], [26, 854], [27, 958], [28, 925], [29, 1056], [30, 984]];

    var plot = $.plot('#demo-flot-area', [
        {
            label: 'Pageviews',
            data: pageviews,
            lines: {
                show: true,
                lineWidth: 0,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.5
                    }, {
                        opacity: 0.5
                    }]
                }
            },
            points: {
                show: false,
                radius: 2
            }
            },
        {
            label: 'Visitors',
            data: visitor,
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
                show: false,
                radius: 4
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
        colors: ['#b5bfc5', '#efb239'],
        legend: {
            show: true,
            position: 'nw',
            margin: [15, 0]
        },
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });


    // FLOT LINE CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var pageviews = [[13, 1700], [14, 1920], [15, 1870], [16, 1650], [17, 1500], [18, 1650], [19, 1436], [20, 1395], [21, 1479], [22, 1595], [23, 1509], [24, 1550], [25, 1480], [26, 1390], [27, 1550], [28, 1400], [29, 1590], [30, 1436]],
        visitor = [[13, 896], [14, 989], [15, 954], [16, 958], [17, 854], [18, 1056], [19, 1124], [20, 1183], [21, 1126], [22, 887], [23, 754], [24, 865], [25, 889], [26, 854], [27, 958], [28, 925], [29, 1056], [30, 984]];

    var plot = $.plot('#demo-flot-line', [
        {
            label: 'Pageviews',
            data: pageviews,
            lines: {
                show: true,
                lineWidth: 2,
                fill: false
            },
            points: {
                show: true,
                radius: 4
            }
            },
        {
            label: 'Visitors',
            data: visitor,
            lines: {
                show: true,
                lineWidth: 3,
                fill: false
            },
            points: {
                show: true,
                radius: 4
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
        colors: ['#b5bfc5', '#177bbb'],
        legend: {
            show: true,
            position: 'nw',
            margin: [15, 0]
        },
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });




    // FLOT FULL CONTENT
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var pageviews = [[1, 1700], [2, 1500], [3, 1390], [4, 1550], [5, 1400], [6, 1350], [7, 1336], [8, 1245], [9, 1479], [10, 1595], [11, 1409], [12, 1500], [13, 1700], [14, 1920], [15, 1870], [16, 1650], [17, 1500], [18, 1650], [19, 1436], [20, 1395], [21, 1479], [22, 1595], [23, 1509], [24, 1550], [25, 1480], [26, 1390], [27, 1550], [28, 1400], [29, 1590], [30, 1436]],
        visitor = [[1, 856], [2, 889], [3, 854], [4, 958], [5, 994], [6, 1056], [7, 924], [8, 873], [9, 756], [10, 787], [11, 754], [12, 865], [13, 896], [14, 989], [15, 954], [16, 958], [17, 854], [18, 1056], [19, 1124], [20, 1183], [21, 1126], [22, 887], [23, 754], [24, 865], [25, 889], [26, 854], [27, 958], [28, 925], [29, 1056], [30, 984]];

    var plot = $.plot('#demo-flot-area-full', [
        {
            label: 'Pageviews',
            data: pageviews,
            lines: {
                show: true,
                lineWidth: 0,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.5
                    }, {
                        opacity: 0.5
                    }]
                }
            },
            points: {
                show: false,
                radius: 2
            }
        },
        {
            label: 'Visitors',
            data: visitor,
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
                show: false,
                radius: 4
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
        colors: ['#b5bfc5', '#71ba51'],
        legend: {
            show: true,
            position: 'nw',
            margin: [15, 0]
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
            show: false,
            ticks: 7,
            tickColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });





    // FLOT BAR CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var data = [[1, 10], [2, 8], [3, 4], [4, 13], [5, 17], [6, 9], [7, 12], [8, 15], [9, 9], [10, 15]];

    $.plot('#demo-flot-bar', [data], {
        series: {
            bars: {
                show: true,
                barWidth: 0.6,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.9
                    }, {
                        opacity: 0.9
                    }]
                }
            }
        },
        colors: ['#9B59B6'],
        yaxis: {
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: '#eeeeee',
            borderWidth: 0
        },
        legend: {
            show: true,
            position: 'nw'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });









    // FLOT DONUTS CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var data = [
        {
            label: 'Series1',
            data: 10
        },
        {
            label: 'Series2',
            data: 30
        },
        {
            label: 'Series3',
            data: 90
        },
        {
            label: 'Series4',
            data: 70
        }
    ];
    $.plot('#demo-flot-donut', data, {
        series: {
            pie: {
                innerRadius: 0.5,
                show: true
            }
        },
        tooltip: {
            show: true,
            content: '%p.0%, %s, n=%n', // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });





    // FLOT PIE CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var data = [
        {
            label: 'Series1',
            data: 10
        },
        {
            label: 'Series2',
            data: 30
        },
        {
            label: 'Series3',
            data: 90
        },
        {
            label: 'Series4',
            data: 70
        }
    ];

    $.plot('#demo-flot-pie', data, {
        series: {
            pie: {
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 3 / 4,
                    formatter: function (label, series) {
                        return '<div style=\"text-align:center;padding:5px;color:white;font-size:10px\">' + label + ' : ' + Math.round(series.percent) + '%</div>';
                    },
                    background: {
                        opacity: 0.8,
                        color: '#323232'
                    }
                }
            }
        },
        legend: {
            show: false
        },
        tooltip: {
            show: true,
            content: '%p.0%, %s, n=%n', // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });




    // FLOT REALTIME
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    // We use an inline data source in the example, usually data would
    // be fetched from a server

    var data = [],
        totalPoints = 300;

    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        // Do a random walk

        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    // Set up the control widget

    var updateInterval = 50;
    var plot = $.plot('#demo-flot-realtime', [getRandomData()], {
        series: {
            lines: {
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.9
                    }, {
                        opacity: 0.9
                    }]
                }
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 125,
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            show: false,
            ticks: 7,
            tickColor: 'transparent'
        },
        colors: ['#1abc9c'],
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: '#eeeeee',
            borderWidth: 0
        },
        legend: {
            show: true,
            position: 'nw'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });

    function update() {
        plot.setData([getRandomData()]);

        // Since the axes don't change, we don't need to call plot.setupGrid()

        plot.draw();
        setTimeout(update, updateInterval);
    }

    update();

});
