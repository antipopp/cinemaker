<?php
    require_once 'utils/db.php';

    $errorArray = array(); 
    $success = array();
    $title = "";
    $sala = "";

    // seleziona film
    $movie_list_query = "SELECT id, title FROM movies";
    $movie_list_results = mysqli_query($db, $movie_list_query);
    $sala_list_query = "SELECT * FROM sale";
    $sala_list_results = mysqli_query($db, $sala_list_query);

    if (isset($_POST['new_screening'])) {
        // input dal form
        $movie = $_POST['id_movie'];
        $sala = $_POST['id_sala'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        $dateTime = strtotime($date . ' ' . $time);
        $start = date("Y-m-d H:i:s", $dateTime);
        
        $screen_check_query = "SELECT * FROM screenings WHERE screening_start='$start' LIMIT 1";
        $result_screen_check = mysqli_query($db, $movie_check_query);
        $screen_check = mysqli_fetch_assoc($result_movie_check);
            
        if ($screen_check) { // se la proiezione e` gia` inserita
            if ($screen_check['sala_id'] === $sala) {
                array_push($errorArray, "Proiezione gia` inserita");
            }
        }
        
        if (count($errorArray) == 0) {
        $query = "INSERT INTO screenings (movie_id, sala_id, screening_start) 
            VALUES('$movie', '$sala', '$start')";
        
        if (mysqli_query($db, $query))
            $msg = "?success=Proiezione inserita con successo";
        else
            $msg = "?error=Errore nell'inserimento della proiezione";
        }
        header("location: ".$_SERVER['PHP_SELF'].$msg);
    }

    if (isset($_POST['select_id'])) {
        $movie = $_POST['id_movie'];
        $sala = $_POST['id_sala'];
        $movie_info_query = "SELECT duration FROM movies WHERE id='$movie'";
        $sala_info_query = "SELECT seats_no FROM sale WHERE id='$sala'";
        $movie_info_results = mysqli_query($db, $movie_info_query);
        $sala_info_results = mysqli_query($db, $sala_info_query);
        $seats = mysqli_fetch_assoc($sala_info_results);
        $durata = mysqli_fetch_assoc($movie_info_results);
    }
?>