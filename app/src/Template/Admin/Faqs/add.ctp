<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create a new FAQ entry</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/admin/faqs/add">

          <div class="box-body">
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" name="category" id="category">
                <option>General</option>
                <option>Splash Babies</option>
                <option>Splash Kids</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="">
            </div>
            <div class="form-group">
              <label for="text">Text</label>
              <input type="text" class="form-control" name="text" id="text" value="">
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Faq</button>
          </div>
        </form>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
