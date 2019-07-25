<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/inputs.css">
    <title>Pannello di amministrazione</title>
</head>
<body>
    <nav class="top">
        <a href="index.php" class="logo">CineMaker</a>
        <?php
            session_start();
            if (!isset($_SESSION['username'])) {
                echo '<div class="menu">';
                echo '<a href="php/login.php">Accedi</a>';
                echo '<a href="php/register.php">Registrati</a>';
                echo '</div>';
            }
            else {
                echo '<div class="menu">';
                echo '<a href="control.php">'. $_SESSION['username'] .'</a>';
                echo '<a href="php/logout.php">Logout</a>';
                echo '</div>';
            }
        ?>
    </nav>
    <div class="container-main">
        <div class="container-profile">
            <div class="side-profile">
                <img src="https://api.adorable.io/avatars/140/<?php echo $_SESSION['username']?>@adorable.io.png">
                <p class="user-title"><?php echo $_SESSION['username']?></p>
                <div class="menu-profile">
                    <ul class="user-nav">
                        <li class="btns active" id="sala">
                            <a href="#sala">
                            <i class="material-icons">event_seat</i>
                            Aggiungi sala</a>
                        </li>

                        <li class="btns" id="new-movie">
                            <a href="#new-movie">
                            <i class="material-icons">movie</i>
                            Aggiungi film </a>
                        </li>
                        
                        <li class="btns" id="edit-movie">
                            <a href="#edit-movie">
                            <i class="material-icons">movie</i>
                            Modifica film </a>
                        </li>

                        <li class="btns" id="new-screening">
                            <a href="#new-screening">
                            <i class="material-icons">movie</i>
                            Modifica programmazione </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-profile">
                <div class="sala">
                    <?php include('newsala.php') ?>
                </div>
                <div class="new-movie">
                    <?php include('newmovie.php') ?>
                </div>
                <div class="edit-movie">
                    <?php include('editmovie.php') ?>
                </div>
                <div class="new-screening">
                    <?php include('newscreening.php') ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    var btns = document.getElementsByClassName("btns");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            // changeDiv(this.id);
            var destination = window.location.hash;
            console.log(destination);
            if (destination != "") {
                var dest = destination.replace("#", "");
                changeDiv(dest);
            }
            this.className += " active";     
        });
    }

    function changeDiv(input) {
        landingDiv = "div."+input;
        var mainDiv = document.getElementsByClassName("main-profile");
        for (var i = 0; i < mainDiv[0].childNodes.length; i++) {
            if (i%2 != 0) {
                if (input == mainDiv[0].childNodes[i].className)
                    mainDiv[0].childNodes[i].style.display = "flex";
                else
                    mainDiv[0].childNodes[i].style.display = "none";
            }
        }
    }

    
    </script>
</body>
</html>