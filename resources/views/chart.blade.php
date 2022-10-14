<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .custom{
        width: 150px;
        display: inline-block;
        color: red;
        filter:url(#round);
        position: relative;
    }
    .custom::before {
        content:"";
        display:block;
        padding-top: 100%;
        background:currentColor;
        clip-path:  polygon(50% 0, 100% 11%, 100% 92%, 51% 100%, 0 92%, 0 10%);
    }
</style>
<body>
    <div class="custom">
        <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
                <filter id="round">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />    
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                    <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                </filter>
            </defs>
        </svg>
    </div>

  

    <div id="container"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/apexcharts.min.js') }}"></script>

    <script>
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [day , month, year].join('-');
        }
        var array = @json($data);
        var options = {
          series: [{
            name: "Desktops",
            data: array.map(item => item.count)
        }],
          chart: {
          height: 350,
          type: 'line',
          background: '#fff',
            stacked: false,//chart fast
            zoom: {
                enabled: false
            },
            sparkline: {
                enabled: true,
            }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        colors: [ 
            '#21C0A5',
        ],
        fill: {
            colors: undefined,
            type: 'gradient',
            gradient: {
                shade: false,
                type: "horizontal",
                shadeIntensity: 0.5,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 0, 0],
                colorStops: []
            }
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: array.map(item => formatDate(item.month_name)),
          labels: {
            show: false,
          }
        },
        yaxis: {
          labels: {
            show: false,
          }
        },
        grid: {
            borderColor: '#fff',
        },
        tooltip: {
            enabled: true,
        }
        };

        var chart = new ApexCharts(document.querySelector("#container"), options);
        chart.render();
    </script>

    {{-- <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [day , month, year].join('-');
        }
        var array = @json($data);
        Highcharts.chart('container' , {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Thống kê khách hàng đã đăng ký trong tháng'
            },
            xAxis: {
                categories: array.map(item => formatDate(item.month_name))
            },
            yAxis: {
                title: {
                    text: 'Số lượng khách hàng đăng ký',
                }
            },  
            series: [{
                name: 'Khách hàng đăng ký',
                data: array.map(item => item.count),
            }]
        });
    </script> --}}
</body>
</html>