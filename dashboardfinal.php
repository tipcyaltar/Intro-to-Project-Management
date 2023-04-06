<?php
    $con = mysqli_connect("localhost","root","","thesisdatabase");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['category', 'count'],
          <?php
          
          $sql = "SELECT * FROM dashboard";
          $fire = mysqli_query($con,$sql);
           
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['category']."',".$result['count']."],";
          }
          ?>
     
        ]);

        var options = {
          title: 'Number of Thesis per CCS Course',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>