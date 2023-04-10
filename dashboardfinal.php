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
      google.charts.load("current", {packages:["corechart","line"]});
      google.charts.setOnLoadCallback(drawCategoryChart);
      google.charts.setOnLoadCallback(drawYearChart);
      google.charts.setOnLoadCallback(drawCourseChart);
      function drawCategoryChart() {
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
          
          title: 'Number of Theses by Category',
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

      function drawYearChart() {
        var data = google.visualization.arrayToDataTable([
          ['year', 'Number of Thesis'],
          <?php
          
          $sql = "SELECT * FROM thesisyear";
          $fire = mysqli_query($con,$sql);
           
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['year']."',".$result['number']."],";
          }
          ?>
     
        ]);

        var options = {
          title: 'Number of Theses Released per Year',
          curveType: 'none',
          titleTextStyle: {
            fontName: "Arial",
            fontSize: 25,
            bold: true
          },
          animation:{
            startup: true,
            duration: 1000,
            easing: 'linear',
          },
          legend: { 
            text: 'Number of Theses',
            position: 'bottom',
          },
          vAxis: {
            viewWindow: {
              min: 0
            }
          },

          backgroundColor: 'transparent',
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }

  function drawCourseChart() {
    var data = google.visualization.arrayToDataTable([
          ['course', 'Number of Theses'],
          <?php
          
          $sql = "SELECT * FROM thesiscourse";
          $fire = mysqli_query($con,$sql);
           
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['course']."',".$result['number']."],";
          }
          ?>
     
        ]);



      var options = {
        title: "Number of Theses Released per Course",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        backgroundColor: 'transparent',
        titleTextStyle: {
            fontName: "Arial",
            fontSize: 25,
            bold: true
          },
        
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);
  }
    </script>
  
  </head>
  <body>
  <div class="student">
    
    <img class="lib-1-icon" alt="" src="lib.jpg">
    <div class="home-wrapper"><div class="home"><a href="#test link">HOME</a></div></div>
    <div class="files-wrapper"><div class="home"><a href="#">FILES</a></div></div>
    <div class="bookmark-wrapper"><div class="home"><a href="#">BOOKMARK</a></div></div>
    <div class="log-out-wrapper"><div class="home"><a href="#">LOGOUT</a></div></div>

    <div class="re">Re</div>
    <div class="libe">Libe</div>

    <table class="columns">
      <tr>
        <td><div id="piechart_3d" style="width: 750px; height: 500px;"></div></td>
        <td><div id="curve_chart" style="width: 800px; height: 500px;"></div></td>
      </tr>
      <tr>
        <td><div id="columnchart_values" style="width: 700px; height: 500px;"></div></td>
      </tr>
    </table>

    </div>
  </body>
</html>