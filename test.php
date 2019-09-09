<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";
    
    $reservs = find_active_reservs(12);
    var_dump($reservs);
?>

</body>
</html>