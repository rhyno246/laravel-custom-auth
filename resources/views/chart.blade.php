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
        var array = @json($data);
        Highcharts.chart('container' , {
            chart: {
                type: 'line'
            },
            title: {
                text: 'A chart for new user'
            },
            xAxis: {
                categories: array.map(item => item.month_name)
            },
            yAxis: {
                title: {
                    text: 'Number of new user',
                }
            },  
            series: [{
                name: 'New user',
                data: array.map(item => item.count),
            }]
        });
    </script>
</body>
</html>