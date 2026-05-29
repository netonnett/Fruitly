<!-- Hämtar alla inlägg från databasen och sparar de i en variabel av typen array-->
<!-- Om det finns ett sökord visas de inläggen som innehåller det ordet annars vissas alla inlägg-->
<?php
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $posts = Post::search($db, $_GET['search']);
} else {
    $posts = Post::getAll($db);
}
?>

<body>
    <div id="posts_list">
        <?php
        //Går igenom varje inlägg som finns i arrayen en och en
        foreach ($posts as $post) {
        ?>
            <div class="onepost_box">
                <!-- Skriver ut användarnamnet av användaren som publicera inlägget-->
                <div class="username_box">
                    <p class="username_text">
                        <?= $post['username'] ?>
                    </p>
                </div>
                <div class="title_box">
                    <!-- Skriver ut titeln av inlägget-->
                    <p class="title_post">
                        <?= $post['title'] ?>
                    </p>
                </div>
                <div class="preview_box">
                    <!-- Skriver ut endast de första 250 tecken av inläggets huvudinnehåll-->
                    <p class="preview_text">
                        <?= substr($post['content'], 0, 250) ?>...
                    </p>
                </div>
                <!-- Knapp för att kunna klicka in sig på inlägget och läsa mer-->
                <div class="button_box">
                    <a class="more_button" href="post.php?id=<?= $post['id'] ?>">
                        <p class="button_text">
                            Continue reading!
                        </p>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>