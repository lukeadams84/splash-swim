<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Awards In Progress
  </h1>
  <ol class="breadcrumb">
    <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Awards</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <?php foreach ($students as $student) { ?>
      <div class="box">

  <div class="box-body table-responsive">
    <table id="list" class="table table-bordered table-hover">
        <thead>
            <tr>
              <th scope="col">Firstname</th>
              <th scope="col">Award</th>
              <th scope="col" style="width: 60%;">Progress</th>

              <th style="width: 40px;"></th>
          </tr>
      </thead>
      <tbody>

          <?php foreach ($achievements as $achievement) {
            $count = 0;
            foreach($achieved as $goal) {
                if($goal['_matchingData']['Students']['id'] == $student['id']) {
                  if($goal['achievement_id'] == $achievement['id']) {
                    $count++;
                }
              }
            }
            $progress = 0;
            if($count > 0) {
              $progress = ($count / count($achievement['goals'])) * 100;
            }
            $level = 'green';
            $bar = 'success';
            switch($achievement['level']) {
              case 'intermediate':
                $level = 'yellow';
                $bar = 'warning';
            }
            if($count > 0 ) {
          ?>
        <tr>
            <td><?php echo $student['firstname']; ?></td>
            <td><?php echo $achievement['award']; ?></td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-<?php echo $bar; ?>" style="width: <?php echo $progress; ?>%"></div>
              </div>
            </td>
            <td><span class="badge bg-<?php echo $level; ?>"><?php echo $progress; ?>%</span></td>

        </tr>
      <?php } }?>
    </tbody>
</table>
</div>


<!-- /.box-body -->
</div>
<?php } ?>
<!-- /.box -->
</section>
<!-- /.content -->
