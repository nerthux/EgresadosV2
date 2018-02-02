<?php
use Cake\ORM\TableRegistry;

$query = TableRegistry::get('QuestionsUsers')->find()->where(['question_id' => 30]);
$no = 0;
$si = 0;


foreach ($query as $question) {

	if($question->value=="no"){
		$no++;
	}else if($question->value=="si"){
		$si++;
	} 
}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Titulo', 'Egresados que cuentan con el'],
          ['Si tiene',     <?= $si ?>],
          ['No tiene',     <?= $no ?>]
        ]);

        var options = {
          title: 'Egresados con titulo'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
    <script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
    </script>
    <style media="print">
    @page {
    size: auto;
    margin: 0;
       }
    </style>
  </head>
  <body>
    <h1>Agarrate de tu asiento carnitas por que estaras a punto de ver el fruto de 4 horas de puro tirar codigo :v</h1>
	<h1>Personas que tienen titulo: <?= $si ?></h1>
	<h1>Personas que no tienen titulo:<?= $no ?></h1>

    <div id="printReporte">
      
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
    <input type="button" onclick="printDiv('printReporte')" value="Imprimir Reportes" />
  </body>
</html>