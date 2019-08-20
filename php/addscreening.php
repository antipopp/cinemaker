<?php
    require_once 'utils/DbManager.php';
    require_once 'utils/queries.php';

    $errors = array(); 
    $success = array();
    $title = "";
    $sala = "";

    // seleziona film
    $movie_list = get_all_movies();
    $sala_list = get_all_rooms();

    if (isset($_POST['new_screening'])) {
        // input dal form
        $movie = $cineDb->sqlInjectionFilter($_POST['id_movie']);
        $sala = $cineDb->sqlInjectionFilter($_POST['id_sala']);
        $date = $cineDb->sqlInjectionFilter($_POST['date']);
        $time = $cineDb->sqlInjectionFilter($_POST['time']);
        
        $dateTime = strtotime($date . ' ' . $time);
        $start = date("Y-m-d H:i:s", $dateTime);
        
        $screen_check_query = "SELECT * FROM screenings WHERE screening_start='$start' LIMIT 1";
        $screen_check = $cineDb->performQuery($result_screen_check)->fetch_assoc();
            
        if ($screen_check) { // se la proiezione e` gia` inserita
            if ($screen_check['sala_id'] === $sala) {
                array_push($errors, "Proiezione gia` inserita");
            }
        }
        
        if (count($errors) == 0) {
            $query = "  INSERT INTO screenings (movie_id, sala_id, screening_start) 
                        VALUES(?, ?, ?)";   
            $params = array($movie, $sala, $start);
            if ($cineDb->performQueryWithParameters($query, 'iid', $params))
                array_push($success, "Proiezione inserita con successo");
            else 
                array_push($errors, $db->error);
        }
    }

    if (isset($_POST['select_id'])) {
        $movie = $_POST['id_movie'];
        $sala = $_POST['id_sala'];
        $seats = get_all_rooms()->fetch_assoc();
        $durata = get_all_movies()->fetch_assoc();
    }
?>