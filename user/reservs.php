<?php 
    require_once '/../config.php';
    require_once UTILS.'functions.php';
    require_once UTILS.'queries.php';
    require_once '/../php/reservs_editor.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>Pannello di controllo</title>
</head>
<body>
    <?php 
        include_once '/../php/navbar.php';
        if (!isLogged()) {
            echo '<div class="form-panel wide">';
            echo '<div class="error">Accesso riservato agli utenti registrati</div>';
            echo '</div>';
        }
        else {
    ?>
    <div class="container-main">
        <div class="container-profile">
            <?php include 'sidebar.php'; ?>
            <div class="main-profile">
                <div class="form-container">
                    <div class="form-panel">
                        <?php include '/../php/errors.php' ?>
                        <table>
                            <tr>
                                <th>Film</th>
                                <th>Orario</th>
                                <th>Posto</th>
                            </tr>
                    <?php
                        while ($row = $active_reservs->fetch_assoc()) {
                            $screening = get_screening($row['screening_id'])->fetch_assoc();
                            $datetime = date('l, j - H:i', strtotime($screening['screening_start']));
                            $movie = get_movie($screening['movie_id'])->fetch_assoc();    
                    ?>
                            <tr>
                                <td><?php echo $movie['title'] ?></td>
                                <td><?php echo $datetime ?></td>
                                <td><?php echo $row['seat'] ?></td>
                                <td>
                                    <form   method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete">ELIMINA</button>
                                    </form>
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
        <?php } ?>
</body>
</html>