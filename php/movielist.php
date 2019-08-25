<?php
    require_once UTILS.'DbManager.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    session_start();

    $movies = get_all_movies();
    $errors = [];
    $success = [];
    if (isset($_POST['set_onair'])) {
        $id = $cineDb->sqlInjectionFilter($_POST['movie']);
        $result = set_onair($id);
        array_push($success, "Film pubblicato");
        header("Refresh: 2");
    }

    if (isset($_POST['unset_onair'])) {
        $id = $cineDb->sqlInjectionFilter($_POST['movie']);
        $result = unset_onair($id);
        array_push($success, "Film nascosto");
        header("Refresh: 2");
    }

    if (isset($_POST['delete_movie'])) {
        $id = $cineDb->sqlInjectionFilter($_POST['movie']);
        $result = delete_movie($id);
        array_push($success, "Film rimosso");
        header("Refresh: 2");
    }
?>