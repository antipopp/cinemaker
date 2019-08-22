<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";

    $result = get_movie_cover('img_5d5c0d6849a29');
    echo $result;
?>