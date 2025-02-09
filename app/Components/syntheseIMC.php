<script>
window.onload = function() {

    var dataPoints = [];

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        zoomEnabled: true,
        title: {
            text: "IMC"
        },
        axisY: {
            title: "IMC",
            titleFontSize: 24
        },
        axisX: {
            valueFormatString: "DD MMM YYYY",
            labelAngle: -45,
            interval: 1,
            intervalType: "day"
        },
        data: [{
            type: "line",
            dataPoints: dataPoints,
        }]
    });

    function showCommentaireIMC(imc) {
        if (imc < 18.5) {
            return "Insuffisance pondérale";
        } else if (imc < 25) {
            return "Poids normal";
        } else if (imc < 30) {
            return "Surpoids";
        } else {
            return "Obésité";
        }
    }

    function addData(data) {
        for (var i = 0; i < data.length; i++) {
            let imc = data[i].valeurIMC; // Récupérer la valeur de l'IMC ici
            dataPoints.push({
                x: new Date(data[i].date),
                y: imc, // Utiliser la variable imc ici
                toolTipContent: "Date: {x} <br> IMC: {y} <br> " + showCommentaireIMC(imc) // Passer imc à la fonction
            });
        }
        chart.render();
    }

    $.getJSON("functions/IMCData.php", addData);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
