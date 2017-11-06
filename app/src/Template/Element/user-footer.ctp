<?php
$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'user-footer.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<footer class="main-footer" style="background: #2d3e50; color: #aaa;">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.2
    </div>
    Copyright &copy; 2017 Splash Swim School - Designed & managed by <a href="https://www.thirteen-37.com" target="_blank"><img src="/img/logo-transparent-small.png" style="height:40px; vertical-align:middle;"></a> All rights
    reserved.
</footer>
<?php } ?>
