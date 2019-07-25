<?php include('php/addscreening.php') ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aggiungi proiezione</title>
	<link rel="stylesheet" href="css/inputs.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- seleziona film -->
	<form method="post" action="" class="form-top">
        <div class="input-group">
        <label>Titolo</label>
        <select name="id_movie">
            <?php
                while($row=mysqli_fetch_array($movie_list_results))
                {
                    echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                        . htmlspecialchars($row['title']) 
                        . '</option>';
                }
            ?>
        </select>
        </div>
        <div class="input-group">
        <label>Sala</label>
        <select name="id_sala">
            <?php
                while($row=mysqli_fetch_array($sala_list_results))
                {
                    echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                        . htmlspecialchars($row['name']) 
                        . '</option>';
                }
            ?>
        </select>
        </div>
        <div class="input-group">
        <button type="submit" class="btn" name="select_id">Seleziona</button>
        </div>
    </form>
    <?php if (isset($_POST['select_id'])) : ?>
    <form method="post" action="" enctype="multipart/form-data">
  	<?php include('php/errors.php'); ?>
    <!-- form inputs -->
    <input type="hidden" name="id_sala" value="<?php echo $sala; ?>">
    <input type="hidden" name="id_movie" value="<?php echo $movie; ?>">
    <label>Ricorda, il film dura <?php echo $durata['duration']; ?> minuti e la sala ha <?php echo $seats['seats_no']; ?> posti.</label>
    <!-- submit -->
  	<div class="input-group">
  	  <button type="submit" class="btn" name="new_screening">Invia</button>
  	</div>
    </form>
    <?php endif; ?>
</body>
</html>