<?php 
    require_once '../config.php';
    require_once UTILS.'functions.php';
    require_once '../php/addmovie.php';
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
    <title>Pannello di amministrazione</title>
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
                <div class="form-panel wide">
                    <form class="wide" method="post" action="" enctype="multipart/form-data">
                        <?php include '../php/errors.php'; ?>
                        
                        <label>Titolo</label>
                        <input class="wide" type="text" name="title" value="<?php echo $title; ?>">
                                
                        <label>Genere</label>
                        <input class="wide" type="text" name="genre" value="<?php echo $genre; ?>">
                                
                        <label>Descrizione</label>
                        <textarea class="wide" name="descr" rows="5" cols="40"></textarea>
                                
                        <label>Cast</label>
                        <input class="wide" type="text" name="cast">
                                
                        <label>Regia</label>
                        <input class="wide" type="text" name="director">
                                
                        <label>Durata</label>
                        <input class="wide" type="number" name="durata">
                                
                        <label>Locandina</label>
                        <input class="wide" type="file" name="file">
                        <br>     
                        <button type="submit" class="btn" name="new_movie">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
</body>
</html>