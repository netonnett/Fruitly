<body>
    <p class="change_text">
        Change username?
    </p>
<!-- Formulär som visas för användaren, där de kan byta användarnamn-->
    <form action="changeun_process.php" method="post">
        <label class="change_label">
            New Username:
        </label><br>
        <input type="text" name="username" id="username" class="change_textbox" placeholder="New username">
        <button type="submit" class="change_button">
                Update!
        </button>
    </form>
</body>