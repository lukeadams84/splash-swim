<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transactions
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transactions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transactions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="list" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Student</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Result</th>
                        <th scope="col">Last 4 card digits</th>
                        <th scope="col">Card Type</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($transactions as $transaction): ?>
                  <tr>
                      <td><?= h($transaction->braintreeid) ?></td>
                      <td><?= h($transaction->student->firstname) ?></td>
                      <td><?= h($transaction->amount) ?></td>
                      <td><?= h($transaction->created) ?></td>
                      <td><?= h($transaction->processorresponse) ?></td>
                      <td><?= h($transaction->last4) ?></td>
                      <td><?= h($transaction->cardtype) ?></td>
                      <td class="actions">
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
<?php
$this->Html->css([
    'UserLTE./plugins/iCheck/flat/blue',
    'UserLTE./plugins/morris/morris',
    'UserLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'UserLTE./plugins/datepicker/datepicker3',
    'UserLTE./plugins/daterangepicker/daterangepicker-bs3',
    'UserLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  'UserLTE./plugins/morris/morris.min',
  'UserLTE./plugins/sparkline/jquery.sparkline.min',
  'UserLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'UserLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'UserLTE./plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'UserLTE./plugins/datepicker/bootstrap-datepicker',
  'UserLTE./plugins/daterangepicker/daterangepicker',
  'UserLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>



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
