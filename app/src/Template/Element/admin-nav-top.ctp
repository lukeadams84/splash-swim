<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'admin-nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $this->Html->image('swimming-pool-icon-png-3.png', array('class' => 'user-image', 'alt' => 'User Image', 'style' => 'background-color: #FFF')); ?>
                    <span class="hidden-xs"><?php echo $this->request->session()->read('Auth.User.firstname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <?php echo $this->Html->image('swimming-pool-icon-png-3.png', array('class' => 'img-circle', 'alt' => 'User Image', 'style' => 'background-color: #FFF')); ?>

                        <p>
                            <?php echo $this->request->session()->read('Auth.User.firstname') . ' ' . $this->request->session()->read('Auth.User.lastname'); ?>
                            <small>Member since <?php echo $this->request->session()->read('Auth.User.created.date'); ?></small>
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="/admin/users/profile/<?php echo $this->request->session()->read('Auth.User.id'); ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="/admin/users/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
<?php } ?>
