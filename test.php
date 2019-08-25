<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";

    $arr = ['1A', '2B', '3b'];
    $result = implode(', ', $arr);
    
    $reservs = find_reservation_by_user(12);
    var_dump($reservs);
?>

</body>
</html>