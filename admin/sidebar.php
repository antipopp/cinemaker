<div class="side-profile">
    <img src="https://api.adorable.io/avatars/140/<?php echo $_SESSION['username']?>@adorable.io.png" alt="Avatar">
    <p class="user-title"><?php echo $_SESSION['username']?></p>
    <div class="menu-profile">
        <ul class="user-nav">
            <li class="btns" id="movies">
                <a href="movies.php">
                <i class="material-icons">movie</i>
                Film </a>
            </li>

            <li class="btns" id="newscreening">
                <a href="newscreening.php">
                <i class="material-icons">movie</i>
                Aggiungi programmazione </a>
            </li>

            <li class="btns" id="editscreening">
                <a href="editscreening.php">
                <i class="material-icons">movie</i>
                Modifica programmazione </a>
            </li>

            <li class="btns" id="reservs">
                <a href="reservs.php">
                <i class="material-icons">event_seat</i>
                Prenotazioni</a>
            </li>

            <li class="btns" id="newsala">
                <a href="newsala.php">
                <i class="material-icons">event_seat</i>
                Aggiungi sala</a>
            </li>
        </ul>
    </div>
</div>

<script src="../js/setActiveSidebar.js"></script>