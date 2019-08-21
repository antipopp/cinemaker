<?php
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';

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
        
        // controllo proiezione già inserita
        $screen_avl_query = "SELECT * FROM screenings WHERE screening_start='$start' AND sala_id=$sala LIMIT 1";
        $screen_avl = $cineDb->performQuery($screen_avl_query)->fetch_assoc();           
        if ($screen_avl) { // se la proiezione è già inserita
            if ($screen_avl['sala_id'] === $sala) {
                array_push($errors, "Proiezione già inserita");
            }
        }

        // controllo proiezioni troppo vicine
        $durata = get_movie($movie)->fetch_assoc();
        $minutes = $durata['duration'];
        $room_busy_check = "SELECT id, screening_start 
                            FROM screenings
                            WHERE sala_id = $sala
                            AND TIMESTAMPDIFF(MINUTE, screening_start, '$start') < $minutes
                            AND TIMESTAMPDIFF(MINUTE, screening_start, '$start') > -$minutes";
        $room_busy = $cineDb->performQuery($room_busy_check);
        if ($room_busy) { // se sono presenti proiezioni troppo vicine
            while ($data = $room_busy->fetch_assoc()) {
                array_push($errors, "Ci sono proiezioni il ".$data['screening_start']);
            }
        }

        // se non ci sono errori inserisco
        if (count($errors) == 0) {
            $query = "  INSERT INTO screenings (movie_id, sala_id, screening_start) 
                        VALUES(?, ?, ?)";   
            $params = array($movie, $sala, $start);
            if (!$result = $cineDb->performQueryWithParameters($query, 'iis', $params))
                array_push($success, 'Proiezione inserita con successo');
            else 
                array_push($errors, 'Errore server');
        }
    }

    if (isset($_POST['select_id'])) {
        $movie = $_POST['id_movie'];
        $sala = $_POST['id_sala'];
        $seats = get_all_rooms()->fetch_assoc();
        $durata = get_all_movies()->fetch_assoc();
    }
?>