<div class="side-profile">
    <img src="https://api.adorable.io/avatars/140/<?php echo $_SESSION['username']?>@adorable.io.png">
    <p class="user-title"><?php echo $_SESSION['username']?></p>
    <div class="menu-profile">
        <ul class="user-nav">
            <li class="btns" id="settings">
                <a href="settings.php">
                <i class="material-icons">settings</i>
                Impostazioni </a>
            </li>

            <li class="btns" id="reservs">
                <a href="reservs.php">
                <i class="material-icons">event_seat</i>
                Prenotazioni </a>
            </li>
                        
            <?php if (is_admin($_SESSION['id'])) : ?>
            <li class="btns">
                <a href="../admin/movies.php">
                <i class="material-icons">grade</i>
                Amministrazione </a>
            </li>
            <?php endif ?>
        </ul>
    </div>
</div>

<script src="../js/setActiveSidebar.js"></script>