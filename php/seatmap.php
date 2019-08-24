<?php
    require_once '/../config.php';
    require_once UTILS.'DbManager.php';
    require_once UTILS.'queries.php';

    $id = $_REQUEST["screening"];
    $result = get_screening($id);
    $screening = $result->fetch_assoc();
    $hall = get_room($screening['sala_id'])->fetch_assoc();
    $reservedSeats = [];
    $data = find_reservation_by_screening($id);
    while ($reservs = $data->fetch_assoc()) {
        array_push($reservedSeats, $reservs['seat']);
    }
    
    $rows = $hall['rows'];
    $cols = $hall['cols'];
    $seatmap = ['rows' => $rows, 'cols' => $cols, 'blocked' => $reservedSeats];
    
    $response = json_encode($seatmap);

    echo $response;
?>