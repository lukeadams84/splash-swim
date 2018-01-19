
<?php $this->layout = 'UserLTE.login'; ?>

<form action="<?php echo $this->Url->build(array('prefix' => 'user', 'controller' => 'users', 'action' => 'login')); ?>" method="post">
  <div class="form-group has-feedback">
    <input type="text" class="form-control" placeholder="Email" name="email">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Password" name="password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <a href="/user/users/register" class="btn btn-primary btn-block btn-flat"><?php echo __('Register') ?></a>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
</form>
<?php echo $this->element('gtag'); ?>
