<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Courses
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Courses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Courses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <table id="list" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Duration</th>
                <th scope="col">Price</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= h($class->name) ?></td>
                <td><?= h($class->size) ?></td>
                <td><?= h($class->duration) ?></td>
                <td><?= h($class->price) ?></td>
                <td class="actions">
                    <a href="/user/swimclasses/book/<?php echo $class->id; ?>"><button type="button" class="btn btn-xs btn-block btn-primary">Book</button></a>

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
'UserLTE./plugins/datatables/dataTables.bootstrap',
],
['block' => 'css']);

$this->Html->script([
'UserLTE./plugins/datatables/jquery.dataTables.min',
'UserLTE./plugins/datatables/dataTables.bootstrap.min',
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
  "autoWidth": false
  });
});
</script>
<?php $this->end(); ?>
