<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Schedule Calendar
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/classevents">Classes</a></li>
    <li class="active">Calendar</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-9">
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
    <!-- /.col -->
    <div class="col-md-3">
      <div class="box box-primary">

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
      defaultView: 'agendaWeek',
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

        <?php foreach($classes as $event) {

          if($event['swimclass']['name'] == 'Beginner') {
            $backgroundcolor = '#009933';
          }
          else if($event['swimclass']['name'] == 'Intermediate') {
            $backgroundcolor = '#4286f4';
          }
          else if($event['swimclass']['name'] == 'Advanced') {
            $backgroundcolor = '#ff6600';
          }
          else if($event['swimclass']['name'] == 'Private') {
            $backgroundcolor = '#be41f4';
          }
          else {
            $backgroundcolor = '#41f4e5';
          }


          ?>

        {
          title: '<?php echo $event['swimclass']['name'] . ' Wk#' . $event['weeknum']; ?>',
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
          backgroundColor: "<?php echo $backgroundcolor; ?>",
          borderColor: "<?php echo $backgroundcolor; ?>"
        },

        <?php } ?>
      ],
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar !!!

    });


  });
</script>
<?php $this->end(); ?>
