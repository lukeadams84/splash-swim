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
            <li class="list-group-item">
              <b>Instructor</b> <a class="pull-right"><?php echo $class['teacher']['firstname']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Venue</b> <a class="pull-right"><?php echo $class['venue']['name']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Times</b> <a class="pull-right"><?php echo $class['day'] . ' at ' . $class['time']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Spaces</b> <a class="pull-right"><?php echo $class['size']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Course Length</b> <a class="pull-right"><?php echo $class['duration'] . ' weeks'; ?></a>
            </li>

          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->
    <div class="col-md-6">
      <div class="box box-primary">
        <h3 class="box-title">Schedule Class</h3>
        <div class="box-body no-padding">

          <table class="table">
            <tr>
              <th>Class Name</th>
              <th>Venue</th>
              <th>Start Date</th>
              <th></th>
              <th>Actions</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#"><button type="button" class="btn btn-xs btn-block btn-primary">Book</button></a></td>
            </tr>

          </table>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Schedule Class</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/swimclasses/schedule" method="post">

          <div class="box-body">
            <div class="form-group">
              <input type="text" class="form-control hidden" name="swimclass_id" value="<?php echo $class['id']; ?>">
            </div>
            <!-- select -->
            <div class="form-group">
              <label>Venue</label>
              <select class="form-control" name="venue_id">
                <?php foreach($venues as $venue) { ?>
                  <option value="<?php echo $venue['id']; ?>"><?php echo $venue['name']; ?></option>

                <?php } ?>

              </select>
            </div>
            <div class="form-group">
              <label for="duration">Class Length (weeks)</label>
              <input type="text" class="form-control" name="duration" value="<?php echo $class['duration']; ?>">
            </div>
            <div class="form-group">
              <label for="duration">Spaces</label>
              <input type="text" class="form-control" name="spaces" value="<?php echo $class['size']; ?>">
            </div>
            <div class="form-group">
              <label for="duration">Start date</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="classdate" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
              </div>
              <!-- /.input group -->
            </div>
            <div class="bootstrap-timepicker">
            <div class="form-group">
              <label>Class Time</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" class="form-control timepicker" name="time">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <div class="form-group">
            <label>Class length (mins)</label>
              <input type="text" class="form-control" name="length" id="length">
          </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Schedule</button>
          </div>
        </form>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->


  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
