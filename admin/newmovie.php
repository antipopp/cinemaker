<?php 
    require_once '../config.php';
    require_once '../php/utils/functions.php';
    require_once '../php/addmovie.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <title>Pannello di amministrazione</title>
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
                        <li class="btns active">
                            <a href="#">
                            <i class="material-icons">movie</i>
                            Aggiungi film </a>
                        </li>
                        
                        <li class="btns">
                            <a href="editmovie.php">
                            <i class="material-icons">movie</i>
                            Modifica film </a>
                        </li>

                        <li class="btns">
                            <a href="newscreening.php">
                            <i class="material-icons">movie</i>
                            Modifica programmazione </a>
                        </li>

                        <li class="btns">
                            <a href="newsala.php">
                            <i class="material-icons">event_seat</i>
                            Aggiungi sala</a>
                        </li>
                    </ul>
                </div>
            </div>

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
                        <input class="wide" type="file" name="cover">
                        <br>     
                        <button type="submit" class="btn" name="new_movie">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>