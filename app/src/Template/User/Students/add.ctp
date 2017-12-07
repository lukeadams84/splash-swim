<section class="content-header">
  <h1>
    Students
    <small>Add</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/user/dash"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/user/students">Students</a></li>
    <li class="active">Add
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-6 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add a student</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create($student);?>

          <div class="box-body">

            <?php
              echo $this->Form->input('firstname', array('class' => 'form-control', 'type' => 'text', 'required' => true));
              echo $this->Form->input('lastname', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
              echo $this->Form->hidden('parent_id', array('value' => $this->request->session()->read('Auth.User.id')));?>
              <div class="form-group">
                <label for="dob">Date of Birth</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" id="dob" name="dob">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
              <?php echo $this->Form->radio('gender', ['m' => 'm', 'f' => 'f']);?>
            </div>
            </div>
            <div class="form-group">
              <label>Proficiency</label>
              <?php echo $this->Form->select('level', ['beginner' => 'beginner', 'intermediate' => 'intermediate', 'advanced' => 'advanced', 'babytoddler' => 'baby/toddler'], array('class' => 'form-control', 'type' => 'text', 'required' => true )); ?>
            </div>
            <?php echo $this->Form->input('requirements', array('class' => 'form-control', 'type' => 'text', 'required' => true ));?>
            <p></p>
            <?php echo $this->Form->submit('Add', array('class' => 'btn btn-primary btn-block btn-flat')); ?>

        </form>
        </div>
        <!-- /.box -->
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Help</h3>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <p>Please enter the details to register a student. We need as much information as possible, and if you have any special requirements, please list them in the appropriate box.</p>
          <h3>Proficiency levels</h3>
          <p>Proficiency is only a guide to help us ensure the student is in the appropriate group. This is not applicable to splash babies. Levels would be similar to the following:</p>
          <h4>Beginners</h4>
          <p>A beginner would be new to the water, and may have little or no previous swimming experience.</p>
          <h4>Intermediate</h4>
          <p>Intermediate students are comfortable in the water, and have taken lessons previously.</p>
          <h4>Advanced</h4>
          <p>Advanced students are comfortable in the water, and are ready for some challenges.</p>
          <h3>Requirements</h3>
          <p>If your student has any specific requirements, please list them here.</p>
        </div>
      </div>
    </div>
  </div>

</section>


<?php
$this->Html->css([
  'UserLTE./plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  'UserLTE./plugins/input-mask/jquery.inputmask',
  'UserLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'UserLTE./plugins/input-mask/jquery.inputmask.extensions',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  'UserLTE./plugins/datepicker/bootstrap-datepicker',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
$(function () {
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
  });
});
</script>
<?php $this->end(); ?>
