<nav class="top">
    <div class="wrapper-header">
        <div class="logo-column">
            <a href="/cinemaker" class="logo">CineMaker</a>
        </div>
        <div class="btn-column">
            <?php
                session_start();
                if (!isset($_SESSION['username'])) {
            ?>

            <div class="container">
                <?php include ROOT.'php/login.php'; ?>
                <a href="#" class="login-button">log in</a>
                <div class="login-container">
                    <form class="login-form" method="post" action="#">
                        <?php include ROOT.'php/errors.php'; ?>
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="login_user" value="SUBMIT" />
                    </form>
                </div>
            </div>
            <a href="#" class="login-button">Registrati</a>

            <?php        
                } 
                else { ?>
                    <div class="menu">
                    <a href="control.php"><?php echo $_SESSION['username']; ?></a>
                    <a href="<?php echo PathToUrl(ROOT."php/logout.php"); ?>">Logout</a>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</nav>

<nav class="bottom">
    <ul>
        <li><a href="#" class="active">Prossimamente</a></li>
        <li><a href="#">Programmazione</a></li>
        <li><a href="#">Eventi</a></li>
        <li><a href="#">Prezzi</a></li>
        <li><a href="#">Contatti</a></li>
    </ul>
</nav>

<script src="<?php echo PathToUrl(ROOT."js/loginDropdown.js"); ?>"></script>