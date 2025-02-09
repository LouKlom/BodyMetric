<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var dataPoints = [];

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    zoomEnabled: true,
    title: {
        text: "Poids"
    },
    axisX: { 
        valueFormatString: "DD MMM YYYY", 
        labelAngle: -45, 
        interval: 1, 
        intervalType: "day" 
    },
    axisY: {
        title: "Poids (kg)",
        titleFontSize: 24
    },
    data: [{
        type: "line",
        yValueFormatString: "#,##0.00 kg",
        dataPoints: dataPoints
    }]
});

function addData(data) {
    for (var i = 0; i < data.length; i++) {
        dataPoints.push({
            x: new Date(data[i].date),
            y: data[i].poids
        });
    }
    chart.render();
}

$.getJSON("../functions/PoidsData.php", addData);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
</body>
</html>