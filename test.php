<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";
    echo $_SESSION['id'];
    // $var = is_admin($_SESSION['id']);
    // var_dump($var);
?>