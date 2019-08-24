<?php
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';

    $errors = array(); 
    $success = array();
    $name = "";

    if (isset($_POST['new_sala'])) {
        // input dal form
        $name = $cineDb->sqlInjectionFilter($_POST['name']);
        $rows = $cineDb->sqlInjectionFilter($_POST['rows']);
        $cols = $cineDb->sqlInjectionFilter($_POST['cols']);

        // validazione del form aggiungendo all'array $errors gli eventuali errori
        if (empty($name) || empty($rows) || empty($cols)) { 
            array_push($errors, "Tutti i campi sono obbligatori"); 
        }

        $duplicate = get_room_by_name($name);

        if ($duplicate) { 
            array_push($errors, "Nome già esistente"); 
        }
        
        if (count($errors) == 0) {
            $seats = $rows * $cols;
            $result = new_hall($name, $seats, $rows, $cols);
            
        if (!$result)
            array_push($success, "Sala inserita con successo");
        else
            array_push($errors, "Errore nel caricamento della sala");
        }
    }
?>