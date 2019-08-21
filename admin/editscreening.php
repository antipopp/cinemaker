<?php 
    require_once '../config.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    require_once '../php/screening_editor.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <title>Aggiungi proiezione</title>
</head>
<body>
    <?php 
        include_once '../php/navbar.php';
        if (!is_admin($_SESSION['id'])) {
            echo '<div class="form-panel wide">';
            echo '<div class="error">Accesso riservato agli admin</div>';
            echo '</div>';
        }
        else {
    ?>
    <div class="container-main">
        <div class="container-profile">
            <?php include 'sidebar.php'; ?>
            <div class="main-profile">
                <div class="form-container">
                    <div class="form-panel">
                    <?php include '../php/errors.php'; ?>
                        <!-- seleziona film -->
	                    <form method="post" action="">
                            <label>Sala</label>
                            <select name="id_sala">
                                <?php
                                    while($row=$sala_list->fetch_assoc())
                                    {
                                        echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                                            . htmlspecialchars($row['name']) 
                                            . '</option>';
                                    }
                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn" name="select_id">Seleziona</button>     
                        </form>
                        <?php if (isset($_POST['select_id'])) {
                                $result = get_screenings_by_room($_POST['id_sala']);
                                while ($row = $result->fetch_assoc()) { 
                                    list($date, $time) = explode(" ", $row['screening_start']); 
                                    $movie = get_movie($row['movie_id'])->fetch_assoc(); ?>
                                    <form class="wide" method="post" action="" enctype="multipart/form-data">    
                                        <label><?php echo $movie['title']; ?></label>
                                        <div class="row"> 
                                            <div class="column">     
                                                <label>Data</label>
                                                <input type="date" name="start" value="<?php echo $date; ?>">
                                            </div>
                                            <div class="column">   
                                                <label>Orario</label>   
                                                <input type="time" name="start" value="<?php echo $time; ?>">
                                            </div>
                                        <br>   
                                        </div>  
                                        <div class="row">
                                            <button type="submit" class="btn" name="edit">Modifica</button>
                                            <button type="submit" class="btn" name="edit">Cancella</button>
                                        </div>
                                    </form>
                        <?php   } // while
                            } // if ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
</body>
</html>