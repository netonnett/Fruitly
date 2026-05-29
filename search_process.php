<?php require_once './Include/Bootstraps.php' ?>
<?php
//Sparar sökordet från användaren i en variabel
$search = $_GET['search'];
//Anropar metod för att söka fram inläggen i databasen
$posts = Post::search($db, $search);

?>