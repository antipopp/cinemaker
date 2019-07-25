<?php include('php/movie_editor.php'); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/inputs.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Modifica film</title>
</head>
<body>
    
    <form method="post" action="" class="form-top">
        <select name="movie">
            <?php
                while($row=mysqli_fetch_array($movie_list_results))
                {
                    echo '<option value="' . htmlspecialchars($row['id']) . '">' 
                        . htmlspecialchars($row['title']) 
                        . '</option>';
                }
            ?>
        </select>
        <div class="input-group">
        <button type="submit" class="btn" name="edit_movie" id="edit-movie">Seleziona</button>
        </div>
    </form>
    <?php if (isset($_POST['movie'])) : ?>
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
            <textarea name="descr" rows="5" cols="40"><?php echo $descr; ?></textarea>
        </div>
        <div class="input-group">
            <label>Cast</label>
            <input type="text" name="cast" value="<?php echo $cast; ?>">
        </div>
        <div class="input-group">
            <label>Regia</label>
            <input type="text" name="director" value="<?php echo $director; ?>">
        </div>
        <div class="input-group">
            <label>Durata</label>
            <input type="number" name="durata" value="<?php echo $durata; ?>">
        </div>
        <div class="input-group">
            <label>Locandina</label>
            <input type="file" name="cover">
  	    </div>
        <div class="input-group">
            <img src="<?php echo $cover; ?>" alt="Locandina">
        </div>
        <input type="hidden" name="cover_link" value="<?php echo $cover; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
        <button type="submit" class="btn" name="send_edit" value="">Modifica</button>
        </div>
    </form>
    <?php endif ?>
</body>
</html>