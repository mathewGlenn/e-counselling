<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>E-counselling</title>

  <link rel="stylesheet" href="assets/css/styles.css"/>

  <script src="https://kit.fontawesome.com/09866f33f8.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- sweetalert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- amchart -->
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
</head>
<body>
  <?php
  include "includes/db.inc.php";
  include "includes/dashboard.inc.php";
  include "includes/loginverify.inc.php";

  //check session
  if (!isset($_SESSION['employee_id'])) {
      header("Location: login.php");
  }
  ?>

  <div class="w-100">
    <div class="sidebar pt-3 d-flex flex-column align-items-center">
      <div class="d-flex flex-column">
        <img src="assets/img/isu_seal.png" alt="" style="height:80px; object-fit: contain;">
        <h4 class="mt-2 text-light" style="text-align: center; font-weight: 400">
          <small class="text-light">ISU Cauayan</small><br />E-Counselling
        </h4>
      </div>

      <div class="d-flex mt-5 flex-column align-items-center w-100">
        <div class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3"
          onclick="location.href='dashboard.php';">
          <i class="fa-solid fa-chart-area ic-active me-3"></i>
          Dashboard
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='pendingappointments.php';">
          <i class="fa-solid fa-hourglass-start ic-inactive me-3"></i>
          Pending appointments
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='acceptedappointments.php';">
          <i class="fa-solid fa-address-card ic-inactive me-3"></i>
          Accepted appointments
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='completedmeetings.php';">
          <i class="fa-solid fa-handshake ic-inactive me-3"></i>
          Completed meetings
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='appointmentdates.php';">
          <i class="fa-solid fa-calendar-check ic-inactive me-3"></i>
          Appointment dates
        </div>
      </div>
    </div>

    <div class="main">
      <div class="d-flex flex-row justify-content-between">
        <span class="page-title">Dashboard</span>
        <a href="includes/logout.inc.php">
          <button class="btn btn-danger">Logout</button>
        </a>
      </div>

      <div>
        <div class="card mt-4 d-flex p-3 d-flex flex-row justify-content-center" style="height: 250px; width: 100%">
          <div style="height: 100%; width: 50%">
            <span class="chart-title">Meetings</span>

            <div class="d-flex mt-4">
              <div class="me-3 bg-purple d-flex flex-column justify-content-center align-items-center"
                style="height: 100px; width: 200px">
                <span class="text-light">Online</span>
                <!--TODO: Change value here-->
                <h1 class="text-light"><?php echo "$Online";?></h1>
              </div>

              <div class="bg-pink d-flex flex-column justify-content-center align-items-center"
                style="height: 100px; width: 200px">
                <span class="text-light">Face-to-face</span>
                <!--TODO: Change value here-->
                <h1 class="text-light"><?php echo "$FaceToFace";?></h1>
              </div>
            </div>
          </div>

          <div class="card-1" style="height: 100%; width: 50%">
            <!--TODO: Insert chart here-->
            <div id="chartdiv1" style="width: 100%; height: 100%;">
            </div>
          </div>
        </div>

        <div class="mt-4 d-flex flex-row">
          <div class="card d-flex p-3 d-flex flex-row" style="height: 250px; width: 100%">
            <span class="chart-title">Types of Counselling</span>
            <!--TODO: Insert chart here-->
            <div id="chartdiv3" style="width: 100%; height: 100%;">
            </div>
          </div>
        </div>

        <div class="card mt-4 d-flex p-3 d-flex flex-row" style="height: 500px; width: 100%">
          <span class="chart-title">Cases</span>
          <!--TODO: Insert chart here-->
          <div id="chartdiv4" style="width: 100%; height: 100%;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  am5.ready(function() {
    // Create root element -------------------
    var root1 = am5.Root.new("chartdiv1");

    // Formatting numbers
    root1.numberFormatter.setAll({
      numberFormat: "#a",
    });

    // Set themes
    root1.setThemes([
      am5themes_Animated.new(root1)
    ]);

    // Create chart
    var chart1 = root1.container.children.push(
      am5percent.PieChart.new(root1, {
        endAngle: 270
      })
    );

    // Create series
    var series1 = chart1.series.push(
      am5percent.PieSeries.new(root1, {
        valueField: "value",
        categoryField: "category",
        endAngle: 270,
        legendLabelText: "{category}",
        legendValueText: "{value}"
      })
    );
    series1.slices.template.set('tooltipText', '{category}: {value}');
    series1.labels.template.set('text', '{category}: {value}');

    series1.labels.template.setAll({
      maxWidth: 100,
      oversizedBehavior: "wrap",
      fontSize: 12
    });

    series1.states.create("hidden", {
      endAngle: -90
    });

    // Set data
    series1.data.setAll([
      { category: "Online", value: "<?php echo "$Online";?>" }, 
      { category: "Face-to-face", value: "<?php echo "$FaceToFace";?>" }
    ]);
    series1.appear(1000, 100);

    // Create root element -------------------
    var root3 = am5.Root.new("chartdiv3");

    // Formatting numbers
    root3.numberFormatter.setAll({
      numberFormat: "#a",
    });

    // Set themes
    root3.setThemes([
      am5themes_Animated.new(root3)
    ]);

    // Create chart
    var chart3 = root3.container.children.push(
      am5percent.PieChart.new(root3, {
        endAngle: 270
      })
    );

    // Create series
    var series3 = chart3.series.push(
      am5percent.PieSeries.new(root3, {
        valueField: "value",
        categoryField: "category",
        endAngle: 270,
        legendLabelText: "{category}",
        legendValueText: "{value}"
      })
    );
    series3.slices.template.set('tooltipText', '{category}: {value}');
    series3.labels.template.set('text', '{category}: {value}');
    
    series3.labels.template.setAll({
      maxWidth: 100,
      oversizedBehavior: "wrap",
      fontSize: 12
    });

    series3.states.create("hidden", {
      endAngle: -90
    });

    // Set data
    series3.data.setAll([
      { category: "Individual", value: "<?php echo "$Individual";?>" },
      { category: "Group", value: "<?php echo "$Group";?>" },
      { category: "Follow-up", value: "<?php echo "$FollowUp";?>" },
      { category: "Consultaion", value: "<?php echo "$Consultaion";?>" }
    ]);
    series3.appear(1000, 100);

    // Create root element -------------------
    var root4 = am5.Root.new("chartdiv4");

    // Formatting numbers
    root4.numberFormatter.setAll({
      numberFormat: "#a",
    });

    // Set themes
    root4.setThemes([
      am5themes_Animated.new(root4)
    ]);

    // Create chart
    var chart4 = root4.container.children.push(am5xy.XYChart.new(root4, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX:true
    }));

    // Add cursor
    var cursor = chart4.set("cursor", am5xy.XYCursor.new(root4, {}));
    cursor.lineY.set("visible", false);

    // Create axes
    var xRenderer = am5xy.AxisRendererX.new(root4, { minGridDistance: 30 });
    xRenderer.labels.template.setAll({
      rotation: -90,
      centerY: am5.p50,
      centerX: am5.p100,
      paddingRight: 15
    });

    var xAxis = chart4.xAxes.push(am5xy.CategoryAxis.new(root4, {
      maxDeviation: 0.3,
      categoryField: "category",
      renderer: xRenderer,
      tooltip: am5.Tooltip.new(root4, {})
    }));

    var yAxis = chart4.yAxes.push(am5xy.ValueAxis.new(root4, {
      maxDeviation: 0.3,
      renderer: am5xy.AxisRendererY.new(root4, {})
    }));

    // Create series
    var series4 = chart4.series.push(am5xy.ColumnSeries.new(root4, {
      name: "Series 1",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      sequencedInterpolation: true,
      categoryXField: "category",
      tooltip: am5.Tooltip.new(root4, {
        labelText:"{valueY}"
      })
    }));

    series4.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
    series4.columns.template.adapters.add("fill", function(fill, target) {
      return chart4.get("colors").getIndex(series4.columns.indexOf(target));
    });

    series4.columns.template.adapters.add("stroke", function(stroke, target) {
      return chart4.get("colors").getIndex(series4.columns.indexOf(target));
    });

    // Set data
    var data4 = [
      { category: "Family", value: parseInt("<?php echo "$Family";?>")}, 
      { category: "Girl-Boy Relationship", value: parseInt("<?php echo "$GirlBoyRelationship";?>")}, 
      { category: "Personal", value: parseInt("<?php echo "$Personal";?>")},
      { category: "Academic", value: parseInt("<?php echo "$Academic";?>")},
      { category: "Interpersonal", value: parseInt("<?php echo "$Interpersonal";?>")},
      { category: "Gender Sensitivity Issue", value: parseInt("<?php echo "$GenderSensitivityIssue";?>")},
      { category: "Cultural Differences", value: parseInt("<?php echo "$CulturalDifferences";?>")},
      { category: "Career concern", value: parseInt("<?php echo "$CareerConcern";?>")},
    ];

    xAxis.data.setAll(data4);
    series4.data.setAll(data4);

    series4.appear(1000);
    chart4.appear(1000, 100);
  });
  </script>
</body>
</html>

