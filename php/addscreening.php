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
        
        // validazione del form aggiungendo all'array $errors gli eventuali errori
        if (empty($title)) { array_push($errors, "Titolo obbligatorio"); }

        // controllo il database per eventuali username o email gia` esistenti
        $movie_check_query = "SELECT * FROM movies WHERE title='$title' LIMIT 1";
        $result_movie_check = mysqli_query($db, $movie_check_query);
        $movie_check = mysqli_fetch_assoc($result_movie_check);
            
        if ($movie_check) { // se il film esiste gia`
            if ($movie_check['title'] === $title) {
                array_push($errors, "Film gia` inserito");
            }
        }
        
        if (count($errors) == 0) {
        $query = "INSERT INTO screenings (...) 
            VALUES('...')";
        //   if (mysqli_query($db, $query))
        //     array_push($success, "Film inserito con successo");
        //   else
        //     array_push($errors, "Errore nel caricamento del film");
        }
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