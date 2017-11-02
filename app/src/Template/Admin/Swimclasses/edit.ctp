
<section class="content">

<div class="row">

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Schedule Class</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" action="/admin/swimclasses/edit">

        <div class="box-body">
          <div class="form-group">
            <input type="text" class="form-control" name="id" id="id" value="<?php echo $class['id']; ?>">
          </div>
          <div class="form-group">
            <label for="duration">Class Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $class['name']; ?>">
          </div>
          <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" name="duration" id="duration" value="<?php echo $class['duration']; ?>">
          </div>
          <div class="form-group">
            <label for="duration">Class Size</label>
            <input type="text" class="form-control" name="size" id="size" value="<?php echo $class['size']; ?>">
          </div>
          <div class="form-group">
            <label for="duration">Price</label>
            <input type="text" class="form-control" name="price" id="price" value="<?php echo $class['price']; ?>">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Class</button>
        </div>
      </form>
      </div>
      <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

</section>
