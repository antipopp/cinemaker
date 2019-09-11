<?php 
    require_once '../config.php';
    require_once UTILS.'functions.php';
    require_once '../php/admin_reservs.php';
    require_once UTILS.'queries.php';
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
						<!-- seleziona proiezione -->
	                    <form method="post" action="">
                            <label>Proiezione</label>
                            <select name="id_movie" onchange="this.form.submit()">
                                <?php while($row=$onair->fetch_assoc()) { ?>
                                <option value="blank">SELEZIONA FILM</option>
                                <option value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
                                <?php } ?>
                            </select>
                        </form>
                        <form method="post" action="">
                            <div class="row">
                            
                            </div>
                            <br>
                            <button type="submit" class="btn" name="select_id">Seleziona</button>     
                        </form>
			  		</div>
			  	</div>
			</div>
		</div>
	</div>
        <?php } // if is_admin ?>
</body>
</html>