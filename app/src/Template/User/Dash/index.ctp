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
            <a href="/user/students" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php $coursecount = 0;foreach($students as $student) { $coursecount = $coursecount + count($student['coursegroups']); }

               echo $coursecount; ?></h3>

              <p>Registered Courses</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-exit"></i>
            </div>
            <a href="/user/swimclasses" class="small-box-footer">List <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
<?php
$this->Html->css([
    'UserLTE./plugins/iCheck/flat/blue',
    'UserLTE./plugins/morris/morris',
    'UserLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'UserLTE./plugins/datepicker/datepicker3',
    'UserLTE./plugins/daterangepicker/daterangepicker-bs3',
    'UserLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  'UserLTE./plugins/morris/morris.min',
  'UserLTE./plugins/sparkline/jquery.sparkline.min',
  'UserLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'UserLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'UserLTE./plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'UserLTE./plugins/datepicker/bootstrap-datepicker',
  'UserLTE./plugins/daterangepicker/daterangepicker',
  'UserLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>
