<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create a new Course</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/admin/swimclasses/add">

          <div class="box-body">
            <div class="form-group">
              <label for="duration">Class Name</label>
              <input type="text" class="form-control" name="name" id="name" value="">
            </div>
            <div class="form-group">
              <label for="duration">Duration</label>
              <input type="text" class="form-control" name="duration" id="duration" value="">
            </div>
            <div class="form-group">
              <label for="duration">Class Size</label>
              <input type="text" class="form-control" name="size" id="size" value="">
            </div>
            <div class="form-group">
              <label for="duration">Price</label>
              <input type="text" class="form-control" name="price" id="price" value="">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Class</button>
          </div>
        </form>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
