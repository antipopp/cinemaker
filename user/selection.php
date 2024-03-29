<?php 
    require_once '/../config.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    require_once '/../php/reservation.php';
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
    <link rel="stylesheet" href="../css/seatmap.css">
    <title>Pannello di controllo</title>
</head>
<body>
    <?php 
        include_once '/../php/navbar.php';
        if (!isLogged()) {
            array_push($errors, "Accesso riservato agli utenti");
            include '/../php/errors.php';
        }
        elseif (isset($_POST['book'])) {    
            include '/../php/errors.php';     
    ?>
        <form   method="post">
            <input type="hidden" id="screening_id" name="screening" value="<?php echo $screening ?>">
            <button type="submit">TORNA INDIETRO</button>  
        </form> 
    <?php 
        }
        elseif (isset($_POST['selected_screening'])) {
            include '/../php/errors.php';
    ?>
        <div class="hall">
            <h1>SCHERMO</h1>
            <form   method="post" id="seatmap">
            <input type="hidden" id="screening_id" name="screening" value="<?php echo $_POST['selected_screening']?>">
                
            </form>              
        </div>
        <script src="../js/seatmap.js"></script>
    <?php
        }
        else {
            array_push($errors, "Devi prima selezionare un orario dalla pagina 'Programmazione'");
            include '/../php/errors.php';
        }
    ?>

    
</body>
</html>