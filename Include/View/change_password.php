<body>
    <p class="change_text">
        Change password?
    </p>
    <!-- Formulär som låter användaren byta lösenord-->
    <form action="changepsw_process.php" method="post">
        <label class="change_label">
            Old password:
        </label><br>
        <br>
        <input type="password" name="old_password" id="old_password" class="change_textbox" placeholder="Old password">
        <br>
        <br>
        <label class="change_label">
            New password:
        </label><br>
        <input type="password" name="new_password" id="new_password" class="change_textbox" placeholder="New password">
        <button type="submit" class="change_button">
                Update!
        </button>
    </form>
</body>