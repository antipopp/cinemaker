<?php 
    require_once 'config.php'; 
    require_once UTILS.'DbManager.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">
    <title>Cinemino</title>
</head>
<body>
    <?php 
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
                    <form action="user/selection.php" method="post">
                        <div class="screenings">
                            <table>      
                                <?php 
                                    $data = [];
                                    while ($row = $screenings->fetch_assoc()) {
                                        $day = date('Y-m-d', strtotime($row['screening_start']));
                                        $time = date('H:i', strtotime($row['screening_start']));
                                        $data[$day][$time][] = $row['id'];
                                        
                                    }
                                    foreach ($data as $day => $times) {
                                        $date = date('l, j', strtotime($day));
                                ?>
                                        <tr>
                                            <td><?php echo $date ?></td>
                                            
                                            <?php foreach ($times as $time => $id) { ?>
                                                <td>
                                                    <?php foreach ($id as $id) { ?>
                                                        <button type="submit" name="selected_screening" value="<?php echo $id ?>">
                                                    <?php }
                                                    echo $time ?></button>
                                                </td>
                                            <?php
                                                } 
                                            ?>       
                                        </tr>
                                <?php
                                    } 
                                ?>
                            </table>
                        </div>
                    </form>
                </div>
                
            </div>
            <?php 
                } 
            ?>
        </div>
    </section>
</body>
</html>