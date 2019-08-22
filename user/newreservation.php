<?php 
    require_once '../php/reservation.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Prenota</title>
</head>
<body>
    <?php include '../php/navbar.php' ?>
    <?php 
        include_once '../php/navbar.php';
        if (!isLogged()) {
            $err = "Area riservata agli utenti registrati";
            header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err));
        }
        else {       
    ?>
    <div class="container-main">
        <div class="container-profile">
            <?php include 'sidebar.php'; ?>

            <div class="main-profile">
                <p> non ci sono prenotazioni </p>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>