<?php 
    require_once '../config.php';
    require_once '../php/utils/functions.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <title>Pannello di controllo</title>
</head>
<body>
    <?php include_once '../php/navbar.php' ?>
    <div class="container-main">
        <div class="container-profile">
            <div class="side-profile">
                <img src="https://api.adorable.io/avatars/140/<?php echo $_SESSION['username']?>@adorable.io.png">
                <p class="user-title"><?php echo $_SESSION['username']?></p>
                <div class="menu-profile">
                    <ul class="user-nav">
                        <li class="btns">
                            <a href="settings.php">
                            <i class="material-icons">settings</i>
                            Impostazioni </a>
                        </li>

                        <li class="btns active">
                            <a href="#">
                            <i class="material-icons">event_seat</i>
                            Prenotazioni </a>
                        </li>
                        
                        <?php if ($_SESSION['isAdmin'] == true) : ?>
                        <li class="btns">
                            <a href="../admin/newmovie.php">
                            <i class="material-icons">grade</i>
                            Amministrazione </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>

            <div class="main-profile">
                <p> non ci sono prenotazioni </p>
            </div>
        </div>
    </div>
</body>
</html>