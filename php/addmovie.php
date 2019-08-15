<?php
  require_once 'utils/db.php';

  $errorArray = array(); 
  $success = array();
  $title = "";
  $descr = "";
  $durata = 0;
  $cast = "";
  $director = "";
  $genre = "";
  $cover = "";

  if (isset($_POST['new_movie'])) {
    // input dal form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']);
    $cast = mysqli_real_escape_string($db, $_POST['cast']);
    $descr = mysqli_real_escape_string($db, $_POST['descr']);
    $director = mysqli_real_escape_string($db, $_POST['director']);
    $durata = mysqli_real_escape_string($db, $_POST['durata']);
    $target_file = NULL;
    if (file_exists($_FILES['cover']['tmp_name']) || is_uploaded_file($_FILES['cover']['tmp_name'])) {
      $target_dir = "res/";
      $target_file = $target_dir . basename($_FILES["cover"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk = 1;

      // controllo nome immagine duplicato
      while (file_exists($target_file)) 
        $target_file = $target_dir . uniqid() . basename($_FILES["cover"]["name"]);

      if($imageFileType != "jpg" 
        && $imageFileType != "png" 
        && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
          array_push($errors, "Sono consentiti solo formati JPG/JPEG, PNG o GIF");
          $uploadOk = 0; 
        }

      if($uploadOk == 1)
        move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
      else
        array_push($errors, "Errore nel caricamento del file");
    }

    
    
    // validazione del form aggiungendo all'array $errors gli eventuali errori
    if (empty($title)) { array_push($errors, "Titolo obbligatorio"); }

    // controllo il database per eventuali username o email gia` esistenti
    $movie_check_query = "SELECT * FROM movies WHERE title='$title' LIMIT 1";
    $result_movie_check = mysqli_query($db, $movie_check_query);
    $movie_check = mysqli_fetch_assoc($result_movie_check);
        
    if ($movie_check) { // se il film esiste gia`
      if ($movie_check['title'] === $title) {
        array_push($errors, "Film gia` inserito");
      }
    }
    
    if (count($errors) == 0) {
      $query = "INSERT INTO movies (title, genre, cast, director, description, duration, cover) 
        VALUES('$title', '$genre', '$cast', '$director', '$descr', '$durata', '$target_file')";
      if (mysqli_query($db, $query))
        array_push($success, "Film inserito con successo");
      else
        array_push($errors, "Errore nel caricamento del film");
    }
  }
?>