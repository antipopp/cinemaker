<?php
        require_once UTILS.'DbManager.php';
        require_once UTILS.'functions.php';
        global $cineDb;
        $errors = array();
        $success = array();

        $movie_list_results = get_all_movies();

        if (isset($_POST['send_edit'])) {
            $file = upload_file();

            $edit_query = "UPDATE movies 
                            SET title = '".$_POST['title']."',
                                description = '".$_POST['descr']."',
                                cast = '".$_POST['cast']."',
                                director = '".$_POST['director']."',
                                duration = '".$_POST['durata']."',
                                genre = '".$_POST['genre']."',
                                cover = '".$file."'
                            WHERE id = '".$_POST['id']."'";          
            $edit_results = mysqli_query($db, $edit_query);
            if ($edit_results)
                header("Refresh:0");
        }

        if (isset($_POST['edit_movie'])) {
            $movie_query = "SELECT * FROM movies WHERE id = ?";
            $movie_results = $cineDb->performQueryWithParameters($movie_query, 's', $_POST['movie']);
            $row = $movie_results->fetch_assoc();
            $id = $row['id'];
            $title = $row['title'];
            $descr = $row['description'];
            $cast = $row['cast'];
            $director = $row['director'];
            $durata = $row['duration'];
            $genre = $row['genre'];
            $cover = get_movie_cover($row['cover']);
        }
?>