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
	                    <form method="post"  >
                            <label>Proiezione</label>
                            <select name="id_movie" onchange="this.form.submit()">
                                <?php while($row=$onair->fetch_assoc()) { ?>
                                <option value="blank">SELEZIONA FILM</option>
                                <option value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
                                <?php } ?>
                            </select>
                        </form>
                        <?php if(isset($_POST['id_movie'])) { 
                            $screenings = get_screenings_by_movie($_POST['id_movie']);?>
                        <form method="post"  >
                        <select name="id_screenings">
                        <?php 
                            while($row = $screenings->fetch_assoc()) {
                            $day = date('Y-m-d', strtotime($row['screening_start']));
                            $time = date('H:i', strtotime($row['screening_start']));
                            $id = $row['id'];
                        ?> 
                            <option value="<?php echo $id?>"><?php echo $day." - ".$time?></option>
                        <?php
                        } // while row ?>    
                        </select>
                            <br>
                            <button type="submit" class="btn" name="select_id">Seleziona</button>     
                        </form>

                        <?php }  //if isset id_movie
                        
                        if (isset($_POST['id_screenings'])) {
                            $reservs = find_reservation_by_screening($_POST['id_screenings']);
                            $hall = 
                            $total = $reservs->num_rows;
                            echo "<br>";
                            echo "Ci sono ".$total." posti prenotati";
                        }  ?>

			  		</div>
			  	</div>
			</div>
		</div>
	</div>
        <?php } // if is_admin ?>
</body>
</html>