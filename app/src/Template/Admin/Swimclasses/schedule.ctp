<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Schedule Class
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/swimclasses">Classes</a></li>
    <li class="active">Schedule</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">


          <h3 class="profile-username text-center"><?php echo $class['name']; ?></h3>

          <p class="text-muted text-center">Swim Class</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Instructor</b> <a class="pull-right"><?php echo $class['teacher']['firstname']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Venue</b> <a class="pull-right"><?php echo $class['venue']['name']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Times</b> <a class="pull-right"><?php echo $class['day'] . ' at ' . $class['time']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Spaces</b> <a class="pull-right"><?php echo $class['size']; ?></a>
            </li>
            <li class="list-group-item">
              <b>Course Length</b> <a class="pull-right"><?php echo $class['duration'] . ' weeks'; ?></a>
            </li>

          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Scheduled Classes</h3>
        </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Date</th>
            <th>Class</th>

            <th>Students</th>
          </tr>

          <?php foreach($class['classevents'] as $event) { ?>

            <tr>
              <td><?php echo date('d-M', strtotime($event['classdate'])) ?></td>
              <td><?php echo $class['name']; ?></td>

              <td><?php echo ''; ?></td>
            </tr>
          <?php } ?>
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
          <h3 class="box-title">Schedule Class</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/admin/swimclasses/schedule/<?php echo $class['id']; ?>">

          <div class="box-body">
            <div class="form-group">
              <input type="text" class="form-control hidden" id="swimclass_id" value="<?php echo $class['swimclass_id']; ?>">
            </div>
            <!-- select -->
            <div class="form-group">
              <label>Instructor</label>
              <select class="form-control" id="teacher_id">
                <?php foreach($teachers as $instructor) { ?>
                  <option><?php echo $instructor['firstname']; ?></option>

                <?php } ?>

              </select>
            </div>
            <div class="form-group">
              <label>Venue</label>
              <select class="form-control" id="venue_id">
                <?php foreach($venues as $venue) { ?>
                  <option><?php echo $venue['name']; ?></option>

                <?php } ?>

              </select>
            </div>
            <div class="form-group">
              <label for="duration">Class Length (weeks)</label>
              <input type="text" class="form-control" id="duration" value="<?php echo $class['duration']; ?>">
            </div>
            <div class="form-group">
              <label for="duration">Start date</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" id="classdate" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div>
              <!-- /.input group -->
            </div>
            <div class="bootstrap-timepicker">
            <div class="form-group">
              <label>Class Time</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" class="form-control timepicker" id="time">
              </div>
              <!-- /.input group -->
            </div>
            </div>
            <div class="form-group">
              <label>Time selector</label>
              <input type="checkbox" id="10:00" value="10:00"> 10:00
            </div>
            <div class="form-group">
              <label>Class length (mins)</label>


                <input type="text" class="form-control" name="mins" id="mins">

            </div>


          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Schedule</button>
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
<?php
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/iCheck/icheck.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>
