<?php require_once './Include/Bootstraps.php'; ?>
<?php $autorizer->requireLogin(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['user']['username'] ?></title>
    <link rel="stylesheet" href="style/headerstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
    <link rel="stylesheet" href="style/profil.css">
    <link rel="stylesheet" href="style/post_list.css">
</head>

<body>
    <!-- Inkluderar headern-->
    <?php include './include/view/header.php'; ?>
    <!-- Länk för att gå tillbaks till huvud sidan-->
    <a href="home.php" class="back_button">
        <p class="back_text">
            Back to home
        </p>
    </a>
    <p class="info_text">
        Welcome, <?= $_SESSION['user']['username'] ?>! <br>
        Here you can change your username or password. You can also view your posted posts!
    </p>
    <hr class="divider">
<!-- Länk till 'ändra användarnamn' formuläret-->
    <?php include './Include/View/change_username.php'?>
    <hr class="divider">
<!-- Länk til 'ändra lösenord' formuläret-->
    <?php include './Include/View/change_password.php'?>
    <!-- Länk till footern-->
    <?php include './include/view/footer.php'; ?>
</body>

</html>