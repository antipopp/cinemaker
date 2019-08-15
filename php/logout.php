<?php
    include_once('utils/functions.php');
    include_once('../config.php');
    session_start();
    session_destroy();
    header('location: '.PathToUrl(ROOT."index.php"));
?>