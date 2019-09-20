<?php 
    require_once 'config.php'; 
    require_once UTILS.'DbManager.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">
    <title>Cinemino</title>
</head>
<body>
    <?php 
        include "php/navbar.php"; 
    ?>

    <section class="descr">
    <h3>Utente</h3>
        <p>
        La piattaforma è un servizio legato ad un cinema. 
        Dalla homepage è possibile selezionare un orario e scegliere il proprio posto in sala (il login è necessario).
        Dopo la registrazione, per un semplice utente è possibile modificare i dettagli del proprio account e controllare le proprie prenotazioni.
        </p>
    <h3>Amministratore</h3>
        <p>
        Nel pannello di amministrazione è invece possibile gestire le operazione relative all'aggiunta o rimozione di un film, 
        la messa in programmazione di quest'ultimo e la creazione di nuove sale di proiezione, oltre ad un semplice controllo dei posti prenotati per proiezione. 
        Rimane comunque possibile modificare tutto ciò in un secondo momento.
        </p>

    <h3>Account amministratore</h3>
        <p>
            Nome utente: <u>admin</u>
            <br>
            Password: <u>admin</u>
        </p>
    </section>
</body>