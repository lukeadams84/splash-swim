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


      <div class="row">
        <div class="col-lg-3 col-xs-6">

        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->

          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i> Contacts</li>
            </ul>
            <div class="tab-content no-padding">
              <table id="list" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                        <th scope="col">Source</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Body</th>
                        <th scope="col">Read</th>
                        <th scope="col">Created</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($contacts as $contact): ?>
                  <tr>
                      <td><?= h($contact->source) ?></td>
                      <td><?= h($contact->recordedname) ?></td>
                      <td><?= h($contact->email) ?></td>
                      <td><?= h($contact->body) ?></td>
                      <td><?= h($contact->read) ?></td>
                      <td><?php echo date('d-m-Y', strtotime($contact->created)); ?></td>
                      <td class="actions">

                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
            </div>
          </div>

        </div>
        <!-- ./col -->
      </div>


      <!-- /.row -->
      <!-- Main row -->

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




    </script>
    <?php  $this->end(); ?>
