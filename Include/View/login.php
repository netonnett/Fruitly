<body>
    <p class="title_lr">
        Welcome back to fruitly!
    </p>
    <br>
    <hr class="divider_lr">
    <p class="undertext_lr">
        Log in again to start chatting!
    </p>
    <br>
    <!-- Fel meddelande från Javascript om inloggningen skulle misslyckas på klient sidan-->
    <p id="js_error" class="error_message"></p>
    <!-- Fel meddelande från PHP filen om inloggningen misslyckas vid server sidan-->
    <?php if (isset($_SESSION['error'])): ?>
        <p class="error_message"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <!-- Formuläret som användaren anger sina uppgifter i.
     Skickas sedan vidare med 'POST' metoden-->
    <form name="login" action="login_process.php" method="post" onsubmit="return login_validator()">
        <label for="email" class="label">Email:</label><br>
        <input type="email" name="email" id="email" class="textfield" placeholder="example@gmail.com"><br>
        <label for="password" class="label">Password:</label><br>
        <input type="password" name="password" id="password" class="textfield" placeholder="Password"><br>
        <!-- Knappen för att logga in på hemsidan-->
        <button type="submit" class="button">
            <p class="b_text">
                Log in
            </p>
        </button>
    </form>
    <!-- Länk till registrerings sidan-->
    <p class="small_text">
        Doesn't have an account yet? <a class="login_reg" href="register.php">Register now</a>!
    </p>
    <hr class="divider_lr">
</body>