<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'admin-aside-main-sidebar.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php echo $this->element('aside/admin-user-panel'); ?>



        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo $this->element('aside/admin-sidebar-menu'); ?>

    </section>
    <!-- /.sidebar -->
</aside>
<?php } ?>
