<?php 
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';

    $errors = array(); 
    $success = array();
    $sala = "";

    // seleziona film
    $sala_list = get_all_rooms();

    if (isset($_POST['edit'])) {
        $date = $cineDb->sqlInjectionFilter($_POST['date']);
        $time = $cineDb->sqlInjectionFilter($_POST['time']);

        $dateTime = strtotime($date . ' ' . $time);
        $start = date("Y-m-d H:i:s", $dateTime);

        update_screening($_POST['id'], $start);
        array_push($success, 'Aggiornamento avvenuto con successo');
    }

    if (isset($_POST['delete'])) {
        delete_screening($_POST['id']);
        array_push($success, 'Proiezione eliminata');
    }
?>