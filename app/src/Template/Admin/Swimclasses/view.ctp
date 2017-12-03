<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Class Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/swimclasses">Classes</a></li>
    <li class="active">Class Details</li>
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
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-body no-padding">
          <!-- THE CALENDAR -->
          <div id="calendar"></div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Schedule Class</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/swimclasses/schedule" method="post">

          <div class="box-body">
            <div class="form-group">
              <input type="text" class="form-control hidden" name="swimclass_id" value="<?php echo $class['id']; ?>">
            </div>
            <!-- select -->
            <div class="form-group">
              <label>Venue</label>
              <select class="form-control" name="venue_id">
                <?php foreach($venues as $venue) { ?>
                  <option value="<?php echo $venue['id']; ?>"><?php echo $venue['name']; ?></option>

                <?php } ?>

              </select>
            </div>
            <div class="form-group">
              <label for="duration">Class Length (weeks)</label>
              <input type="text" class="form-control" name="length" value="<?php echo $class['length']; ?>">
            </div>
            <div class="form-group">
              <label for="duration">Spaces</label>
              <input type="text" class="form-control" name="spaces" value="<?php echo $class['size']; ?>">
            </div>
            <div class="form-group">
              <label for="duration">Start date</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="classdate" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
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
                <input type="text" class="form-control timepicker" name="time">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <div class="form-group">
            <label>Class length (mins)</label>
              <input type="text" class="form-control" name="duration" id="duration">
          </div>
          <div class="form-group">
            <label>Price</label>
              <input type="text" class="form-control" name="amount" id="amount">
          </div>
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
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/fullcalendar/fullcalendar.min',
],
['block' => 'script']);
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

<?php $this->start('scriptBotton');?>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      firstDay: 1,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [

        <?php foreach($class['classevents'] as $event) { ?>


        {
          title: '<?php echo $class['name']; ?>',
          start: new Date(
            <?php echo date('Y', strtotime($event['classdate']));?>,
            <?php echo date('m', strtotime($event['classdate'])) -1;?>,
            <?php echo date('d', strtotime($event['classdate']));?>,
            <?php echo date('H', strtotime($event['time']));?>,
            <?php echo date('i', strtotime($event['time']));?>),
          end: new Date(
            <?php echo date('Y', strtotime($event['classdate']));?>,
            <?php echo date('m', strtotime($event['classdate'])) -1;?>,
            <?php echo date('d', strtotime($event['classdate']));?>,
            <?php echo date('H', strtotime($event['time']));?>,
            <?php echo date('i', strtotime($event['time'])) + $event['length'];?>),
          allDay: false,
          backgroundColor: "#0073b7", //Blue
          borderColor: "#0073b7" //Blue
        },

        <?php } ?>
      ],
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar !!!

    });
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
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
      showInputs: false,
      showMeridian: false
    });

  });
</script>
<?php $this->end(); ?>
