<?php 
    require_once '/../config.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    require_once '/../php/reservation.php';
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
    <?php 
        include_once '/../php/navbar.php';
        if (!isLogged()) {
            echo '<div class="form-panel wide">';
            echo '<div class="error">Accesso riservato agli utenti registrati</div>';
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
                    <?php include '/../php/errors.php'; ?>
                        <!-- seleziona film -->
	                    <form method="post" action="">
                            <label>Film</label>
                            <select name="id_movie">
                                <?php
                                    while($row=$movies->fetch_assoc())
                                    {
                                        echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                                            . htmlspecialchars($row['title']) 
                                            . '</option>';
                                    }
                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn" name="select_id">Seleziona</button>     
                        </form>
                        <?php if (isset($_POST['select_id'])) {
                                $result = get_screenings_by_movie($_POST['id_movie']);
                        ?>
                            <form method="post" action="selection.php" enctype="multipart/form-data">
                                <div class="row">
                                    <select name="date">
                                    <?php
                                    
                                        while($row=$result->fetch_assoc())
                                        {
                                            setlocale(LC_TIME, 'it_IT');
                                            list($date, $time) = explode(" ", $row['screening_start']);
                                            $date = strftime('%A, %d %B', strtotime($date));
                                            $time = date('H:i', strtotime($time));
                                            echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                                                . htmlspecialchars($date) . ' @ ' . htmlspecialchars($time)
                                                . '</option>';
                                        }
                                    ?>
                                    </select>
                                    <br>
                                
                                    <button type="submit" class="btn" name="next">Prosegui</button>
                                </div>
                            </form>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
</body>
</html>