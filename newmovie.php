<?php include('php/addmovie.php') ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aggiungi film</title>
	<link rel="stylesheet" href="css/inputs.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	
    <form method="post" action="" enctype="multipart/form-data">
  	<?php include('php/errors.php'); ?>
  	<div class="input-group">
  	  <label>Titolo</label>
  	  <input type="text" name="title" value="<?php echo $title; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Genere</label>
  	  <input type="text" name="genre" value="<?php echo $genre; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Descrizione</label>
  	  <textarea name="descr" rows="5" cols="40"></textarea>
  	</div>
  	<div class="input-group">
  	  <label>Cast</label>
  	  <input type="text" name="cast">
    </div>
    <div class="input-group">
  	  <label>Regia</label>
  	  <input type="text" name="director">
    </div>
    <div class="input-group">
  	  <label>Durata</label>
  	  <input type="number" name="durata">
	</div>
	<div class="input-group">
  	  <label>Locandina</label>
  	  <input type="file" name="cover">
  	</div>  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="new_movie">Invia</button>
  	</div>
  </form>
</body>
</html>