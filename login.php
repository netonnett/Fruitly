<?php require_once './Include/Bootstraps.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Länkar till de olika stylesheeten, css-->
    <link rel="stylesheet" href="style/register_login.css">
    <link rel="stylesheet" href="style/headerstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
    <title>Log in!</title>
</head>

<body>
    <!-- Länkar till de olika sidorna, header, log in formuläret och footer-->
    <?php include './include/view/header.php'; ?>

    <?php include './include/view/login.php'; ?>
    <br>
    <?php include './include/view/footer.php'; ?>
    <!-- Länk till javascript valideringen-->
    <script src="JavaScript/Loginval.js"></script>
</body>

</html>