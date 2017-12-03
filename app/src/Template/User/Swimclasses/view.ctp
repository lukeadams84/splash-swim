<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Class Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/user/swimclasses">Classes</a></li>
    <li class="active">Class Details</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">


          <h3 class="profile-username text-center"><?php echo $class['name']; ?></h3>

          <p class="text-muted text-center">Swim Class</p>

          <ul class="list-group list-group-unbordered">


          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <h3 class="box-title">Available Course</h3>
        <div class="box-body no-padding">

          <table class="table">
            <tr>
              <th>Course Start</th>
              <th>Class Time</th>
              <th>Venue</th>
              <th>Course Length</th>
              <th>Price</th>
              <th>Spaces</th>
              <th>Actions</th>
            </tr>
            <?php foreach($courses as $course) {


                if(count($course['classevents']) != 0 && date($course['classevents']['0']['classdate']) < date(strtotime('now'))) {
            ?>
            <tr>
              <td><?php echo $this->Time->format($course['classevents']['0']['classdate'], 'dd/M/yy');?></td>
              <td><?php echo $this->Time->format($course['classevents']['0']['time'], 'HH:mm'); ?></td>
              <td><?php echo $course['classevents']['0']['venue']['name']; ?></td>
              <td><?php echo $course['courselength'] . ' Weeks'; ?></td>
              <td><?php echo $course['price']; ?></td>
              <td><?php echo $course['classevents']['0']['spaces'] - count($course['students']); ?></td>
              <td><a href="/user/swimclasses/book/<?php echo $course['id']; ?>"><button type="button" class="btn btn-xs btn-block btn-primary">Book</button></a></td>
            </tr>
          <?php } }?>
          </table>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->



  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
