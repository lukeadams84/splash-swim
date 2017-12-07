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

        <div class="col-lg-6 col-xs-12">
          <?php if(empty($user['address1']) || empty($user['town']) || empty($user['county'])) { ?>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Are you new?</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/user/users/edit/<?php echo $user['id'];?>">
            <?php //echo $this->Form->create('User', ['url' => ['prefix' => 'user', 'controller' => 'users', 'action' => 'edit', $user['id']]]);?>

              <div class="box-body">
                <p>Complete your profile.</p>

                <?php
                  //echo $this->Form->hidden('id', array('value' => $user['id']));
                  echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['email'] ));
                  echo $this->Form->input('firstname', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['firstname'] ));
                  echo $this->Form->input('lastname', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['lastname'] ));
                  echo $this->Form->input('address1', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['address1'] ));
                  echo $this->Form->input('address2', array('class' => 'form-control', 'type' => 'text', 'required' => false, 'value' => $user['address2'] ));
                  echo $this->Form->input('town', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['town'] ));
                  echo $this->Form->input('county', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['county'] ));
                ?>
                <p></p>
                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat')); ?>

            </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
      <?php } else { ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Get started...</h3>
        </div>

        <div class="box-body">
          <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <a href="/user/students/add">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Register a student</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
          <!-- /.info-box -->
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-plus-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Book a course</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          <!-- /.info-box -->
          </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-trophy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">View achievements</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        <!-- /.info-box -->
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-credit-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">View payments</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        <!-- /.info-box -->
        </div>
      </div>
      </div>

      </div>
    <?php } ?>
      </div>
      <!-- /.row -->
      <div class="row">



      </div>

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
