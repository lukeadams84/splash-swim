<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Achievement
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/achievements">Achievements</a></li>
    <li class="active">Achievement</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <h3 class="profile-username text-center"><?php echo $achievement['award']; ?></h3>



          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">


              <b>Issuing Body</b> <a class="pull-right"><?php  echo $achievement['awardbody']['name']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Goals</b> <a class="pull-right"><?php echo count($achievement['goals']); ?></a>
            </li>
            <li class="list-group-item">
              <b>Course</b> <a class="pull-right"></a>
            </li>
          </ul>

          <p><?php echo $achievement['notes']; ?></p>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Goals</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th></th>
              <th>Goal</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($achievement['goals'] as $goal) { ?>

            <tr>
              <td><i class="fa fa-trophy bg-yellow" style="width: 30px; height: 30px; line-height: 30px; color: #666; background: #d2d6de; border-radius: 50%;text-align: center;"></i></td>
              <td><?php echo $goal['goal']; ?></td>

            </tr>
            <?php } ?>

            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Goal</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/achievements/addgoal" method="post">

          <div class="box-body">
            <div class="form-group">
              <input type="text" class="form-control hidden" name="achievement_id" value="<?php echo $achievement['id']; ?>">
            </div>
            <div class="form-group">
              <label for="goal">Goal</label>
              <input type="text" class="form-control" name="goal">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add</button>
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
