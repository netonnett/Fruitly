<!-- Fel meddelande från PHP filen om skapandet av inlägg misslyckas vid server sidan-->
<?php if (isset($_SESSION['error'])): ?>
    <p class="feedback_message"><?= $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<!-- Fel meddelande från PHP filen om skapandet av inlägg misslyckas vid server sidan-->
<?php if (isset($_SESSION['success'])): ?>
    <p class="feedback_message"><?= $_SESSION['success'] ?></p>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<!-- Formulär för att kommentera-->
<form action="create_comment_process.php" name="write_comment" id="write_comment" method="POST">
    <textarea name="maintext" id="maintext" class="create_com" placeholder="Share your thoughts..."></textarea>
    <input type="hidden" name="postID" value="<?= $_GET['id'] ?>">
    <br>
    <!-- Knapp för att publicera kommentar-->
    <button type="submit" class="create_button">
        <p class="createb_text">
            Post
        </p>
    </button>
</form>