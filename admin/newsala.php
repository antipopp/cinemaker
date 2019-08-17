<?php 
    require_once '../config.php';
    require_once '../php/utils/functions.php';
    require_once '../php/addsala.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <title>Aggiungi proiezione</title>
</head>
<body>
	<?php include '../php/navbar.php'; ?>
	<div class="container-main">
        <div class="container-profile">
            <div class="side-profile">
                <img src="https://api.adorable.io/avatars/140/<?php echo $_SESSION['username']?>@adorable.io.png">
                <p class="user-title"><?php echo $_SESSION['username']?></p>
                <div class="menu-profile">
                    <ul class="user-nav">
                        <li class="btns">
                            <a href="newmovie.php">
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

                        <li class="btns active">
                            <a href="newsala.php">
                            <i class="material-icons">event_seat</i>
                            Aggiungi sala</a>
                        </li>
                    </ul>
                </div>
			</div>
			
			<div class="main-profile">
				<div class="form-container">
                    <div class="form-panel">
						<form method="post" action="">
							<?php include '../php/errors.php'; ?> 	
							<label>Nome sala</label>
							<input type="text" name="name" value="">  		
							<label>Posti</label>
							<input type="number" name="seats" value=""> 
							<br>	
							<button type="submit" class="btn" name="new_sala">Invia</button>
						</form>
			  		</div>
			  	</div>
			</div>
		</div>
	</div>
</body>
</html>