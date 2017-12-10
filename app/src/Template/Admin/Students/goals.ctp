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

    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <?php foreach($achievements as $achievement) { ?>
          <li><a href="#<?php echo $achievement['id']; ?>" data-toggle="tab"><?php echo $achievement['award']; ?></a></li>
        <?php } ?>
        </ul>
        <div class="tab-content">
          <?php foreach($achievements as $achievement) { ?>
          <div class="tab-pane" id="<?php echo $achievement['id']; ?>">
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Goal</th>
                  <th>Achieved</th>
                </tr>
                  <?php foreach($achievement['goals'] as $goal) { ?>
                  <tr>
                    <td><?php echo $goal['goal']; ?></td>
                    <td></td>
                  </tr>
                <?php } ?>
              </table>


            </div>
            </div>
            <?php } ?>
            <!-- /.box-body -->




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
