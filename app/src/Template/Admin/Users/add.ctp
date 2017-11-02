<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($user) ?>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <?php
                      echo $this->Form->control('username');
                      echo $this->Form->control('password');
                      echo $this->Form->control('email');
                      echo $this->Form->control('firstname');
                      echo $this->Form->control('lastname');
                      echo $this->Form->control('role');
                  ?>
              </div>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <?= $this->Form->end() ?>

              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-lg-6 -->
      </div>
      <!-- /.row -->
