<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/user/students">Students</a></li>
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
              <b>Edit details</b> <a href="/admin/students/edit/<?php echo $student['id']; ?>" class="pull-right">Edit</a>
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
          <!--<li><a href="#awards" data-toggle="tab">Awards</a></li>-->
          <li><a href="#enrolled" data-toggle="tab">Enrolled Courses</a></li>
          <li><a href="#courses" data-toggle="tab">Available Courses</a></li>
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

          <!--<div class="tab-pane" id="awards">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">Date</th>
                  <th>Award</th>
                  <th>Progress</th>
                  <th style="width: 40px"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </table>
            </div>-->
            <!-- /.box-body -->
          <!--</div>-->
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
                <?php foreach($courses as $course) {
                  if($course['classevents']) { ?>
                  <tr>
                    <td><?php echo $this->Time->format($course['classevents']['0']['classdate'], 'dd/M/yy') . ' - ' . $this->Time->format($course['classevents']['0']['time'], 'HH:mm'); ?></td>
                    <td><?php echo $course['swimclass']['name']; ?></td>
                    <td><?php echo $course['classevents']['0']['venue']['name']; ?></td>
                    <td><?php echo $course['classevents']['0']['weeknum']; ?></td>
                    <td><?php echo ($course['classevents']['0']['spaces'] - count($course['students'])); ?></td>
                  </tr>
                <?php } }?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="transactions">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Reference</th>
                  <th>Class</th>
                  <th>Date</th>
                  <th>Price</th>

                </tr>
                <?php foreach($student['transactions'] as $transaction) { ?>

                  <tr>
                    <td><?php echo $transaction['braintreeid']; ?></td>
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
