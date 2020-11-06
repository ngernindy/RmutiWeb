$(function() {
    $.ajax({

        url: 'http://localhost/chart/chart_data.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "กราฟแสดงเปรียบเทียบราคาสินค้า",
                "xAxisName": "รายการสินค้า",
                "yAxisName": "ราคา",
                "rotatevalues": "1",
                "theme": "zune"
                //รายชื่อ them = carbon, fint, ocean,zune
            };

            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container',
                width: '800',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});