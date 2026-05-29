<body>
    <p class="title_lr">
        Register to fruitly!
    </p>
    <br>
    <hr class="divider_lr">
    <p class="undertext_lr">
        Become a member today and start discussing your favorite recipes!
    </p>
    <br>
    <!-- Fel meddelande från Javascript om registreringen skulle misslyckas på klient sidan-->
    <p id="js_error" class="error_message"></p>
    <!-- Fel meddelande från PHP filen om registreringen misslyckas vid server sidan-->
    <?php if (isset($_SESSION['error'])): ?>
        <p class="error_message"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <!-- Formuläret som användaren anger sina uppgifter i.
     Skickas sedan vidare med 'POST' metoden-->
    <form name="register" action="register_process.php" method="post" onsubmit="return register_validator()">
        <label for="username" class="label">Username:</label><br>
        <input type="text" name="username" id="username" class="textfield" placeholder="Username"><br>
        <label for="email" class="label">Email:</label><br>
        <input type="email" name="email" id="email" class="textfield" placeholder="example@gmail.com"><br>
        <label for="password" class="label">Password:</label><br>
        <input type="password" name="password" id="password" class="textfield" placeholder="Password"><br>
        <!-- Knapp för registrering-->
        <button type="submit" class="button">
            <p class="b_text">
                Register
            </p>
        </button>
    </form>
    <!-- Länk för att kunna navigera till inloggningen-->
    <p class="small_text">
        Already have an account? <a class="login_reg" href="login.php">Log in</a>!
    </p>
    <hr class="divider_lr">
</body>