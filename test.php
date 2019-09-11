<?php 
    require_once 'php/utils/DbManager.php';
    require_once 'php/utils/functions.php';
    require_once 'php/utils/queries.php';
    
    session_start();
    $username = "admin";
    $email = "admin@email.it";
    $password = "admin";
    
    $result = $screenings = get_screenings_by_movie(10);
    var_dump($result);
?>

</body>
</html>