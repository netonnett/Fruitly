<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerstyle.css">
    <title>Header</title>

</head>

<body class="clearfix">
    <header class="base">
        <div class="name_box">
            <!-- Kontrollerar om användaren är inloggad.
 Baserat på om svaret är true or false, länkar själva loggan till olika sidor-->
            <?php if (!$autorizer->isLoggedIn()): ?>
                <a href="Index.php" class="title">
                    <i>
                        fruitly
                    </i>
                </a>
            <?php else: ?>
                <a href="home.php" class="title">
                    <i>
                        fruitly
                    </i>
                </a>
            <?php endif; ?>
            <p class="undertitle">
                <i> A place to discuss all your favorite recepies </i>
            </p>
        </div>
        <!-- Kontrollerar igen om användaren är inloggad.
             Baserat på svaret visas antingen 'log in/register' eller 'Welcome/logout'-->
        <?php if ($autorizer->isLoggedIn()): ?>
            <div class="link_position">
                <a class="log_in" href="profil.php">
                    Welcome, <?= $_SESSION['user']['username'] ?>
                </a>
                <p class="divider_head">
                    │
                </p>
                <a class="log_in" href="logout_process.php">
                    <i>
                        Log out
                    </i>
                </a>
            </div>
        <?php else: ?>
            <div class="link_position">
                <a class="log_in" href="login.php">
                    <i>
                        Log in
                    </i>
                </a>
                <p class="divider_head">
                    │
                </p>
                <a class="log_in" href="register.php">
                    <i>
                        Register
                    </i>
                </a>
            </div>
        <?php endif; ?>
    </header>
</body>

</html>