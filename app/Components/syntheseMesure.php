<script>
window.onload = function() {

var dataPointsIMC = [];
var dataPointsJambes = [];
var dataPointsBras = [];
var dataPointsFesses = [];
var dataPointsVentre = [];

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    zoomEnabled: true,
    title: {
        text: "Mesures"
    },
    axisX: {
        title: "Date",
        valueFormatString: "DD MMM YYYY", 
        labelAngle: -45,
        interval: 1, 
        intervalType: "day" 
    },
    axisY: {
        title: "Valeur CM"
    },
    legend: {},
    data: [
        { type: "line", name: "Jambes (cm)", showInLegend: true, dataPoints: dataPointsJambes },
        { type: "line", name: "Bras (cm)", showInLegend: true, dataPoints: dataPointsBras },
        { type: "line", name: "Fesses (cm)", showInLegend: true, dataPoints: dataPointsFesses },
        { type: "line", name: "Ventre (cm)", showInLegend: true, dataPoints: dataPointsVentre }
    ]
});

function addData(data) {
    for (var i = 0; i < data.length; i++) {
        dataPointsJambes.push({ x: new Date(data[i].date), y: data[i].jambes });
        dataPointsBras.push({ x: new Date(data[i].date), y: data[i].bras });
        dataPointsFesses.push({ x: new Date(data[i].date), y: data[i].fesses });
        dataPointsVentre.push({ x: new Date(data[i].date), y: data[i].ventre });
    }

    chart.options.data[0].dataPoints = dataPointsJambes;
    chart.options.data[1].dataPoints = dataPointsBras;
    chart.options.data[2].dataPoints = dataPointsFesses;
    chart.options.data[3].dataPoints = dataPointsVentre;

    chart.render();
}

fetch('../functions/mesureData.php')
  .then(response => response.json())
  .then(data => {
    addData(data);
  })
  .catch(error => {
    console.error('Erreur lors de la récupération des données:', error);
    alert("Erreur lors de la récupération des données. Veuillez réessayer plus tard.");
  });

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>