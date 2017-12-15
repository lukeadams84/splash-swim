<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/students">Students</a></li>
    <li class="active">Student profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('user4-128x128.jpg', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture')); ?>

          <h3 class="profile-username text-center"><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></h3>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">

              <?php
                // Calculate Age
                $then = new DateTime($student['dob']);
                $now = new DateTime('today');
              ?>

              <b>Age</b> <a class="pull-right"><?php  echo $then->diff($now)->y; ?></a>
            </li>
            <li class="list-group-item">
              <b>Gender</b> <a class="pull-right"><?php echo $student['gender']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Parent</b> <a href="/admin/users/profile/<?php echo $student['parent_id']; ?>" class="pull-right"><?php echo $student['parent']['firstname'] . ' ' . $student['parent']['lastname']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Joined</b> <a class="pull-right"><?php echo $this->Time->format($student['created'], "dd MMM yyyy"); ?></a>
            </li>


            <li class="list-group-item">
              <a href="/admin/students/goals/<?php echo $student->id;?>"><button type="button" class="btn btn-xs btn-block btn-primary">Manage Goals</button></a>
            </li>
          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
          <li><a href="#awards" data-toggle="tab">Awards</a></li>
          <li><a href="#enrolled" data-toggle="tab">Enrolled Courses</a></li>
          <li><a href="#courses" data-toggle="tab">Avail Courses</a></li>
          <li><a href="#transactions" data-toggle="tab">Transactions</a></li>
        </ul>
        <div class="tab-content">
          <div class=" active tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">

              <?php foreach($student['achievements'] as $achievement) { ?>

                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-yellow">
                      <?php echo $this->Time->format($achievement['_joinData']['created'], "d MMM yyyy", null); ?>
                    </span>
                </li>

                <!-- timeline item -->
                <li>
                  <i class="fa fa-trophy bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php $from = new DateTime($achievement['_joinData']['created']); $to = new DateTime('today'); echo date_diff($from, $to)->format("%a"); ?> days ago</span>

                    <h3 class="timeline-header"><?php echo $student['firstname'] . ' earned ' . $achievement['award'];?></h3>

                  </div>
                </li>
                <!-- END timeline item -->


              <?php } ?>

              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-green">
                      <?php echo $this->Time->format($student['created'], "d MMM yyyy", null); ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-user-plus bg-purple"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php $from = new DateTime($student['created']); $to = new DateTime('today'); echo date_diff($from, $to)->format("%a"); ?> days ago</span>

                  <h3 class="timeline-header"><?php echo $student['firstname'];?> joined Splash Swim School</h3>

                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="awards">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Award</th>
                  <th style="width: 60%;">Progress</th>
                  <th style="width: 40px"></th>
                </tr>
                <?php foreach($achievements as $achievement) {
                    $count = 0;
                    foreach($achieved as $goal) {
                      if($goal['achievement_id'] == $achievement['id']) {
                        $count++;
                      }
                    }
                    $progress = 0;
                    if($count > 0) {
                      $progress = ($count / count($achievement['goals'])) * 100;
                    }
                    $level = 'green';
                    $bar = 'success';
                    switch($achievement['level']) {
                      case 'intermediate':
                        $level = 'yellow';
                        $bar = 'warning';
                    }
                  ?>
                  <tr>
                    <td><?php echo $achievement['award']; ?></td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-<?php echo $bar; ?>" style="width: <?php echo $progress; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-<?php echo $level; ?>"><?php echo $progress; ?>%</span></td>
                  </tr>

                <?php } ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="enrolled">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Class Name</th>
                  <th>Venue</th>
                  <th>Week Number</th>
                  <th>Class Date</th>
                  <th>Class Time</th>
                </tr>
                <?php foreach($student['coursegroups'] as $course) {

                  if(count($course['classevents']) == 0) {
                  ?>
                  <tr>
                    <td><?php echo $course['swimclass']['name']; ?></td>
                    <td>Completed</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php } else { ?>
                <tr>
                  <td><?php echo $course['swimclass']['name']; ?></td>
                  <td><?php echo $course['classevents']['0']['venue']['name']; ?></td>
                  <td><?php echo $course['classevents']['0']['weeknum']; ?></td>
                  <td><?php echo $course['classevents']['0']['classdate']; ?></td>
                  <td><?php echo $course['classevents']['0']['time']; ?></td>
                </tr>

                <?php } } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="courses">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Next Class</th>
                  <th>Class Name</th>
                  <th>Venue</th>
                  <th>Week Number</th>
                  <th>Spaces</th>
                </tr>
                <?php foreach($courses as $course) { ?>
                  <?php if($course['classevents']) { ?>
                  <tr>
                    <td><?php echo $course['classevents']['0']['classdate']; ?></td>
                    <td><?php echo $course['swimclass']['name']; ?></td>
                    <td><?php echo $course['classevents']['0']['venue']['name']; ?></td>
                    <td><?php echo $course['classevents']['0']['weeknum']; ?></td>
                    <td><?php echo ($course['classevents']['0']['spaces'] - count($course['students'])); ?></td>
                  </tr>
                <?php } ?>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="transactions">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Class</th>
                  <th>Date</th>
                  <th>Price</th>

                </tr>
                <?php foreach($student['transactions'] as $transaction) { ?>

                  <tr>
                    <td><?php echo $transaction['coursegroup']['swimclass']['name']; ?> </td>
                    <td><?php echo $transaction['created']; ?></td>
                    <td><?php echo $transaction['amount']; ?></td>
                  </tr>

                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
