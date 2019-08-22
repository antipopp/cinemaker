<?php 
    require_once 'config.php'; 
    require_once UTILS.'DbManager.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/covers.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>CineMaker</title>
</head>
<body>
    <?php 
        session_start();
        include "php/navbar.php"; 
    ?>
    <section class="movies">
        <div class="movie-grid">
            <?php
                $movies = get_onair();
                while($row = $movies->fetch_assoc()) {
                    $screenings = get_screenings_by_movie($row['id']);
            ?>
            <div class="movie-item">
                <div class="image-box">
                    <img src="<?php echo get_movie_cover($row['cover'])?>" alt="movie-poster">
                </div>
                <div class="descr-box">
                    <h2><?php echo $row['title'] ?></h2>
                    <p class="movie-genre"><?php echo $row['genre'] ?></p>
                    <hr class="movie-line">
                    <p class="movie-descr"><?php echo $row['description'] ?></p>

                    <div class="screenings">
                        <table>
                            <?php 
                                while ($row = $screenings->fetch_assoc()) {
                                    $date = date('l,j', strtotime($row['screening_start']));
                                    $time = date('H:i', strtotime($row['screening_start']));
                            ?>
                                    <tr>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $time ?></td>
                                    </tr>
                            <?php
                                } 
                            ?>
                        </table>
                    </div>
                </div>
                
            </div>
            <?php 
                } 
            ?>
        </div>
    </section>

    <footer></footer>
    <script src="js/covers.js"></script>
</body>
</html>