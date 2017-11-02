<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'admin-footer.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.2
    </div>
    <strong>Copyright &copy; 2017 Splash Swim School - Designed by <a href="https://www.thirteen-37.com">Thirteen-37</a>.</strong> All rights
    reserved.
</footer>
<?php } ?>
