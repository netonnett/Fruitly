<?php
//Hämtar det inlägget som användaren klickade på och sparar dess id samt själva inlägget 
$id = $_GET['id'];
$post = Post::getById($db, $id);

//Hämtar kommentarerna till det specifika inlägget
$postID = $post['id'];
$comments = Post::getCommentsByID($db, $postID);
?>

<body>
    <a href="home.php" class="back_button">
        <p class="back_text">
            Back to home
        </p>
    </a>
    <div>
        <p class="post_name">
            <!-- Skriver ut användarnamnet av användaren som publicera inlägget-->
            <?= $post['username'] ?>
        </p>
    </div>
    <div>
        <!-- Skriver ut titeln av inlägget-->
        <p class="post_title">
            <?= $post['title'] ?>
        </p>
    </div>
    <div class="content_box">
        <!-- Skriver ut själva innehållet av inlägget precis i det formatet som användaren skrev den i-->
        <p class="post_content">
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>
    <hr class="divider">

    <details>
        <summary>
            Comments
        </summary>
        <?php include './Include/View/write_comment.php' ?>
        <hr class="divider">
        <?php
        //Loopar igenom all kommentarer som hör till inlägget och skriver ut de på skärmen
        foreach ($comments as $comment) {
        ?>
            <div class="comment_box">
                <p class="comment_username">
                    <?= $comment['username'] ?>
                </p>
                <p class="comment_text">
                    <?= $comment['comment'] ?>
                </p>
            </div>
        <?php } ?>
    </details>
</body>