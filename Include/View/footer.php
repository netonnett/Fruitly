<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/footerstyle.css">
    <title>Footer</title>
</head>

<body>
    <footer class="base_footer">
        <p class="title_footer">
            <i>
                fruitly
            </i>
        </p>
        <p class="undertitle_footer">
            <i> A place to discuss all your favorite recepies </i>
        </p>
        <hr class="break_line">
        <!-- Kontrollerar om användaren är inloggad.
 Baserat på svaret visas olika saker i footern, antingen 'Log in/register' eller enbart 'log ut'-->
        <?php if ($autorizer->isLoggedIn()): ?>
            <div class="link_position_footer">
                <a class="log_in_footer" href="logout_process.phpZ">
                    <i>
                        Log out
                    </i>
                </a>
            </div>
        <?php else: ?>
            <div class="link_position_footer">
                <a class="log_in_footer" href="login.php">
                    <i>
                        Log in
                    </i>
                </a>
                <p class="divider_footer">
                    │
                </p>
                <a class="log_in_footer" href="register.php">
                    <i>
                        Register
                    </i>
                </a>
            </div>
        <?php endif; ?>
    </footer>
</body>

</html>