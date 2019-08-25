<?php 
    require_once '../config.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    require_once '../php/movie_editor.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <title>Modifica film</title>
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

                    <form method="post" action="" class="form-select">
                        <select name="movie">
                            <?php
                                while($row=$movie_list_results->fetch_array())
                                {
                                    echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                                        . htmlspecialchars($row['title']) 
                                        . '</option>';
                                }
                            ?>
                        </select>
                        <br>
                        <button type="submit" class="btn" name="edit_movie" id="edit-movie">Seleziona</button>
                    </form>
                    </div>
                    <?php if (isset($_POST['movie'])) : ?>
                    <div class="double">
                        <div class="form-panel last-child">
                            <form class="wide" method="post" action="" enctype="multipart/form-data">
                                <?php include('../php/errors.php'); ?>

                                    <label>Titolo</label>
                                    <input class="wide" type="text" name="title" value="<?php echo $title; ?>" required>
                                
                                    <label>Genere</label>
                                    <input class="wide" type="text" name="genre" value="<?php echo $genre; ?>">
                                
                                    <label>Descrizione</label>
                                    <textarea class="wide" name="descr" rows="7" cols="40"><?php echo $descr; ?></textarea>
                                
                                    <label>Cast</label>
                                    <input class="wide" type="text" name="cast" value="<?php echo $cast; ?>">
                                
                                    <label>Regia</label>
                                    <input class="wide" type="text" name="director" value="<?php echo $director; ?>">
                                
                                    <label>Durata (in minuti)</label>
                                    <input class="wide" type="number" name="durata" value="<?php echo $durata; ?>">
                                
                                    <label>Locandina</label>
                                    <input class="wide" type="file" name="file">
                                    
                                    <input type="hidden" name="cover_id" value="<?php echo $cover; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                
                                <button type="submit" class="btn" name="send_edit" value="">Modifica</button>
                            </form>
                            <?php endif ?>
                            </div>
                            <div class="form-panel image-box last-child">
                                <img src="<?php echo $coverLocation; ?>" alt="Locandina">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>