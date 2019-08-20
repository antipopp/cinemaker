<?php 
    session_start();
    require_once '../config.php';
    require_once '../php/utils/functions.php';
    require_once '../php/utils/queries.php';
    
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
        include_once '../php/navbar.php';
        if (!isLogged()) {
            $err = "Area riservata agli utenti registrati";
            header('location: '.PathToUrl(ROOT."php/signin.php?error=".$err));
        }
        else {
    ?>
    <div class="container-main">
        <div class="container-profile">
            <?php include 'sidebar.php'; ?>
            <div class="main-profile">
                <div class="form-panel">
                    <?php include '../php/edit_user.php'; ?>
                    <form method="post" action="">
                        <h2 class="form-header">Modifica i dati</h2>
                        <?php include '../php/errors.php'; ?>
                        <input type="text" name="email" value="<?php echo $email; ?>">                       
                        <input type="password" name="old_password" value="" placeholder="Vecchia Pasword" required>                       
                        <input type="password" name="new_password" value="" placeholder="Nuova Password">                        
                        <input type="password" name="new_password_confirm" value="" placeholder="Conferma Nuova Password">
                        <br>
                        <button type="submit" class="btn" name="send_edit" value="">Modifica</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>