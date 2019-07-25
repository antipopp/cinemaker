<?php
    require_once 'utils/db.php';
    $errors = array();
    $success = array();
    $movie_list_query = "SELECT id, title FROM movies";
    $movie_list_results = mysqli_query($db, $movie_list_query);

    if (isset($_POST['send_edit'])) {
        $target_file = $_POST['cover_link'];
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

        $edit_query = "UPDATE movies 
                        SET title = '".$_POST['title']."',
                            description = '".$_POST['descr']."',
                            cast = '".$_POST['cast']."',
                            director = '".$_POST['director']."',
                            duration = '".$_POST['durata']."',
                            genre = '".$_POST['genre']."',
                            cover = '".$target_file."'
                        WHERE id = '".$_POST['id']."'";          
        $edit_results = mysqli_query($db, $edit_query);
        if ($edit_results)
            header("Refresh:0");
    }

    if (isset($_POST['edit_movie'])) {
        $movie_query = "SELECT * FROM movies WHERE id = '".$_POST['movie']."'";
        $movie_results = mysqli_query($db, $movie_query);
        $row = mysqli_fetch_assoc($movie_results);
        $id = $row['id'];
        $title = $row['title'];
        $descr = $row['description'];
        $cast = $row['cast'];
        $director = $row['director'];
        $durata = $row['duration'];
        $genre = $row['genre'];
        $cover = $row['cover'];
    }
    
?>