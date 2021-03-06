<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Scheduled Classes
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Classes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Classes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <table id="list" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Venue</th>
                <th scope="col">Week Number</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Spaces</th>
                <th scope="col">Registered Students</th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= h($class->swimclass->name) ?></td>
                <td><?= h($class->venue->name) ?></td>
                <td><?= h($class->weeknum) ?></td>
                <td><?= h($class->classdate) ?></td>
                <td><?= h($class->time) ?></td>
                <td><?= h($class->spaces) ?></td>
                <td><?php echo count($class['coursegroup']['students']); ?></td>
                <td class="actions">

                    <a href="/admin/swimclasses/view/<?php echo $class->id;?>"><button type="button" class="btn btn-xs btn-block btn-primary">View</button></a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
<?php
$this->Html->css([
'AdminLTE./plugins/iCheck/flat/blue',
'AdminLTE./plugins/morris/morris',
'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
'AdminLTE./plugins/datepicker/datepicker3',
'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
],
['block' => 'css']);

$this->Html->script([
'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
'AdminLTE./plugins/morris/morris.min',
'AdminLTE./plugins/sparkline/jquery.sparkline.min',
'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
'AdminLTE./plugins/knob/jquery.knob',
'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
'AdminLTE./plugins/datepicker/bootstrap-datepicker',
'AdminLTE./plugins/daterangepicker/daterangepicker',
'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>



<?php
$this->Html->css([
'AdminLTE./plugins/datatables/dataTables.bootstrap',
],
['block' => 'css']);

$this->Html->script([
'AdminLTE./plugins/datatables/jquery.dataTables.min',
'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
$(function () {
$('#list').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"order": [[ 3, "asc" ]]
});
});
</script>
<?php $this->end(); ?>
