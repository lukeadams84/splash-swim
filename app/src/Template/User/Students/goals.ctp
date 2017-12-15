<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Student Goals
  </h1>
  <ol class="breadcrumb">
    <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/user/students">Students</a></li>
    <li><a href="/user/students/profile/<?php echo $studentid; ?>">Student Profile</a></li>
    <li class="active">Student Goals</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#beginner" data-toggle="tab">Beginner Level</a></li>
          <li><a href="#intermediate" data-toggle="tab">Intermediate Level</a></li>
          <li><a href="#advanced" data-toggle="tab">Advanced Level</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="beginner">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php $tabindex = 0; foreach($achievements as $achievement) {
                if($achievement['level'] == 'beginner') {
                ?>
              <li <?php if($tabindex == 0) { echo 'class="active"'; } ?>><a href="#<?php echo $achievement['id']; ?>" data-toggle="tab"><?php echo $achievement['award']; ?></a></li>
            <?php $tabindex++; } } ?>
            </ul>
            <div class="tab-content">
              <?php $index = 0; foreach($achievements as $achievement) {
                if($achievement['level'] == 'beginner') {
              ?>
              <div class="<?php if($index == 0) { echo "active"; } ?> tab-pane" id="<?php echo $achievement['id']; ?>">
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                      <th>Goal</th>
                      <th style="width:15%;">Achieved</th>
                    </tr>
                      <?php
                        $count = 0;
                        $total = 0;
                        foreach($goals as $goal) {
                          if($goal['achievement_id'] == $achievement['id']) {
                            $total++;
                      ?>
                      <tr>
                        <td><?php echo $goal['goal']; ?></td>
                        <td>
                          <?php
                            if(!empty($goal['students'])) {
                              $count++;
                              echo date('d-m-Y', strtotime($goal['students']['0']['_joinData']['created']));
                            } ?>
                            </td>
                      </tr>
                    <?php } } ?>
                  </table>


                </div>
                  <?php
                    $progress = 0;
                    if($count > 0) {
                      $progress = ($count / $total) * 100;
                    }
                    if($progress == 100 && !empty($achievement['students'])) {
                   ?>
                  <h4 style="text-align:center">Award earned: <?php echo date('d-m-Y', strtotime($achievement['students']['0']['_joinData']['created'])); ?></h4>
                <?php } else { ?>
                  <h4 style="text-align:center">Complete all goals to get award.</h4>
                <?php } ?>

                </div>
                <?php $index++; } } ?>
                <!-- /.box-body -->




            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
          </div>

          <div class="tab-pane" id="intermediate">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <?php $tabindex = 0; foreach($achievements as $achievement) {
                  if($achievement['level'] == 'intermediate') {
                  ?>
                <li <?php if($tabindex == 0) { echo 'class="active"'; } ?>><a href="#<?php echo $achievement['id']; ?>" data-toggle="tab"><?php echo $achievement['award']; ?></a></li>
              <?php $tabindex++; } } ?>
              </ul>
              <div class="tab-content">
                <?php $index = 0; foreach($achievements as $achievement) {
                  if($achievement['level'] == 'intermediate') {
                ?>
                <div class="<?php if($index == 0) { echo "active"; } ?> tab-pane" id="<?php echo $achievement['id']; ?>">
                  <div class="box-body no-padding">
                    <table class="table">
                      <tr>
                        <th>Goal</th>
                        <th style="width:15%;">Achieved</th>
                      </tr>
                        <?php
                          $count = 0;
                          $total = 0;
                          foreach($goals as $goal) {
                            if($goal['achievement_id'] == $achievement['id']) {
                              $total++;
                        ?>
                        <tr>
                          <td><?php echo $goal['goal']; ?></td>
                          <td>
                            <?php
                              if(!empty($goal['students'])) {
                                $count++;
                                echo date('d-m-Y', strtotime($goal['students']['0']['_joinData']['created']));
                              }

                            ?></td>
                        </tr>
                      <?php } } ?>
                    </table>


                  </div>
                    <?php
                      $progress = 0;
                      if($count > 0) {
                        $progress = ($count / $total) * 100;
                      }
                      if($progress == 100 && !empty($achievement['students'])) {
                     ?>
                    <h4 style="text-align:center">Award earned: <?php echo date('d-m-Y', strtotime($achievement['students']['0']['_joinData']['created'])); ?></h4>
                  <?php } else { ?>
                    <h4 style="text-align:center">Complete all goals to get award.</h4>
                  <?php } ?>

                  </div>
                  <?php $index++; } } ?>
                  <!-- /.box-body -->




              </div>
              <!-- /.tab-content -->
            </div>
          </div>

          <div class="tab-pane" id="advanced">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php $tabindex = 0; foreach($achievements as $achievement) {
                if($achievement['level'] == 'advanced') {
                ?>
              <li <?php if($tabindex == 0) { echo 'class="active"'; } ?>><a href="#<?php echo $achievement['id']; ?>" data-toggle="tab"><?php echo $achievement['award']; ?></a></li>
            <?php $tabindex++; } } ?>
            </ul>
            <div class="tab-content">
              <?php $index = 0; foreach($achievements as $achievement) {
                if($achievement['level'] == 'advanced') {
              ?>
              <div class="<?php if($index == 0) { echo "active"; } ?> tab-pane" id="<?php echo $achievement['id']; ?>">
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                      <th>Goal</th>
                      <th style="width:15%;">Achieved</th>
                    </tr>
                      <?php
                        $count = 0;
                        $total = 0;
                        foreach($goals as $goal) {
                          if($goal['achievement_id'] == $achievement['id']) {
                            $total++;
                      ?>
                      <tr>
                        <td><?php echo $goal['goal']; ?></td>
                        <td>
                          <?php
                            if(!empty($goal['students'])) {
                              $count++;
                              echo date('d-m-Y', strtotime($goal['students']['0']['_joinData']['created']));
                            }

                          ?></td>
                      </tr>
                    <?php } } ?>
                  </table>


                </div>
                  <?php
                    $progress = 0;
                    if($count > 0) {
                      $progress = ($count / $total) * 100;
                    }
                    if($progress == 100 && !empty($achievement['students'])) {
                   ?>
                  <h4 style="text-align:center">Award earned: <?php echo date('d-m-Y', strtotime($achievement['students']['0']['_joinData']['created'])); ?></h4>
                <?php } else { ?>
                  <h4 style="text-align:center">Complete all goals to get award.</h4>
                <?php } ?>

                </div>
                <?php $index++; } } ?>
                <!-- /.box-body -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
          </div>

      </div>
    </div>
    <!-- /.col -->
  </div>
</div>
  <!-- /.row -->



</section>
<!-- /.content -->
