<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="container"></div>
    <script src="https://code.highcharts.com/highcharts.js"></script>

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
    </script>
</body>
</html>