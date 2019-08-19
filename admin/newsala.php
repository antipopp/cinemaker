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
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <title>Aggiungi sala</title>
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
        <?php } ?>
</body>
</html>