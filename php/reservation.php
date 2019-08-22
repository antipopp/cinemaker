<?php 
    require_once '../config.php';
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';
    require_once UTILS.'functions.php';

    $errors = [];
    $success = [];

    $movies = get_onair();
?>