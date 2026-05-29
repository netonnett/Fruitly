<?php require_once './Include/Bootstraps.php'; ?>
<?php $autorizer->requireLogin(); ?>
<?php 
//Hämtar inlägget som användaren har klickat in sig på
$id = $_GET['id'];
$post = Post::getById($db, $id);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
    <link rel="stylesheet" href="style/post.css">
    <link rel="stylesheet" href="style/comments.css">
    <title><?= $post['title'];?></title>
</head>

<body>
<!-- Inkluderar de olika sidorna för post-->
    <?php include './Include/View/header.php' ?>

    <?php include './Include/View/post.php' ?>

    <?php include './Include/View/footer.php' ?>
</body>

</html>