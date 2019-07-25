<?php include('php/addsala.php') ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aggiungi sala</title>
	<link rel="stylesheet" href="css/inputs.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>	
    <form method="post" action="">
  	<?php include('php/errors.php'); ?>
  	<div class="input-group">
  	  <label>Nome sala</label>
  	  <input type="text" name="name" value="">
  	</div>  
    <div class="input-group">
  	  <label>Posti</label>
  	  <input type="number" name="seats" value="">
  	</div> 
  	<div class="input-group">
  	  <button type="submit" class="btn" name="new_sala">Invia</button>
  	</div>
  </form>
</body>
</html>