<nav class="top">
    <div class="wrapper-header">
        <div class="logo-column">
            <a href="<?php echo PathToUrl(ROOT); ?>" class="logo">Cinemino</a>
        </div>
        <div class="btn-column">
            <?php
                if (!isLogged()) {
            ?>

            <div class="container">
                <a href="#" class="nav-button">log in</a>
                <div class="login-container">
                    <form class="login-form" method="post" action="<?php echo PathToUrl(ROOT.'php/signin.php'); ?>">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" name="login_user" value="INVIA" />
                    </form>
                </div>
            </div>
            <a href="<?php echo PathToUrl(ROOT."php/register.php"); ?>" class="nav-button">Registrati</a>

            <?php        
                } 
                else { ?>
                    <div class="menu">
                    <a href="<?php echo PathToUrl(ROOT."user/settings.php"); ?>" class="nav-button">PANNELLO UTENTE</a>
                    <a href="<?php echo PathToUrl(ROOT."php/logout.php"); ?>" class="nav-button">Logout</a>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</nav>

<nav class="bottom">
    <ul>
        <li><a href="<?php echo PathToUrl(ROOT."index.php"); ?>" id="index">Programmazione</a></li>
        <li><a href="<?php echo PathToUrl(ROOT."istruzioni.php"); ?>" id="istruzioni">Istruzioni</a></li>
    </ul>
</nav>

<script src="<?php echo PathToUrl(ROOT."js/loginDropdown.js"); ?>"></script>
<script src="<?php echo PathToUrl(ROOT."js/setActiveSidebar.js"); ?>"></script>