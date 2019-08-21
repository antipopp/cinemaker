<?php 
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';

    $errors = array(); 
    $success = array();
    $sala = "";

    // seleziona film
    $sala_list = get_all_rooms();

    if (isset($_POST['edit'])) {
        
    }
?>