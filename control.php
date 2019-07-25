<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/inputs.css">
    <title>Pannello di controllo</title>
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
                echo '<a href="#">'. $_SESSION['username'] .'</a>';
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
                        <li class="btns active">
                            <a href="#">
                            <i class="material-icons">settings</i>
                            Impostazioni </a>
                        </li>

                        <li class="btns">
                            <a href="#">
                            <i class="material-icons">event_seat</i>
                            Prenotazioni </a>
                        </li>
                        
                        <?php if ($_SESSION['isAdmin'] == true) : ?>
                        <li class="btns">
                            <a href="admin.php">
                            <i class="material-icons">grade</i>
                            Amministrazione </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>

            <div class="main-profile">
                <div class="edit-settings">
                    <?php include ('php/edit_user.php'); ?>
                    <form method="post" action="">
                        <?php include('php/errors.php'); ?>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="text" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="input-group">
                            <label>Vecchia password</label>
                            <input type="password" name="old_password" value="">
                        </div>
                        <div class="input-group">
                            <label>Nuova password</label>
                            <input type="password" name="new_password" value="">
                        </div>
                        <div class="input-group">
                            <label>Conferma password</label>
                            <input type="password" name="new_password_confirm" value="">
                        </div>
                        <div class="input-group">
                        <button type="submit" class="btn" name="send_edit" value="">Modifica</button>
                        </div>
                    </form>
                </div>
                <div class="reservations">
                    <p>Non ci sono prenotazioni</p>
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
            this.className += " active";
            if (current[0].innerText == "settings Impostazioni") {
            document.getElementsByClassName("reservations")[0].style.display = "none";
            document.getElementsByClassName("edit-settings")[0].style.display = "flex";
            }
            else {
            document.getElementsByClassName("reservations")[0].style.display = "flex";
            document.getElementsByClassName("edit-settings")[0].style.display = "none";
            }
        });
    }
    </script>
</body>
</html>