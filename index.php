<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/covers.css">

    <title>CineMaker</title>
</head>
<body>
    <nav class="top">
        <a href="/" class="logo">CineMaker</a>
        <?php
            session_start();
            if (!isset($_SESSION['username'])) {
                echo '<div class="menu">';
                echo '<a href="php/login.php">Accedi</a>';
                echo '<a href="php/register.php">Registrati</a>';
                echo '</div>';
            } 
            else {
                echo '<div class="menu">';
                echo '<a href="control.php">'. $_SESSION['username'] .'</a>';
                echo '<a href="php/logout.php">Logout</a>';
                echo '</div>';
            }
        ?>
    </nav>

    <nav class="bottom menu">
        <a href="#">Prossimamente</a>
        <a href="#">Programmazione</a>
        <a href="#">Eventi</a>
        <a href="#">Prezzi</a>
        <a href="#">Contatti</a>
    </nav>

    <section class="covers-container">
        <div class="covers fade">
            <img src="res/poster1.jpg" style="width:100%">
        </div>

        <div class="covers fade">
            <img src="res/poster2.jpg" style="width:100%">
        </div>

        <div class="covers fade">
            <img src="res/poster3.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
    </section>

    <section class="movies">
        <div class="movie-grid">
            <div class="movie-item">
                <div class="image-box">
                    <img src="res/sample-poster.jpg" alt="movie-poster">
                </div>
                <div class="descr-box">
                    <p class="movie-genre">Action</p>
                    <hr class="movie-line">
                    <p class="movie-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dui leo, laoreet ac posuere a, elementum nec leo.
                    Donec aliquam, dui at dignissim rhoncus, sem metus volutpat nibh, eget tincidunt sapien eros ut elit. Etiam dictum
                    felis eget scelerisque ultrices. Sed eu libero erat. Maecenas nec nisl nisi.</p>
                 </div>
            </div>
            <div class="movie-item">
                <div class="image-box">
                    <img src="res/sample-poster.jpg" alt="movie-poster">
                </div>
                <div class="descr-box">
                    <p class="movie-genre">Action</p>
                    <hr class="movie-line">
                    <p class="movie-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dui leo, laoreet ac posuere a, elementum nec leo.
                    Donec aliquam, dui at dignissim rhoncus, sem metus volutpat nibh, eget tincidunt sapien eros ut elit. Etiam dictum
                    felis eget scelerisque ultrices. Sed eu libero erat. Maecenas nec nisl nisi.</p>
                 </div>
            </div>
        </div>
    </section>

    <footer></footer>
    <script src="js/covers.js"></script>
</body>
</html>