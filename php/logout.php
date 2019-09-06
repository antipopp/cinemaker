<?php
    include_once('../config.php');
    include_once(UTILS.'functions.php');
    
    session_start();
    session_destroy();
    header('location: '.PathToUrl(ROOT."index.php"));
?>