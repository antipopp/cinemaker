<?php
    require_once UTILS.'queries.php';
    global $cineDb;
    $errors = array(); 
    $success = array();
    $title = "";
    $descr = "";
    $durata = 0;
    $cast = "";
    $director = "";
    $genre = "";
    $cover = "";

    if (isset($_POST['new_movie'])) {
        // input dal form
        $title = $cineDb->sqlInjectionFilter($_POST['title']);
        $genre = $cineDb->sqlInjectionFilter($_POST['genre']);
        $cast = $cineDb->sqlInjectionFilter($_POST['cast']);
        $descr = $cineDb->sqlInjectionFilter($_POST['descr']);
        $director = $cineDb->sqlInjectionFilter($_POST['director']);
        $durata = $cineDb->sqlInjectionFilter($_POST['durata']);
        
        $upload = upload_file();
        // validazione del form aggiungendo all'array $errors gli eventuali errori
        if (empty($title)) { array_push($errors, "Titolo obbligatorio"); }

        $movie_check_query = "SELECT * FROM movies WHERE title='$title' LIMIT 1";
        $movie_check = $cineDb->performQuery($movie_check_query)->fetch_assoc();
            
        if ($movie_check) { // se il film esiste gia`
            if ($movie_check['title'] === $title) {
                array_push($errors, "Film già inserito");
            }
        }
        
        if (count($errors) == 0) {
            $query = "INSERT INTO movies (title, genre, cast, director, description, duration, cover) 
                VALUES(?, ?, ?, ?, ?, ?, ?)";
            $params = array($title, $genre, $cast, $director, $descr, $durata, $upload);

            $result = $cineDb->performQueryWithParameters($query, "sssssis", $params);

            if (!$result)
                array_push($success, "Film inserito con successo");
            else
                array_push($errors, "Errore nel caricamento del film");
        }
    }
?>