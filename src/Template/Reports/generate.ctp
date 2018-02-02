<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Titulo', 'Egresados que cuentan con el'],
          ['Si tiene',     1100],
          ['No tiene',      200],
          ['No le interesa',  400]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Titulo', 'Egresados que cuentan con el'],
          ['Si tiene',     1100],
          ['No tiene',      200],
          ['No le interesa',  400]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));

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
    <h1>Hola carnitas esta es la seccion de reportes :v</h1>
    <div id="printReporte">
      
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    <div id="piechart_3d2" style="width: 900px; height: 500px;"></div>
    </div>
    <input type="button" onclick="printDiv('printReporte')" value="Imprimir Reportes" />
  </body>
</html>