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
	                    <form method="post"  >
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
                        ?>
                                    <form class="wide" method="post"   enctype="multipart/form-data">    
                                        <select name="id_screen">
                                            <?php 
                                                while ($row = $result->fetch_assoc()) { 
                                                
                                                $movie = get_movie($row['movie_id'])->fetch_assoc(); 
                                            ?>
                                            <option value="<?php echo htmlspecialchars($row['id'])?>">
                                                <?php echo htmlspecialchars($row['screening_start']); echo ' - '; echo htmlspecialchars($movie['title']); ?> 
                                            </option>
                                            <?php } //while ?>
                                        </select> 
                                        <div class="row">
                                            <button type="submit" class="btn" name="select_id_screen">Modifica</button>
                                        </div>
                                    </form>
                        <?php
                            } // if 
                            if (isset($_POST['select_id_screen'])) {
                                $result = get_screening($_POST['id_screen'])->fetch_assoc();
                                list($date, $time) = explode(" ", $result['screening_start']); ;
                        ?>
                            <form class="wide" method="post"   enctype="multipart/form-data">
                                <div class="row">
                                    <input type="date" name="date" value="<?php echo $date ?>">
                                    <input type="time" name="time" value="<?php echo $time ?>">
                                    <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                </div>
                                <br>
                                <div class="row">
                                    <button type="submit" class="btn" name="edit">Modifica</button>
                                    <button type="submit" class="btn" name="delete">Elimina</button>
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