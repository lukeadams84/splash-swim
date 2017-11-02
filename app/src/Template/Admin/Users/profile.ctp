<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users">User List</a></li>
    <li class="active">User profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('swimming-pool-icon-png-3.png', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture', 'style' => 'background-color: #FFF')); ?>

          <h3 class="profile-username text-center"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h3>



          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Registered children</b> <a class="pull-right"><?php echo count($user['students']); ?></a>
            </li>
            <li class="list-group-item">
              <b>Email Address</b> <a class="pull-right"><?php echo $user['email']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Phone</b> <a class="pull-right"><?php echo $user['phone']; ?></a>
            </li>

            <li class="list-group-item">
              <b>Edit details</b> <a href="/admin/users/edit/<?php echo $user['id']; ?>" class="pull-right">Edit</a>
            </li>
          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Address</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Address 1</strong>

          <p class="text-muted">
            <?php echo $user['address1']; ?>
          </p>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#children" data-toggle="tab">Children</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="children">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Date of Birth</th>
                  <th>Gender</th>
                </tr>
                <?php foreach($user['students'] as $student) { ?>
                <tr>
                  <td><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></td>
                  <td><?php echo $student['dob']; ?></td>
                  <td><?php echo $student['gender']; ?></td>
                </tr>

                <?php }  ?>
              </table>
            </div>
          </div>
          <!-- /.tab-pane -->


          <div class="tab-pane" id="settings">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                <div class="col-sm-10">
                  <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
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
