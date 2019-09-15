<?php 
    require_once '../config.php';
    require_once '../php/movielist.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>Modifica film</title>
</head>
<body>
    <?php 
        include_once '../php/navbar.php';
        if (!is_admin($_SESSION['id'])) {
            echo '<div class="form-panel wide">';
            echo '<div class="error">Accesso riservato agli admin</div>';
            echo '</div>';
        }
        else {
    ?>
    <div class="container-main">
        <div class="container-profile">
            <?php include 'sidebar.php'; ?>
            <div class="main-profile">
                <div class="form-container">
                    <div class="form-panel fat">
                        <form action="newmovie.php" method="post">
                            <?php include '/../php/errors.php'; ?>
                            <button type="submit">Aggiungi film</button>
                        </form>
                        <table>
                            <tr>
                                <th>Copertina</th>
                                <th>Film</th>
                                <th>Pubblicato</th>
                                <th>Opzioni</th>
                            </tr>
                            <?php 
                                while ($row = $movies->fetch_assoc()) {
                                    $cover = get_movie_cover($row['cover']);
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $onair = $row['onair'];
                            ?>
                                    <tr>
                                        <td class='image-box'><img src="<?php echo $cover ?>" alt="Locandina"></td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo ($onair?'Pubblicato':'Nascosto'); ?></td>
                                        <td>
                                            <form action="editmovie.php" method="post">
                                                <input type="hidden" name="movie" value="<?php echo $id?>">
                                                <button type="submit" name="edit_movie">MODIFICA</button>
                                            </form>
                                            <form   method="post">
                                                <input type="hidden" name="movie" value="<?php echo $id?>">
                                                <button type="submit" name="delete_movie">ELIMINA</button>
                                            </form>
                                            <?php if ($onair) { ?>
                                                <form   method="post">
                                                    <input type="hidden" name="movie" value="<?php echo $id?>">
                                                    <button type="submit" name="unset_onair">NASCONDI</button>
                                                </form>
                                            <?php } else { ?>
                                                <form   method="post">
                                                    <input type="hidden" name="movie" value="<?php echo $id?>">
                                                    <button type="submit" name="set_onair">PUBBLICA</button>
                                                </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        } 
    ?>
</body>
</html>