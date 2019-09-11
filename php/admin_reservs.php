<?php
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';

    $errors = array(); 
    $success = array();
    
    $onair = get_onair();
    
    
    if(isset($_POST['id_movie'])) {
        $screenings = get_screenings_by_movie($_POST['id_movie']);
        $data = [];
        while($row = $screenings->fetch_assoc()) {
            $day = date('Y-m-d', strtotime($row['screening_start']));
            $time = date('H:i', strtotime($row['screening_start']));
            $data[$day][$time][] = $row['id'];
        }

        
    }
 
?>