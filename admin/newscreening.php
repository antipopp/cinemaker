<?php 
    require_once '../config.php';
    require_once '../php/utils/functions.php';
    require_once '../php/addscreening.php';
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
        if (!is_admin()) {
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
                            <label>Titolo</label>
                            <select name="id_movie">
                                <?php
                                    while($row=mysqli_fetch_array($movie_list_results))
                                    {
                                        echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                                            . htmlspecialchars($row['title']) 
                                            . '</option>';
                                    }
                                ?>
                            </select>
                            <label>Sala</label>
                            <select name="id_sala">
                                <?php
                                    while($row=mysqli_fetch_array($sala_list_results))
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
                        <?php if (isset($_POST['select_id'])) : ?>
                        <form method="post" action="" enctype="multipart/form-data">
                            <!-- form inputs -->
                            <input type="hidden" name="id_sala" value="<?php echo $sala; ?>">
                            <input type="hidden" name="id_movie" value="<?php echo $movie; ?>">
                            <label>Ricorda, il film dura <?php echo $durata['duration']; ?> minuti e la sala ha <?php echo $seats['seats_no']; ?> posti.</label>
                            <input type="date" name="date" min="<?php echo date('Y-m-d');?>" required>
                            <input type="time" name="time" value="13:30" required>
                            <!-- submit -->
                            <br>
                            <button type="submit" class="btn" name="new_screening">Invia</button>                            
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
</body>
</html>