<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'admin-user-panel.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<div class="user-panel">
    <div class="pull-left image">
        <?php echo $this->Html->image('swimming-pool-icon-png-3.png', array('class' => 'img-circle', 'alt' => 'User Image', 'style' => 'background-color: #FFF')); ?>
    </div>
    <div class="pull-left info">
        <p><?php echo $this->request->session()->read('Auth.User.firstname') . ' ' . $this->request->session()->read('Auth.User.lastname'); ?></p>

    </div>
</div>
<?php } ?>
