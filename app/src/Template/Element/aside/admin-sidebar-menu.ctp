<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'admin-sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="<?php echo $this->Url->build('/admin/dash'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/admin/users'); ?>"><i class="fa fa-list"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/admin/users/add'); ?>"><i class="fa fa-user-plus"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Students</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/admin/students'); ?>"><i class="fa fa-list"></i> List</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file"></i>
            <span>Courses</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/admin/swimclasses'); ?>"><i class="fa fa-list"></i> Course List</a></li>
            <li><a href="<?php echo $this->Url->build('/admin/swimclasses/add'); ?>"><i class="fa fa-plus"></i> Add</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Classes</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Url->build('/admin/classevents'); ?>"><i class="fa fa-list"></i> Scheduled Classes</a></li>
                    <li><a href="<?php echo $this->Url->build('/admin/classevents/calendar'); ?>"><i class="fa fa-calendar"></i> Calendar</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Transactions</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/admin/transactions'); ?>"><i class="fa fa-list"></i> List</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-trophy"></i>
            <span>Awards</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/admin/achievements'); ?>"><i class="fa fa-list"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/admin/achievements/add'); ?>"><i class="fa fa-plus-circle"></i> Add</a></li>
        </ul>
    </li>

    <li><a href="<?php echo $this->Url->build('/pages/debug'); ?>"><i class="fa fa-bug"></i> Debug</a></li>
</ul>
<?php } ?>
