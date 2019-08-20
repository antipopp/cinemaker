<?php
    require_once 'utils/DbManager.php';

    $errors = array(); 
    $success = array();
    $name = "";
    $seats = 0;

    if (isset($_POST['new_sala'])) {
        // input dal form
        $name = $cineDb->sqlInjectionFilter($_POST['name']);
        $seats = $cineDb->sqlInjectionFilter($_POST['seats']);

        // validazione del form aggiungendo all'array $errors gli eventuali errori
        if (empty($name) || empty($seats)) { 
            array_push($errors, "Tutti i campi sono obbligatori"); 
        }
        
        if (count($errors) == 0) {
            $query = "INSERT INTO sale (name, seats_no) 
                VALUES('$name', '$seats')";
        if (mysqli_query($db, $query))
            array_push($success, "Sala inserita con successo");
        else
            array_push($errors, "Errore nel caricamento della sala");
        }
    }
?>