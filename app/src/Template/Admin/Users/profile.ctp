<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users"> User list</a></li>
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
          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-book margin-r-5"></i>Address</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p class="text-muted">
            <?php echo $user['address1']; ?><br>
            <?php if(!empty($user['address2'])) { echo $user['address2'] . '<br>'; } else { ""; }; ?>
            <?php echo $user['town']; ?><br>
            <?php echo $user['county']; ?><br>
            <?php if(!empty($user['postcode'])) { echo $user['postcode'] . '<br>'; } else { ""; }; ?>
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
          <li><a href="#settings" data-toggle="tab">Edit</a></li>
          <li><a href="#password" data-toggle="tab">Password</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="children">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Date of Birth</th>
                  <th>Gender</th>
                  <th></th>
                </tr>
                <?php foreach($user['students'] as $student) { ?>
                  <?php $then = new DateTime($student['dob']);
                  $now = new DateTime('today'); ?>

                <tr>
                  <td><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($student['dob'])) . " (" . $then->diff($now)->y . ")"; ?></td>
                  <td><?php echo $student['gender']; ?></td>
                  <td><a href="/admin/students/profile/<?php echo $student['id']; ?>"><button type="button" class="btn btn-xs btn-block btn-primary">Profile</button></a>

                </tr>

                <?php }  ?>
              </table>
            </div>
          </div>
          <!-- /.tab-pane -->


          <div class="tab-pane" id="settings">
              <form method="post" class="form-horizontal" action="/admin/users/edit/<?php echo $user['id'];?>">

                <div class="box-body">
                  <h4>Edit your profile</h4>

                  <?php
                    echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['email'] ));
                    echo $this->Form->input('firstname', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['firstname'] ));
                    echo $this->Form->input('lastname', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['lastname'] ));
                    echo $this->Form->input('address1', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['address1'] ));
                    echo $this->Form->input('address2', array('class' => 'form-control', 'type' => 'text', 'value' => $user['address2'] ));
                    echo $this->Form->input('town', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['town'] ));
                    echo $this->Form->input('county', array('class' => 'form-control', 'type' => 'text', 'required' => true, 'value' => $user['county'] ));
                    echo $this->Form->input('postcode', array('class' => 'form-control', 'type' => 'text', 'value' => $user['postcode'] ));
                    echo $this->Form->input('phone', array('class' => 'form-control', 'type' => 'tel', 'required' => true, 'value' => $user['phone'] ));
                  ?>
                  <p></p>
                  <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
                </div>
              </form>
          </div>

          <div class="tab-pane" id="password">
              <form method="post" class="form-horizontal" action="/admin/users/changePassword/<?php echo $user['id'];?>">

                <div class="box-body">
                  <h4>Change your password</h4>

                  <?php
                    echo $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'required' => true ));
                    echo $this->Form->input('password_confirm', array('class' => 'form-control', 'type' => 'password', 'required' => true ));
                  ?>
                  <p></p>
                  <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
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
