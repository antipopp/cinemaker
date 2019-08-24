<?php 
    require_once '/../config.php';
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';
    require_once UTILS.'functions.php';
    session_start();

    $errors = [];
    $success = [];

    if (isset($_POST['book'])) {
        $user = $_SESSION['id'];
        $screening = $_POST['screening'];
        if (!isset($_POST['seats'])) {
            array_push($errors, "Non hai selezionato alcun posto.");
        }
        $seats = $_POST['seats'];
        $countSeats = [];
        foreach ($seats as $seat) {
            $duplicate = find_reservation_by_seat($screening, $seat)->num_rows;
            if ($duplicate > 0) {
                array_push($errors, "Posto già prenotato");
            }

            if (count($errors) == 0) {
                $result = new_reservation($user, $screening, $seat);
                if($result)
                    array_push($countSeats, $seat);
            }
        }
        
        if (count($errors) == 0) {
            if (count($countSeats) == 0) {
                array_push($success, "Prenotazione avvenuta con successo");
            }
            else {
                $failedSeats = implode(', ', $countSeats);
                $msg = "Ci sono stati problemi con l'inserimento dei seguenti posti: ".$failedSeats.". Ritenta più tardi";
                array_push($errors, $msg);
            }
        }
    }
?>