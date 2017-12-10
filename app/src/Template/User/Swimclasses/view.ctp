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


          <h3 class="profile-username text-center"><?php echo $courses['name']; ?></h3>

          <a href="/user/swimclasses/book/<?php echo $courses['id']; ?>"><button type="button" class="btn btn-xs btn-block btn-primary">Book</button></a>

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
        <h3 class="box-title">Next scheduled course blocks</h3>
        <div class="box-body no-padding">

          <table class="table">
            <tr>
              <th>Course Start</th>
              <th>Class Time</th>
              <th>Venue</th>
              <th>Course Length</th>
              <th>Price</th>
              <th>Spaces</th>
            </tr>
            <?php foreach ($courses['classevents'] as $course) {
    ?>
            <tr>
              <td><?php echo $this->Time->format($course['classdate'], 'dd/M/yy'); ?></td>
              <td><?php echo $this->Time->format($course['time'], 'HH:mm'); ?></td>
              <td><?php echo $course['venue']['name']; ?></td>
              <td><?php echo $course['length'] . ' Weeks'; ?></td>
              <td><?php echo $course['coursegroup']['price']; ?></td>
              <td><?php echo $course['spaces'] - count($course['students']); ?></td>
            </tr>
          <?php
}?>
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
