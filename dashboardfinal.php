<?php
    $con = mysqli_connect("localhost","root","","thesisdatabase");
?>

<html>
  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href=".display.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;800&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"
    />
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
          titleTextStyle: {
            fontName: "Arial",
            fontSize: 25,
            bold: true
          },
          is3D: true,
          backgroundColor: 'transparent',
          

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <div class="student">
    
    <img class="lib-1-icon" alt="" src="lib.jpg" />
    <div class="student-child"></div>
    <div class="student-item"></div>
    <div class="home-wrapper"><div class="home"><a href="#test link">HOME</a></div></div>
    <div class="files-wrapper"><div class="home"><a href="#">FILES</a></div></div>
    <div class="bookmark-wrapper"><div class="home"><a href="#">BOOKMARK</a></div></div>
    <div class="log-out-wrapper"><div class="home"><a href="#">    LOGOUT</a></div></div>

    <div class="re">Re</div>
    <div class="libe">Libe</div>

    <div id="piechart_3d" style="width: 1000px; height: 700px;"></div>
  </body>
</html>