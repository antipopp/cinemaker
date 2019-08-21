<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";

    $result = get_screenings_by_room(1);
    while ($row = $result->fetch_assoc()) {
        list($date, $time) = explode(" ", $row['screening_start']);
        echo $date;
        echo '<br>';
        echo $time;
        echo '<br>';
    }
?>