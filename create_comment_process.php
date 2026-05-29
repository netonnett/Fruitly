<?php require_once './Include/Bootstraps.php' ?>
<?php
//Kontrollerar att förfrågan skickades med post metoden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Kontrollerar att användaren är inloggad
    if (!$autorizer->isLoggedIn()) {
        $_SESSION['error'] = 'Please log in to write a comment!';
        header('Location: login.php');
        exit();
    }

    //Sparar undan all information som skickades i formuläret
    $comment = $_POST['maintext'];
    $post_id = $_POST['postID'];
    $userID = $_SESSION['user']['id'];


    //Kontrollerar att kommentaren inte är tom
    if (strlen($comment) < 1) {
        $_SESSION['error'] = 'Please write a comment';
        header("Location: post.php?id=$post_id");
        exit();
    }
    //Kallar på funktionen 'saveComment' för att spara kommentaren i databasen
    Post::saveComment($db, $comment, $post_id, $userID);
    //Skickar meddelande till användaren att kommentaren blev publicerad
    $_SESSION['success'] = "Your comment was successfully posted!";
    header("Location: post.php?id=$post_id");
    exit();
}
?>