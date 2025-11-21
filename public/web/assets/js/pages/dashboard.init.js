/*
Template Name: Appzia -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Dashboard Init Js File
*/


!function ($) {
    "use strict";

    // var Dashboard = function () {
    // };


    // //creates area chart
    // Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
    //     Morris.Area({
    //         element: element,
    //         pointSize: 3,
    //         lineWidth: 1,
    //         data: data,
    //         xkey: xkey,
    //         ykeys: ykeys,
    //         labels: labels,
    //         resize: true,
    //         gridLineColor: 'rgba(108, 120, 151, 0.1)',
    //         hideHover: 'auto',
    //         lineColors: lineColors
    //     });
    // },
    //     //creates Bar chart
    //     Dashboard.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
    //         Morris.Bar({
    //             element: element,
    //             data: data,
    //             xkey: xkey,
    //             ykeys: ykeys,
    //             labels: labels,
    //             gridLineColor: 'rgba(108, 120, 151, 0.1)',
    //             barSizeRatio: 0.4,
    //             resize: true,
    //             hideHover: 'auto',
    //             barColors: lineColors
    //         });
    //     },

    //     //creates Donut chart
    //     Dashboard.prototype.createDonutChart = function (element, data, colors) {
    //         Morris.Donut({
    //             element: element,
    //             data: data,
    //             resize: true,
    //             colors: colors,
    //             gridLineColor: 'rgba(108, 120, 151, 0.1)',
    //             labelColor: '#fff'
    //         });
    //     },

    //     //creates Line chart
    //     Dashboard.prototype.createLineChart = function (element, data, colors) {
    //         Morris.Line({
    //             element: element,
    //             data: data,
    //             // resize: true,
    //             // colors: colors,
    //             // gridLineColor: 'rgba(108, 120, 151, 0.1)',
    //             // labelColor: '#fff'
    //             xkey: 'y',
    //             ykeys: ['a', 'b'],
    //             labels: ['Series A', 'Series B'],
    //         });
    //     },

    //     Dashboard.prototype.init = function () {

    //         //creating area chart
    //         var $areaData = [
    //             { y: '2009', a: 10, b: 20 },
    //             { y: '2010', a: 75, b: 65 },
    //             { y: '2011', a: 50, b: 40 },
    //             { y: '2012', a: 75, b: 65 },
    //             { y: '2013', a: 50, b: 40 },
    //             { y: '2014', a: 75, b: 65 },
    //             { y: '2015', a: 90, b: 60 },
    //             { y: '2016', a: 90, b: 75 }
    //         ];
    //         this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#00a3ff', '#04a2b3']);

    //         //creating bar chart
    //         var $barData = [
    //             { y: '2009', a: 100, b: 90 },
    //             { y: '2010', a: 75, b: 65 },
    //             { y: '2011', a: 50, b: 40 },
    //             { y: '2012', a: 75, b: 65 },
    //             { y: '2013', a: 50, b: 40 },
    //             { y: '2014', a: 75, b: 65 },
    //             { y: '2015', a: 100, b: 90 },
    //             { y: '2016', a: 90, b: 75 }
    //         ];
    //         this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#04a2b3', '#00a3ff']);

    //         //creating donut chart
    //         var $donutData = [
    //             { label: "Download Sales", value: 12 },
    //             { label: "In-Store Sales", value: 30 },
    //             { label: "Mail-Order Sales", value: 20 }
    //         ];
    //         this.createDonutChart('morris-donut-example', $donutData, ['#dcdcdc', '#e66060', '#04a2b3']);

    //         //creating line chart
    //         var $lineData = [
    //             { y: '2006', a: 100, b: 90 },
    //             { y: '2007', a: 75, b: 65 },
    //             // { y: '2008', a: 50, b: 40 },
    //             // { y: '2009', a: 75, b: 65 },
    //             // { y: '2010', a: 50, b: 40 },
    //             // { y: '2011', a: 75, b: 65 },
    //             // { y: '2012', a: 100, b: 90 }
    //         ];
    //         this.createLineChart('morris-line-example', $lineData, ['#dcdcdc', '#e66060', '#04a2b3']);

    //     },
    //     //init
    //     $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard;

    // Line-column chart

    var options = {
        series: [{
            name: '2020',
            type: 'column',
            data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
        }, {
            name: '2019',
            type: 'line',
            data: [23, 32, 27, 38, 27, 32, 27, 38, 22, 31, 21, 16]
        }],
        chart: {
            height: 280,
            type: 'line',
            toolbar: {
                show: false,
            }
        },
        stroke: {
            width: [0, 3],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '20%',
            },
        },
        dataLabels: {
            enabled: false,
        },

        legend: {
            show: false,
        },
        colors: ['#5664d2', '#1cbb8c'],
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    };

    var chart = new ApexCharts(document.querySelector("#line-column-chart"), options);
    chart.render();


    // donut chart

    var options = {
        series: [42, 26, 15],
        chart: {
            height: 250,
            type: 'donut',
        },
        labels: ["Product A", "Product B", "Product C"],
        plotOptions: {
            pie: {
                donut: {
                    size: '75%'
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false,
        },
        colors: ['#5664d2', '#1cbb8c', '#eeb902'],

    };

    var chart = new ApexCharts(document.querySelector("#donut-chart"), options);
    chart.render();



    // Radialchart 1

    var radialoptions = {
        series: [72],
        chart: {
            type: 'radialBar',
            wight: 60,
            height: 60,
            sparkline: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#5664d2'],
        stroke: {
            lineCap: 'round'
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: '70%'
                },
                track: {
                    margin: 0,
                },

                dataLabels: {
                    show: false
                }
            }
        }
    };

    var radialchart = new ApexCharts(document.querySelector("#radialchart-1"), radialoptions);
    radialchart.render();


    // Radialchart 2

    var radialoptions = {
        series: [65],
        chart: {
            type: 'radialBar',
            wight: 60,
            height: 60,
            sparkline: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#1cbb8c'],
        stroke: {
            lineCap: 'round'
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: '70%'
                },
                track: {
                    margin: 0,
                },

                dataLabels: {
                    show: false
                }
            }
        }
    };

    var radialchart = new ApexCharts(document.querySelector("#radialchart-2"), radialoptions);
    radialchart.render();


    // sparkline chart

    var options = {
        series: [{
            data: [23, 32, 27, 38, 27, 32, 27, 34, 26, 31, 28]
        }],
        chart: {
            type: 'line',
            width: 80,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            width: [3],
            curve: 'smooth'
        },
        colors: ['#5664d2'],

        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return '';
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#spak-chart1"), options);
    chart.render();


    var options = {
        series: [{
            data: [24, 62, 42, 84, 63, 25, 44, 46, 54, 28, 54]
        }],
        chart: {
            type: 'line',
            width: 80,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            width: [3],
            curve: 'smooth'
        },
        colors: ['#5664d2'],
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return '';
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#spak-chart2"), options);
    chart.render();


    var options = {
        series: [{
            data: [42, 31, 42, 34, 46, 38, 44, 36, 42, 32, 54]
        }],
        chart: {
            type: 'line',
            width: 80,
            height: 35,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            width: [3],
            curve: 'smooth'
        },
        colors: ['#5664d2'],
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return '';
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#spak-chart3"), options);
    chart.render();



    // vectormap

    $('#usa-vectormap').vectorMap({
        map: 'us_merc_en',
        backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#e8ecf4',
                stroke: '#74788d',
                'stroke-width': 1,
                "stroke-opacity": 0.4,
            }
        },

    });
}(window.jQuery),

    //initializing
    function ($) {
        "use strict";
        // $.Dashboard.init();
    }(window.jQuery);
