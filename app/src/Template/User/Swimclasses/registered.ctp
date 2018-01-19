<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Registered Courses
  </h1>
  <ol class="breadcrumb">
    <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/user/swimclasses">Courses</a></li>
    <li class="active">Registered Courses</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <!-- /.col -->
    <div class="col-md-12 col-xs-12">
      <?php foreach($students as $student) { ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $student['firstname']; ?></h3>
        </div>
        <div class="box-body no-padding">

          <table class="table">
            <tr>
              <th>Course</th>
              <th>Next class</th>
              <th>Class Time</th>
              <th>Venue</th>
              <th>Week #</th>
              <th>Price</th>
            </tr>
            <?php foreach ($student['coursegroups'] as $course) { ?>
            <tr>
              <td><?php echo $course['swimclass']['name']; ?></td>
              <td><?php echo date('d-m-Y', strtotime($course['classevents']['0']['classdate'])); ?></td>
              <td><?php echo date('H:i A', strtotime($course['classevents']['0']['time'])); ?></td>
              <td><?php echo $course['classevents']['0']['venue']['name']; ?></td>
              <td><?php echo $course['classevents']['0']['weeknum'] . ' of ' . $course['classevents']['0']['length']; ?></td>
              <td><?php echo $course['price']; ?></td>
            </tr>
          <?php
}?>
          </table>

        </div>
        <!-- /.box-body -->
      </div>
    <?php } ?>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- /.col -->
    <div class="col-md-12 col-xs-12">
      <?php foreach($students as $student) { ?>
        <h1>
          <?php echo $student['firstname']; ?>
        </h1>
        <?php foreach ($student['coursegroups'] as $course) { ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $course['swimclass']['name'] . ' : ' . date('H:i', strtotime($course['classevents']['0']['time'])); ?></h3>
        </div>
        <div class="box-body no-padding">

          <table class="table">
            <tr>
              <?php
                $count = 1;
                foreach ($course['classevents'] as $class) { ?>
                  <th>Week: <?php echo $count; $count++; ?></th>
                <?php } ?>
            </tr>
            <tr>
              <?php foreach ($course['classevents'] as $class) { ?>
                <?php if(new DateTime($class['classdate']) > new DateTime('')) {
                  echo '<td style="background-color:green;">' . date('d-m-Y', strtotime($class['classdate'])) . '</td>';
                } else {
                  echo '<td style="background-color:#6699ff;">' . date('d-m-Y', strtotime($class['classdate'])) . '</td>';
                }
             } ?>
            </tr>
            

          </table>



        </div>
        <!-- /.box-body -->
      </div>
    <?php } } ?>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


</section>
<!-- /.content -->
