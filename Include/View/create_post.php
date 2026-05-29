<body>
    <div class="post_border">
        <!-- Fel meddelande från Javascript om skapandet av inläggen skulle misslyckas på klient sidan-->
        <p id="error_msg" class="error_msg"></p>
        <!-- Fel meddelande från PHP filen om skapandet av inlägg misslyckas vid server sidan-->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error_message"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <p class="create_title"> Create a post and share it with others!</p>
        <!-- Formuläret där användaren skriver in titel samt inlägget de vill publicera-->
        <form name="create_post" id="create_post">
            <div class="text_box">
                <input type="text" name="title" id="title" class="create_post_field" placeholder="Title..."><br>
                <textarea name="maintext" id="maintext" class="create_post_field textarea_create" placeholder="Share your thoughts..."></textarea>
            </div>
            <!-- Knapp för att publicera inlägget-->
            <div class="button_box">
                <button type="submit" class="create_button">
                    <p class="createb_text">
                        Post
                    </p>
                </button>
            </div>
        </form>
    </div>
</body>