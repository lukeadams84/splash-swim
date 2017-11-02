<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'user-sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
    ?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="<?php echo $this->Url->build('/user/dash'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Students</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/user/students'); ?>"><i class="fa fa-list"></i> List</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Transactions</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/user/transactions'); ?>"><i class="fa fa-list"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/user/transactions/payment'); ?>"><i class="fa fa-credit-card"></i> Make Payment</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Classes</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/user/swimclasses'); ?>"><i class="fa fa-list"></i> List</a></li>
        </ul>
    </li>
    <li><a href="<?php echo $this->Url->build('/user/pages/display/debug'); ?>"><i class="fa fa-bug"></i> Debug</a></li>
</ul>
<?php
} ?>
