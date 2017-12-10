<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($students); ?></h3>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/students" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($users); ?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/admin/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->

          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
          </div>

        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 col-md-6 col-xs-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->

          <!-- /.nav-tabs-custom -->





        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

      </div>
      <!-- /.row (main row) -->

    </section>


    <!-- /.content -->
    <?php
    $this->Html->css([
    'AdminLTE./plugins/iCheck/flat/blue',
    'AdminLTE./plugins/morris/morris',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
    ],
    ['block' => 'css']);


    $this->Html->script([
    'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    'AdminLTE./plugins/morris/morris.min',
    'AdminLTE./plugins/chartjs/Chart.min',
    'AdminLTE./plugins/sparkline/jquery.sparkline.min',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
    'AdminLTE./plugins/knob/jquery.knob',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
    'AdminLTE./plugins/datepicker/bootstrap-datepicker',
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
    ],
    ['block' => 'script']);
    ?>

    <?php $this->start('scriptBotton'); ?>
    <script type="text/javascript">
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [
        {
          label: "Revenue",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [
            <?php
            for($month = 1; $month < 13; $month++) {
              $revenue = 0;
              foreach($transactions as $transaction) {
                if($transaction['month'] == $month) {
                  $revenue = $transaction['revenue'];
                }
              }
              echo $revenue . ',';
            }

              ?>

          ]
        },
        {
          label: "Count",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [
            <?php
            for($month = 1; $month < 13; $month++) {
              $count = 0;
              foreach($transactions as $transaction) {
                if($transaction['month'] == $month) {
                  $count = $transaction['count'];
                }
              }
              echo $count . ',';
            }
              ?>
            ]


        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);


      /*var area = new Morris.Area({
        element: 'revenue-chart',
        resize: true,
        data: [
          <?php //foreach($transactions as $transaction) {
            //echo "{m: '" . $transaction['month'] . "', revenue: " . $transaction['revenue'] . ", count: " . $transaction['count'] . "},";
          //} ?>
        ],
        xkey: 'm',
        ykeys: ['revenue', 'count'],
        labels: ['Revenue', 'Count'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        hideHover: 'auto'
      });*/



      //Fix for charts under tabs
      $('.box ul.nav a').on('shown.bs.tab', function () {
        area.redraw();
        donut.redraw();
        line.redraw();
      });

      //jvectormap data
      var visitorsData = {
        "US": 398, //USA
        "SA": 400, //Saudi Arabia
        "CA": 1000, //Canada
        "DE": 500, //Germany
        "FR": 760, //France
        "CN": 300, //China
        "AU": 700, //Australia
        "BR": 600, //Brazil
        "IN": 800, //India
        "GB": 320, //Great Britain
        "RU": 3000 //Russia
      };
      //World map by jvectormap
      $('#world-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: "transparent",
        regionStyle: {
          initial: {
            fill: '#e4e4e4',
            "fill-opacity": 1,
            stroke: 'none',
            "stroke-width": 0,
            "stroke-opacity": 1
          }
        },
        series: {
          regions: [{
            values: visitorsData,
            scale: ["#92c1dc", "#ebf4f9"],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionLabelShow: function (e, el, code) {
          if (typeof visitorsData[code] != "undefined")
            el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
        }
      });

      /* jQueryKnob */
      $(".knob").knob();

      /* The todo list plugin */
      $(".todo-list").todolist({
        onCheck: function (ele) {
          window.console.log("The element has been checked");
          return ele;
        },
        onUncheck: function (ele) {
          window.console.log("The element has been unchecked");
          return ele;
        }
      });

      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();

      $('.daterange').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      }, function (start, end) {
        window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      });

      //The Calender
      $("#calendar").datepicker();

      //SLIMSCROLL FOR CHAT WIDGET
      $('#chat-box').slimScroll({
        height: '250px'
      });

    </script>
    <?php  $this->end(); ?>
