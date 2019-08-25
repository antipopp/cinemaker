<?php 
    require_once '/../config.php';
    require_once UTILS.'DbManager.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    session_start();
    
    $user = $_SESSION['id'];
    $reservs = find_reservation_by_user($user);
    $errors = [];
    $success = [];

    if (isset($_POST['delete'])) {
        $id = $cineDb->sqlInjectionFilter($_POST['delete_id']);
        $reserv = find_reservation($id)->fetch_assoc();
        if(is_admin($user) || $reserv['user_id'] == $user) {
            $result = delete_reservation($id);
            array_push($success, "Cancellamento prenotazione in corso...");
            header('Refresh:2');
        }
        else {
            array_push($errors, "Azione riservata agli amministratori");
        }
    }
?>