<?php
include("functions/bdd.php");

$req = "SELECT * FROM rapport ORDER BY date ASC LIMIT 100"; 
$ex = $link->prepare($req);
$ex->execute();

$data1 = []; 
$data2 = []; 

while ($row = $ex->fetch(PDO::FETCH_ASSOC)) {
    $gras = $row['pGras'];
    $date = $row['date'];

    $data2[] = [
        'date' => $date,
        'indice' => $gras
    ];
}


$req = "SELECT * FROM rapport ORDER BY date ASC LIMIT 100"; 
$ex = $link->prepare($req);
$ex->execute();

while ($row = $ex->fetch(PDO::FETCH_ASSOC)) {
    $gras = $row['pMuscle'];
    $date = $row['date'];

    $data1[] = [
        'date' => $date,
        'indice' => $gras
    ];
}

$dataPoints1 = [];
$dataPoints2 = [];

foreach ($data1 as $item) {
    $dataPoints1[] = ["label" => $item['date'], "y" => $item['indice']];
}

foreach ($data2 as $item) { 
    $dataPoints2[] = ["label" => $item['date'], "y" => $item['indice']];
}

$jsonDataPoints1 = json_encode($dataPoints1);
$jsonDataPoints2 = json_encode($dataPoints2);

?>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Masse musclaire / graisseuse" 
    },
    axisY: {
        suffix: "%" 
    },
    toolTip: {
        shared: true,
        reversed: true
    },
    legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    data: [
        {
            type: "stackedArea100",
            name: "Pourcentage musculaire", 
            showInLegend: true,
            yValueFormatString: "#0.0#\"%\"",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "stackedArea100",
            name: "Pourcentage graisseux", 
            showInLegend: true,
            yValueFormatString: "#0.0#\"%\"",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }
    ]
});

chart.render();

function toggleDataSeries(e) {
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else {
        e.dataSeries.visible = true;
    }
    chart.render();
}
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
